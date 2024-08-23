<?php
namespace Birjandshop\Model;

/**
 * @property int $user_id
 * @property int $total
 * @property int $subtotal
 * @property string $status
 * @property string $gateway
 * @property string $refrence_id
 * @property string $completed_at
 */

class Order extends Model{

    protected $table = 'orders';
}