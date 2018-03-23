<?php

namespace Controller;
use Core;
use Model;

Class Contacts extends \Core\Rest {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
    }

    public function get() {
        header('Content-type:application/json;charset=utf-8');
        $model = new Model\Contacts();
        
        print json_encode($model->select());
    }

    public function put($id) {
        $u = json_decode(file_get_contents('php://input'));
        $model = new Model\Contacts();
        $model->update($id,$u);


        $data['nome'] = 'teste';
        $data['teste'] = 'put';
        $this->load->view('teste/index', $data);
    }

    public function post() {
        header('Content-type:application/json;charset=utf-8');
        $u = json_decode(file_get_contents('php://input'));
        
        $model = new Model\Contacts();
        $model->insert($u);
        echo '{"success": "true"}';
    }


    public function delete($id) {
        header('Content-type:application/json;charset=utf-8');
        $model = new Model\Contacts();
        $model->delete($id);
        echo '{"success": "true"}';
    }

}