<?php

namespace Core;

Class Loader {
    public function view($fileView, $data = array()) {
        extract ($data);
        if(is_file('view/header.php')) {
            include 'view/header.php';
        }
        if(is_file('view/' . $fileView . '.php')) {
            include 'view/' . $fileView . '.php';
        }
        if(is_file('view/footer.php')) {
            include 'view/footer.php';
        }
    }
    public function partial($fileView, $data = array()) {
        extract ($data);
        if(is_file('view/' . $fileView . '.php')) {
            include 'view/' . $fileView . '.php';
        }
    }
}