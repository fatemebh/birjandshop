<?php
namespace Birjandshop\Model;

/**
 * @property int $ID
 * @property string $created_at
 */

class Model{

    protected $table;
    protected $data     = [
        'ID'    => 0,
    ];

    public function __construct( $id_array = 0 ){
        if( is_array( $id_array ) ){
            foreach( $id_array as $key => $value ){
                $this->data[$key] = $value;
            }
        }elseif( $id_array ) {
            $cols = db()->get( $this->table, $id_array );
            if( $cols ){
                foreach( $cols as $key => $value ){
                    $this->data[$key] = $value;
                }
            }
        }
    }

    public function __set( $name, $value ){
        $this->data[$name] = $value;
    }

    public function __get( $name ){
        return $this->data[$name];
    }

    public function save(){
        if( $this->ID ){
            global $db;
            $update_data = $this->data;
            unset($update_data['ID']);
            $where = 'ID = ' . $this->ID;
            $db->update( $this->table, $update_data, $where );
        }else{
            $this->created_at = date( 'Y-m-d H:i:s' );
            $insert_data = $this->data;
            unset( $insert_data['ID'] );
            global $db;
            $db->insert( $this->table, $insert_data );
            $record_id = $db->last_insert_id();
            return new self( $record_id );
        }
    }

}

