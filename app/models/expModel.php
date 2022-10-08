<?php

class ExpModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_hollidays;charset=utf8', 'root', '');
    }

    public function getAll() {
        $query = $this->db->prepare("SELECT * FROM experience");
        $query->execute();
        $exps = $query->fetchAll(PDO::FETCH_OBJ); 
        return $exps;
    }

    public function getExpById($id) {
        $query = $this->db->prepare("SELECT * FROM experience WHERE exp_id = ?");
        $query->execute([$id]);
        $exp = $query->fetch(PDO::FETCH_OBJ); 
        return $exp;
    }

    public function getExpByBoat($boat_id){
        $query = $this->db->prepare("SELECT * FROM experience WHERE boat_id = ?");
        $query->execute([$boat_id]);
        $exps = $query->fetchAll(PDO::FETCH_OBJ); 
        return $exps;
    }
    
    public function insertExp($place, $days, $price, $description, $boat_id) {
        $query = $this->db->prepare("INSERT INTO experience (place, days, price, description, boat_id) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$place, $days, $price, $description, $boat_id]);
        return $this->db->lastInsertId();
    }

    function deleteById($id) {
        $query = $this->db->prepare('DELETE FROM experience WHERE exp_id = ?');
        $query->execute([$id]);
    }

    function updateById($id, $place, $days, $price, $description, $boat_id){
        $query = $this->db->prepare("UPDATE experience SET place =?, days =?, price =?, description =?, boat_id =? 
        WHERE exp_id = ?");
        $query->execute([$place, $days, $price, $description, $boat_id, $id]);
    }


}
