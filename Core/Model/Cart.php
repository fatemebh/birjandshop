<?php
namespace Birjandshop\Model;

class Cart{

    public function __construct(){
        if(! isset( $_SESSION['cart'] )){
            $this->empty();
        }
    }

    private function is_exists( $product_id ){
        foreach( $_SESSION['cart']['items'] as $item ){
            if ($product_id == $item['product_id']) {
                return true;
            }
        }
        return false;
    }

    public function add_item( $product_id, $qty = 1 ){
        if ( $this->is_exists( $product_id )) {
            return;
        }

        $_SESSION['cart']['items'][] = [
            'product_id'    => $product_id,
            'qty'           => $qty,
        ];
        $this->calculate();
    }

    public function calculate(){
        $total = 0;
        $subtotal = 0;
        $count = 0;
        foreach ($_SESSION['cart']['items'] as $item) {
            $product_id = $item['product_id'];
            $qty = $item['qty'];
            $product = new Product($product_id);
            $total += $product->get_sale_price();
            $subtotal += $product->price;
            $count += $qty;
        }
        $_SESSION['cart']['total'] = $total;
        $_SESSION['cart']['subtotal'] = $subtotal;
        $_SESSION['cart']['count'] = $count;
    }

    public function remove_item( $product_id ){
        /*
        $_SESSION['cart']['items'] = array_filter( $_SESSION['cart']['items'], function( $item) use ( $product_id ) {
            return $item['product_id'] == $product_id;
        } );
        */

        $items = [];
        foreach ($_SESSION['cart']['items'] as $item) {
            if ($item['product_id'] != $product_id) {
                $items[] = $item;
            }
        }
        $_SESSION['cart']['items'] = $items;
        $this->calculate();
    }

    public function create_order(){

        //user login

        if ( $this->get_item_count() ){
            $order = new Order();
            $order->user_id         = $user_id;
            $order->total           = $this->get_total();
            $order->subtotal        = $this->get_subtotal();
            $order->status          = 'pending';
            $order->gateway         = 'mellat';
            $order->refrence_id     = '';
            $order->completed_at    = NULL;
            $order->save();

            if( !$order || !$order->ID ){
                //save order failed
                echo 'ثبت سفارش ناموفق بود';
            }

            if ( $order && $order->ID ) {
                $cart_items = $this->get_items(); // Assuming a method to get cart items
                foreach ( $cart_items as $item) {
                    $orderItem = new OrderItem();
                    $orderItem->order_id = $order->ID;
                    $orderItem->product_id = $item['product_id'];
                    $orderItem->quantity = $item['quantity'];
                    $orderItem->price = $item['price'];
                    $orderItem->sale_price = $item['sale_price'];
                    $orderItem->save();
                }
                //Optionally clear the cart after order is placed
                $this->empty(); // Assuming a method to clear the cart
                return ['success' => 'Order created successfully.'];
            }
        }
    }

    public function get_items(){
        return $_SESSION['cart']['items'];
    }

    public function empty(){
        $_SESSION['cart'] = [
            'items' => [],
            'total' => 0,
            'count' => 0,
            'subtotal' => 0,
        ];
    }

    public function get_item_count(){
        return $_SESSION['cart']['count'];
    }

    public function get_total(){
        return $_SESSION['cart']['total'];
    }

    public function get_subtotal(){
        return $_SESSION['cart']['subtotal'];
    }

    public function get_discount_percent(){
        return round( ($this->get_subtotal() - $this->get_total()) / $this->get_subtotal() * 100 );
    }

    public function has_discount(){
        return $this->get_discount_percent();
    }
}

