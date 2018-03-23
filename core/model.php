<?php

namespace Core;

use Core\Database\FileDB;

Class Model {
    protected $db;

    public function __construct() {
        $this->db = new FileDB();
    }

}