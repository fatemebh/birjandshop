<?php
namespace Birjandshop;

class DB{

    private $pdo;

    public function __construct( $db, $username, $password ){
        $this->pdo = new \PDO( "mysql:dbname=$db;charset=utf8", $username, $password );
    }

    public function pdo(){
        return $this->pdo;
    }

    public function insert( $table, $data ){
        //INSERT INTO car ( title, model ) VALUES ( 'x', 1380 )
        $sql = "INSERT INTO $table ";
        
        $cols = array_keys( $data );
        $vals = array_values( $data );
        
        $sql.= " ( " . implode( ', ', $cols ) . " ) ";
        $sql.= ' VALUES (';

        $new_vals = [];
        foreach( $vals as $val ){
            if( is_string( $val ) ){
                $new_vals[] = "'$val'";
            }elseif( $val === NULL ){
                $new_vals[] = 'NULL';
            }else{
                $new_vals[] = $val;
            }
        }
        $sql.= implode( ', ', $new_vals );
        $sql.= ')';
        
        return $this->pdo->exec( $sql );

    }

    public function last_insert_id(){
        return $this->pdo->lastInsertId();
    }

    public function update( $table, $data, $where ) {
        //UPDATE car SET title = 'x', model = 1380 WHERE id = 1
        $sql = "UPDATE $table SET ";
        
        // Extract columns and values from $data
        $sets = [];
        foreach ($data as $col => $val) {
            if (is_string($val)) {
                $sets[] = "$col = '$val'";
            } elseif ($val === NULL) {
                $sets[] = "$col = NULL";
            } else {
                $sets[] = "$col = $val";
            }
        }
        $sql .= implode(', ', $sets);
        
        // Append WHERE clause
        $sql .= " WHERE " . $where;
        
        return $this->pdo->exec($sql);
    }

    public function delete( $table, $id ){
        $sql = " DELETE FROM $table WHERE  ID = $id ";
        return $this->pdo->exec( $sql );
    }

    public function get( $table, $id, $mode = \PDO::FETCH_ASSOC ){
        $sql = "SELECT * FROM $table WHERE ID = $id LIMIT 1";
        $stmt = $this->pdo->query( $sql );
        return $stmt->fetch( $mode );
    }

    public function get_all( $table, $cols = '*', $where = ' 1 = 1 ' , $order = '', $limit = 5 , $offset = 0){
        if ( $order ){
            $order = 'ORDER BY ' . $order;
        }
        $stmt = $this->pdo->query( 
            "SELECT $cols FROM $table WHERE $where $order LIMIT $limit OFFSET $offset " 
        );
        return $stmt->fetchAll( \PDO::FETCH_ASSOC );
    }

}