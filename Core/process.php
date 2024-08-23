<?php

use Birjandshop\Model\Order;
use Birjandshop\Model\Product;

if( isset( $_GET['id'] ) && isset( $_GET['add_to_cart'] ) ){
    $product = new Product( $_GET['id'] );
    cart()->add_item( $product->ID );
}

if( isset( $_GET['id'] ) && isset( $_GET['remove_from_cart'] ) ){
    $product = new Product( $_GET['id'] );
    cart()->remove_item( $product->ID );
}

if( isset( $_GET['id'] ) && isset( $_GET['create_order_items'] ) ){
    $order = new Order( $_GET['id'] );
    cart()->create_order( $order->ID );
}