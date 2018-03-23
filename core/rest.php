<?php

namespace Core;

use \Core\Loader;

Abstract Class Rest extends Controller {
    protected $load;

    
    abstract public function get();
    abstract public function put($id);
    abstract public function post();
    abstract public function delete($id);

    public function __construct() {
        $this->load = new Loader();
    }

}