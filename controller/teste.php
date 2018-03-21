<?php

namespace Controller;
use Core;
use Model;

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
        $model = new Model\Teste();
        

        $data['nome'] = 'teste';
        $data['teste'] = $model->select();
        $this->load->view('teste/index', $data);
    }

    public function put($id) {
        $u = json_decode(file_get_contents('php://input'));
        $model = new Model\Teste();
        $model->update($id,$u);


        $data['nome'] = 'teste';
        $data['teste'] = 'put';
        $this->load->view('teste/index', $data);
    }

    public function post() {
        $u = json_decode(file_get_contents('php://input'));
        
        $model = new Model\Teste();
        $model->insert($u);

        $data['nome'] = 'teste';
        $data['teste'] = 'post';
        $this->load->view('teste/index', $data);
    }


    public function delete($id) {
        $model = new Model\Teste();
        $model->delete($id);
        $data['nome'] = 'teste';
        $data['teste'] = 'delete';
        $this->load->view('teste/index', $data);
    }

}