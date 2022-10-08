<?php
require_once './app/helpers/authHelper.php';
require_once './app/models/expModel.php';
require_once './app/models/boatModel.php';
require_once './app/views/expView.php';

class ExpController{
    private $expModel;
    private $boatModel;
    private $expView;
    private $authHelper;

    public function __construct() {
        $this->expModel = new ExpModel();
        $this->boatModel = new BoatModel();
        $this->expView = new ExpView();
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public function showAll(){
        $exps = $this->expModel->getAll();
        foreach ($exps as $exp){
            $exp->boat_id = $this->boatModel->getById($exp->boat_id)->name;
        }
        $this->expView->showAll($exps);
        $this->showFilterByBoat();
    }

    public function showById($id){
        $exp = $this->expModel->getById($id);
        $boat = $this->boatModel->getById($exp->boat_id);
        $this->expView->showById($exp, $boat);
    }

    public function showFilterByBoat(){
        $boats = $this->boatModel->getAll();
        $this->expView->showFilterByBoat($boats);
    }

    public function ShowExpByBoat($boat_id){
        $exps = $this->expModel->getByBoat($boat_id);
        foreach ($exps as $exp){
            $exp->boat_id = $this->boatModel->getById($exp->boat_id)->name;
        }
        $this->expView->showAll($exps);
        $this->showFilterByBoat();
    }

    // *********** admin functions ****************

    public function securityBar(){
        // barrera de seguridad 
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
    }

    public function insert() {
        $this->securityBar();
        $place = $_POST['place'];
        $days = $_POST['days'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $boat_id = $_POST['boat_id'];
        $id = $this->expModel->insert($place, $days, $price, $description, $boat_id);
        $this->showAll();
    }

    public function add (){
        $this->securityBar();
        $boats = $this->boatModel->getAll();
        $this->expView->showFormAdd($boats);
    }

    public function update(){
        $this->securityBar();
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
        $this->securityBar();
        $exp = $this->expModel->getById($id);
        $boats = $this->boatModel->getAll();
        $this->expView->showFormEdit($exp, $boats); 
    }


    public function deleteById($id){
        $this->securityBar();
        $this->expModel->deleteById($id);
        $this->showAll();
    }
}