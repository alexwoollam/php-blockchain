<?php

namespace Blockchain;

class Block implements BlockInterface{

    public $id;
    public $time_stamp;
    public $data;
    public $last_hash;

    public function __construct( $id, $time_stamp, $data, $last_hash ){
        
        $this->id = $id;
        $this->time_stamp = $time_stamp;
        $this->data = $data;
        $this->last_hash = $last_hash;
    }

    public function id(){
        return $this->id;
    }

    public function time_stamp(){
        return $this->time_stamp;
    }

    public function data(){
        return $this->data;
    }

    public function last_hash(){
        return $this->last_hash;
    }

}