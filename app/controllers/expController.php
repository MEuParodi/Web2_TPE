<?php
require_once './app/helpers/authHelper.php';
require_once './app/models/expModel.php';
require_once './app/models/boatModel.php';
require_once './app/views/expView.php';

class ExpController{
    private $expModel;
    private $boatsModel;
    private $expView;
    private $authHelper;

    public function __construct() {
        $this->expModel = new ExpModel();
        $this->boatsModel = new BoatsModel();
        $this->expView = new ExpView();
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public function showAll(){

var_dump($_SESSION);

        $exps = $this->expModel->getAll();
        foreach ($exps as $exp){
            $exp->boat_id = $this->boatsModel->getBoatById($exp->boat_id)->name;
        }
        $this->expView->showExps($exps);
        $this->showFilterByBoat();
    }

    // ver si anda!! usa el nombre del boat que lo trae del boatController
    public function showById($id){
        $exp = $this->expModel->getExpById($id);
        $boat = $this->boatsModel->getBoatById($exp->boat_id);
        $this->expView->showExpById($exp, $boat);
    }

    public function insert() {
        // barrera de seguridad
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

        $place = $_POST['place'];
        $days = $_POST['days'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $boat_id = $_POST['boat_id'];
        $id = $this->expModel->insertExp($place, $days, $price, $description, $boat_id);
        $this->showAll();
    }

    public function showFilterByBoat(){
        $boats = $this->boatsModel->getAll();
        $this->expView->showFilterByBoat($boats);
    }

    public function add (){
        // barrera de seguridad
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

        $boats = $this->boatsModel->getAll();
        $this->expView->showFormAddExp($boats);
    }

    public function update(){
        // barrera de seguridad
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        
        if(!empty($_POST) && isset($_POST['exp_id'])){
            $id = $_POST['exp_id'];
            $place = $_POST['place'];
            $days = $_POST['days'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $boat_id = $_POST['boat_id'];
            $this->expModel->updateById($id, $place, $days, $price, $description, $boat_id);
            $this->showAll();
        }
    }

    public function Edit($id){
        // barrera de seguridad
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

        $exp = $this->expModel->getExpById($id);
        $boats = $this->boatsModel->getAll();
        $this->expView->showFormEditExp($exp, $boats); 
    }

    public function ExpByBoat($boat_id){
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

    public function deleteById($id){
        // barrera de seguridad
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

        $this->expModel->deleteById($id);
        $this->showAll();
    }
}