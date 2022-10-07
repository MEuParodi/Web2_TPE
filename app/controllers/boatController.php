<?php
require_once './app/helpers/authHelper.php';
require_once './app/models/boatModel.php';
require_once './app/models/expModel.php';
require_once './app/views/boatView.php';


class BoatController {
    private $boatsModel;
    private $boatView;
    private $authHelper;

    public function __construct() {
        $this->boatsModel = new BoatsModel();
        $this->boatView = new boatView();
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

    }

    public function showAll() {
        $boats = $this->boatsModel->getAll();
        $this->boatView->showAll($boats);
    }

    public function deleteById($id) {
        // barrera de seguridad 
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

        $this->boatsModel->deleteById($id);
        $this->showAll();
    }

    public function insert() {
        // barrera de seguridad
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

        if (!empty($_POST['name']) && !empty($_POST['capacity']) && !empty($_POST['model'])) {
            $name = $_POST['name'];
            $capacity = $_POST['capacity'];
            $model = $_POST['model'];
            $id = $this->boatsModel->insertBoat($name, $capacity, $model);
        }
        $this->showAll();
    }

    public function add() {
        // barrera de seguridad
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        
        $this->boatView->showFormAddBoat();
    }

    public function Edit($id) {
        // barrera de seguridad
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

        $boat = $this->boatsModel->getBoatById($id);
        $this->boatView->showFormEditBoat($boat);
    }


    public function update() {
        // barrera de seguridad
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

        if (!empty($_POST) && isset($_POST['boat_id'])) {
            $id = $_POST['boat_id'];
            $name = $_POST['name'];
            $capacity = $_POST['capacity'];
            $model = $_POST['model'];
            $this->boatsModel->updateById($id, $name, $capacity, $model);
            $this->showAll();
        }
    }
}
