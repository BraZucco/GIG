<?php

namespace Model;
use Core;

Class Teste extends Core\Model {
    public function __construct() {
        parent::__construct();
    }
    public function select() {
        return $this->db->select('teste');
    }
    public function insert($obj) {
        $this->db->insert('teste', $obj);
        echo 'MODEL TESTE';
    }
    public function update($id, $obj) {
        $this->db->update('teste', $id, $obj);
        echo 'MODEL TESTE';
    }
    public function delete($id) {
        $this->db->delete('teste', $id);
        echo 'MODEL TESTE';
    }
}