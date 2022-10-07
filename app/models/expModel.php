<?php

class ExpModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_hollidays;charset=utf8', 'root', '');
    }

    public function getAll() {
        $query = $this->db->prepare("SELECT * FROM experiences");
        $query->execute();
        $exps = $query->fetchAll(PDO::FETCH_OBJ); 
        return $exps;
    }

    public function getExpById($id) {
        $query = $this->db->prepare("SELECT * FROM experiences WHERE exp_id = ?");
        $query->execute([$id]);
        $exp = $query->fetch(PDO::FETCH_OBJ); 
        return $exp;
    }

    public function getExpByBoat($boat_id){
        $query = $this->db->prepare("SELECT * FROM experiences WHERE boat_id = ?");
        $query->execute([$boat_id]);
        $exps = $query->fetchAll(PDO::FETCH_OBJ); 
        return $exps;
    }
    
    public function insertExp($place, $days, $price, $description, $boat_id) {
        $query = $this->db->prepare("INSERT INTO experiences (place, days, price, description, boat_id) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$place, $days, $price, $description, $boat_id]);
        return $this->db->lastInsertId();
    }

    function deleteById($id) {
        $query = $this->db->prepare('DELETE FROM experiences WHERE exp_id = ?');
        $query->execute([$id]);
    }

    function updateById($id, $place, $days, $price, $description, $boat_id){
        $query = $this->db->prepare("UPDATE experiences SET place =?, days =?, price =?, description =?, boat_id =? 
        WHERE exp_id = ?");
        $query->execute([$place, $days, $price, $description, $boat_id, $id]);
    }


}
