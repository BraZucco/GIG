<?php

namespace Core;

use \Core\Loader;

Abstract Class Controller {
    protected $load;

    public function __construct() {
        $this->load = new Loader();
    }

}