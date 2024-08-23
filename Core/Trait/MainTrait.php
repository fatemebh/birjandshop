<?php
namespace Birjandshop\Trait;

trait MainTrait{

    public function home_url(){
        return 'https://birjandshop.local';
    }

    function current_page(){
        if( isset($_GET['page'])){
            return intval($_GET['page']);
        }
        return 1;
    }
}