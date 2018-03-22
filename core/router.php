<?php

namespace Core;

class Router {
    private $controller;
    private $method;
    private $parameters = array();
    private $defaultController = 'Home';
    private $defaultMethod = 'index';

    public function __construct() {
        $basePath = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
        $arrPath = explode('/',trim(str_replace($basePath, '', $_SERVER['REQUEST_URI']), '/'));

        if(isset($arrPath[0]) && !empty($arrPath[0])) {
            $this->setController($arrPath[0]);
        } else {
            $this->setController($this->getDefaultController());
        }

        $co = '\Controller\\'.ucfirst($this->getController());
        $c = new $co;

        if($c instanceof Rest) {
            $method = '';
            switch($_SERVER['REQUEST_METHOD']) {
                case 'GET' : $method = 'get'; break;
                case 'PUT' : $method = 'put'; break;
                case 'POST' : $method = 'post'; break;
                case 'DELETE' : $method = 'delete'; break;
                default: $method = 'index';
            }
            $this->setMethod($method);
            unset($arrPath[0]);
        } else {
            if(isset($arrPath[1])) {
                $this->setMethod($arrPath[1]);
            } else {
                $this->setMethod($this->getDefaultMethod());
            }
            unset($arrPath[0]);
            unset($arrPath[1]);
        }
        $this->setParameters($arrPath);
        call_user_func_array(array($c, $this->getMethod()), $this->getParameters());
    }

    private function setController($controller) {
        $this->controller = $controller;
    }
    public function getController() {
        return $this->controller;
    }

    private function setMethod($method) {
        $this->method = $method;
    }
    public function getMethod() {
        return $this->method;
    }

    private function setParameters($parameters) {
        $this->parameters = $parameters;
    }
    public function getParameters() {
        return $this->parameters;
    }

    private function setDefaultController($defaultController) {
        $this->defaultController = $defaultController;
    }
    public function getDefaultController() {
        return $this->defaultController;
    }

    private function setDefaultMethod($defaultMethod) {
        $this->defaultMethod = $defaultMethod;
    }
    public function getDefaultMethod() {
        return $this->defaultMethod;
    }
}