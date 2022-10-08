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

    public function securityBar(){
        // barrera de seguridad 
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
    }

    public function deleteById($boat_id) {
        $this->securityBar();
        $exps = $this->expModel->getByBoat($boat_id);
        if (!empty($exps)) //hay experiencias con esta categoria
            $this->showAll(count($exps). "experiences have this category. Do you want to delete?", $boat_id);
        else 
        $this->removeById($boat_id); 
    }

    public function removeById($boat_id) {
        $this->securityBar();
        $this->boatModel->deleteById($boat_id);
        $this->showAll();
    }

    public function add() {
        $this->securityBar();
        $this->boatView->showFormAdd();
    }

    public function insert() {
        $this->securityBar();
        if (!empty($_POST['name']) && !empty($_POST['capacity']) && !empty($_POST['model'])) {
            $name = $_POST['name'];
            $capacity = $_POST['capacity'];
            $model = $_POST['model'];
            $image = $_POST['image'];
            $id = $this->boatModel->insert($name, $capacity, $model, $image);
        }
        $this->showAll();
    }

    public function Edit($id) {
        $this->securityBar();
        $boat = $this->boatModel->getById($id);
        $this->boatView->showFormEdit($boat);
    }

    public function update() {
        $this->securityBar();
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
