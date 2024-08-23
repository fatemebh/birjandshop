<?php
namespace Birjandshop\Model;

/**
 * @property int $order_id
 * @property int $product_id
 * @property int $qantity
 * @property string $price
 * @property string $sale_price
 */

class OrderItem extends Model{

    protected $table = 'order_items';

}

