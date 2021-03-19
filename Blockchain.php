<?php

namespace Blockchain;

class Blockchain{

    public $current_chain_length;
    public $previous_hash;

    public function __construct(){
        
        new Ledger;

        $this->current_chain_length = (new Ledger)->chain_size();
        $this->previous_hash = (new Ledger)->last_block();

        $this->new_block();
    }

    public function new_block(){

        $data = [
                'name' => 'Alex',
                'age'  => '35',
                'job'  => 'PHP Dev',
        ];
        
        $block = new Block(
            $this->current_chain_length,
            date('Y-m-d'),
            $data,
            $this->previous_hash
        );
        (new Ledger)->write_new_block( $block );
    }

}