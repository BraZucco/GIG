<?php

namespace Core\Database;

Class FileDB {

    public function select($tableName) {
        return json_decode(file_get_contents(__DIR__ . '/data/' . $tableName . '.db'));
    }

    public function insert($tableName, $object) {
        $fdb = json_decode(file_get_contents(__DIR__ . '/data/' . $tableName . '.db'));
        $fdb = (is_array($fdb)) ? $fdb : array();
        $object->id = count($fdb);
        $fdb[] = $object;
        file_put_contents(__DIR__ . '/data/' . $tableName . '.db', json_encode($fdb));
    }

    public function update($tableName, $id, $object) {
        $fdb = json_decode(file_get_contents(__DIR__ . '/data/' . $tableName . '.db'));
        $fdb = (is_array($fdb)) ? $fdb : array();
        if(isset($fdb[$id])) {
            $fdb[$id] = $object;
            file_put_contents(__DIR__ . '/data/' . $tableName . '.db', json_encode($fdb));
        }
    }
    public function delete($tableName, $id) {
        $fdb = json_decode(file_get_contents(__DIR__ . '/data/' . $tableName . '.db'));
        $fdb = (is_array($fdb)) ? $fdb : array();
        if(isset($fdb[$id])) {
            $fdb[$id] = null;
            file_put_contents(__DIR__ . '/data/' . $tableName . '.db', json_encode($fdb));
        }
    }
}