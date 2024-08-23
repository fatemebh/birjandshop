<?php
namespace Birjandshop\Model;

/**
 * @property int $ID
 * @property int $stock
 * @property int|float $discount_percent
 * @property int|float $price
 * @property int $sale_count
 * @property int|float $total_sale
 * @property string $title
 * @property string $content
 * @property string $thumbnail
 */

class Product extends Model{

    protected $table = 'products';

    public $discount_percent = 0;
    public $discount_date = NULL;

    public function has_discount(){
        return $this->get_sale_price() != $this->price;
    }

    public function get_sale_price(){
        return round (( 100 - $this->discount_percent ) / 100 * $this->price );
    }

    public function add_view(){
        //Increase view for product
    }

    public function rate( $rate , $user_id ){}

    public function increase_sale_count( $count ){}

    public function increase_total_sale($price){}

    public function can_view(){
        return $this->stock > 0;
    }

    public function is_saleable(){
        return $this->stock > 0;
    }

    public function add_to_cart( $qty ){
        /**
         * TODO: Add to cart from course
         */
    }

    public function get_discount_percent(){
        return round(( $this->price - $this->get_sale_price() ) / $this->price * 100 );
    }

    public static function get_all($where = ' 1 = 1 ', $order = '', $limit = 10, $offset = 0){
        $results = db()->get_all(
            'products',
            '*',
            $where,
            $order,
            $limit,
            $offset
        );

        if (! empty($results)) {
            $products = [];
            foreach ($results as $result) {
                $product = new Product($result);
                $products[] = $product;
            }
            return $products;
        }
        return false;
    }
}
