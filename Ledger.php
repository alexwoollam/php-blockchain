<?php

namespace Blockchain;

Class Ledger{
    
    public $ledger;

    public function __construct(){

        $this->ledger = 'ledger.txt';
        if( ! file_exists($this->ledger) ){
            $this->block_zero();
        }
    }

    public function block_zero(){

        $block = new Block( 0, date('2021-01-01'), 'Genisis', '000000' );
        $this->write_new_block( $block );
    }

    public function last_block(){

        $data = file($this->ledger);
        $last_line = $data[count($data)-1];
        return hash('ripemd160', $last_line);
    }

    public function chain_size(){

        $file = $this->ledger;
        return iterator_count($this->getLines($file));
    }

    public function getLines($file) {
        $f = fopen($file, 'r');
    
        while ($line = fgets($f)) {
            yield $line;
        }
    }

    public function write_new_block( $block ){
        $block = serialize($block);
        file_put_contents($this->ledger, $block.PHP_EOL, FILE_APPEND);
    }

}