<?php
require_once './app/models/boatModel.php';
require_once './app/models/expModel.php';
require_once './app/views/expView.php';


class MainController{
    private $boatsModel;
    private $expModel;
    private $expView;

    public function __construct() {
        $this->boatsModel = new BoatsModel();
        $this->expModel = new ExpModel();
        $this->expView = new ExpView();
    }
    
    public function showHome(){
        $this->expView->showHome();
    }

    public function showAllExp(){
        $exps = $this->expModel->getAll();
        foreach ($exps as $exp){
            $exp->boat_id = $this->boatsModel->getBoatById($exp->boat_id)->name;
        }
        $this->expView->showExps($exps);
        $this->showFilterByBoat();
    }

    public function showExpByBoat($boat_id){
        $exps = $this->expModel->getExpByBoat($boat_id);
        foreach ($exps as $exp){
            $exp->boat_id = $this->boatsModel->getBoatById($exp->boat_id)->name;
        }
        $this->expView->showExps($exps);
        $this->showFilterByBoat();
    }

    public function showExpById($id){
        $exp = $this->expModel->getExpById($id);
        $boat = $this->boatsModel->getBoatById($exp->boat_id);
        $this->expView->showExpById($exp, $boat);
    }

    public function deleteExpById($id){
        $this->expModel->deleteById($id);
        $this->showAllExp();
    }

    public function deleteBoatById($id){
       $this->boatsModel->deleteById($id);
       $this->showAllBoats();

//       header("Location: " . BASE_URL);

    }

    public function showAllBoats(){
        $boats = $this->boatsModel->getAll();
        $this->expView->showAllBoats($boats);
    }

    function insertBoat() {
        $name = $_GET['name'];
        $capacity = $_GET['capacity'];
        $model = $_GET['model'];
        //verificar que los parametros vengan correctamente para poder insertar bien
        $id = $this->boatsModel->insertBoat($name, $capacity, $model); 
        $this->showAllBoats();
    }

    function insertExp() {
        $place = $_GET['place'];
        $days = $_GET['days'];
        $price = $_GET['price'];
        $description = $_GET['description'];
        $boat_id = $_GET['boat_id'];
     //verificar que los parametros vengan correctamente para poder insertar bien 
        $id = $this->expModel->insertExp($place, $days, $price, $description, $boat_id);
        $this->showAllExp();
    }

    function showFilterByBoat(){
        $boats = $this->boatsModel->getAll();
        $this->expView->showFilterByBoat($boats);
    }
    
    function add ($tupla){
        if ($tupla == 'boat'){
            $this->expView->showFormAddBoat();
        } else { 
            if ($tupla == 'experience'){
                $boats = $this->boatsModel->getAll();
                $this->expView->showFormAddExp($boats);
            }
        }
    }

    function modifyExpById($id){
        return;
    }

    function modifyBoatById($id){
        return;
    }
}