<?php

namespace Core;

use \Core\Loader;

Abstract Class Controller {
    protected $load;

    
    abstract public function get();
    abstract public function put();
    abstract public function post();
    abstract public function delete();

    public function __construct() {
        $this->load = new Loader();
    }

}