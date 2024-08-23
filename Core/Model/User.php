<?php
namespace Birjandshop\Model;

class User extends Model{

    protected $table = 'users';

    private function set_password( $password ){
        $this->password = password_hash( $password, PASSWORD_DEFAULT );
    }
}