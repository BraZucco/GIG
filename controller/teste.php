<?php

namespace Controller;
use Core;

Class Teste extends \Core\Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $data['nome'] = 'teste';
        $data['teste'] = 'testando a var';
        $this->load->view('teste/index', $data);
    }

    public function create($hh, $hh1, $hh2) {
        $data['nome'] = 'teste';
        $data['teste'] = $hh2;
        $this->load->view('teste/create', $data);
    }

    public function get() {
        $data['nome'] = 'teste';
        $data['teste'] = 'get';
        $this->load->view('teste/index', $data);
    }

    public function put() {
        $data['nome'] = 'teste';
        $data['teste'] = 'put';
        $this->load->view('teste/index', $data);
    }

    public function post() {
        echo file_get_contents('php://input');
        $data['nome'] = 'teste';
        $data['teste'] = 'post';
        $this->load->view('teste/index', $data);
    }


    public function delete() {
        $data['nome'] = 'teste';
        $data['teste'] = 'delete';
        $this->load->view('teste/index', $data);
    }

}