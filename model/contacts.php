<?php

namespace Model;
use Core;

Class Contacts extends Core\Model {
    public function __construct() {
        parent::__construct();
    }
    public function select() {
        return $this->db->select('contacts');
    }
    public function insert($obj) {
        $this->db->insert('contacts', $obj);
    }
    public function update($id, $obj) {
        $this->db->update('contacts', $id, $obj);
    }
    public function delete($id) {
        $this->db->delete('contacts', $id);
    }
}