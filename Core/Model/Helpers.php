<?php
namespace Birjandshop\Model;

class Helpers{
    public static function calculate_discount( $price, $percent ){
        return floor( ( 100 - $percent ) / 100 * $price );
    }
}