<?php

namespace Blockchain;

interface BlockInterface{

    public function id();

    public function time_stamp();

    public function data();

    public function last_hash();
}