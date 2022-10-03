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

    public function addExp(){
        $newExp = $_GET['exp']; //esto lo toma del formulario
     //   $id = $this->expModel->insert($newExp); //el id por ahora no se usa
        
        header("Location" . BASE_URL);
    }
 
    public function deleteExpById($id){
        $this->expModel->deleteById($id);
        header("Location" . BASE_URL);

    }

    public function showAllBoats(){
        $boats = $this->boatsModel->getAll();
        $this->expView->showAllBoats($boats);
    }

    function addBoat() {
        $place = $_POST['place'];
        $days = $_POST['days'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $boat_id = $_POST['boat_id'];

        $id = $this->model->insertBoat($place, $days, $price, $description, $boat_id);

        header("Location: " . BASE_URL); 
    }

    function showFilterByBoat(){
        $boats = $this->boatsModel->getAll();
        $this->expView->showFilterByBoat($boats);
    }
    
    
}