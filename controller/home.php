<?php

namespace Controller;
use Core;
use Model;

Class Home extends \Core\Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $data = array();
        $this->load->view('home/index', $data);
    }
}