<?php
use Birjandshop\DB;
use Birjandshop\Model\Cart;

session_start();

require 'Core/Model/Helpers.php';
require 'vendor/autoload.php';
require 'Core/Config.php';

date_default_timezone_set( TIMEZONE );

$db     = new DB( 'birjandshop', 'root', '' );
require( 'Core/Functions/functions-loader.php' );
$cart = new Cart();
require( 'Core/process.php' );