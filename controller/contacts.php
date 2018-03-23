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
        header('Content-type:application/json;charset=utf-8');
        $u = json_decode(file_get_contents('php://input'));
        $model = new Model\Contacts();
        $u->phone = preg_replace("/\D/", '', $u->phone);
        $model->update($id,$u);
        echo '{"success": "true"}';
    }

    public function post() {
        header('Content-type:application/json;charset=utf-8');
        $u = json_decode(file_get_contents('php://input'));
        
        $model = new Model\Contacts();
        $u->phone = preg_replace("/\D/", '', $u->phone);
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