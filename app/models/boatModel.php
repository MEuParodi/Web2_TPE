<?php

class BoatsModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_hollidays;charset=utf8', 'root', '');
    }

    public function getAll() {
        $query = $this->db->prepare("SELECT * FROM boat");
        $query->execute();
        $boats = $query->fetchAll(PDO::FETCH_OBJ); 
        return $boats;
    }

    public function getBoatById($id) {
        $query = $this->db->prepare("SELECT * FROM boat WHERE boat_id = ?");
        $query->execute([$id]);
        $boat = $query->fetch(PDO::FETCH_OBJ); 
        return $boat;
    }

    public function insertBoat($name, $capacity, $model) {
        $query = $this->db->prepare("INSERT INTO boat (name, capacity, model) VALUES (?, ?, ?)");
        $query->execute([$name, $capacity, $model]);
        return $this->db->lastInsertId();
    }

    public function deleteById($id) {
        $query = $this->db->prepare('DELETE FROM boat WHERE boat_id = ?');
        $query->execute([$id]);
    }
    
    public function updateById($id, $name, $capacity, $model){
        $query = $this->db->prepare("UPDATE boat SET name = ?, capacity = ?, model = ? WHERE boat_id = ?");
        $query->execute([$name, $capacity, $model, $id]);

    }

}
