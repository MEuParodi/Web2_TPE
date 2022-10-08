<?php
require_once './app/helpers/authHelper.php';
require_once './app/models/boatModel.php';
require_once './app/models/expModel.php';
require_once './app/views/boatView.php';


class BoatController {

    private $authHelper;
    private $boatModel;
    private $expModel;
    private $boatView;

    public function __construct() {
        $this->boatModel = new BoatModel();
        $this->expModel = new ExpModel();
        $this->boatView = new boatView();
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public function showAll($warning = null, $boat_id = null) {
        $boats = $this->boatModel->getAll();
        $this->boatView->showAll($boats, $warning, $boat_id);
    }

    public function deleteById($boat_id) {
        // barrera de seguridad 
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        $exps = $this->expModel->getExpByBoat($boat_id);
        if (!empty($exps)) //hay experiencias con esta categoria
            $this->showAll(count($exps). "experiences have this category. Do you want to delete?", $boat_id);
        else 
        $this->removeById($boat_id); 
    }

    public function removeById($boat_id) {
        // barrera de seguridad 
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        $this->boatModel->deleteById($boat_id);
        $this->showAll();
    }

    public function add() {
        // barrera de seguridad
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        $this->boatView->showFormAddBoat();
    }

    public function insert() {
        // barrera de seguridad
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        if (!empty($_POST['name']) && !empty($_POST['capacity']) && !empty($_POST['model'])) {
            $name = $_POST['name'];
            $capacity = $_POST['capacity'];
            $model = $_POST['model'];
            $image = $_POST['image'];
            $id = $this->boatModel->insertBoat($name, $capacity, $model, $image);
        }
        $this->showAll();
    }

    public function Edit($id) {
        // barrera de seguridad
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        $boat = $this->boatModel->getBoatById($id);
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
            $image = $_POST['image'];
            $this->boatModel->updateById($id, $name, $capacity, $model, $image);
            $this->showAll();
        }
    }
}
