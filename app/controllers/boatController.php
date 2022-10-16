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

    public function showError($error, $errorNumber, $location) {
        $this->boatView->showError($error, $errorNumber, $location);
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
            $this->showAll(count($exps)." experiences have this category and will be deleted too. Are you sure?", $boat_id);
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
        if (!empty($_POST['name']) && !empty($_POST['capacity']) && !empty($_POST['model']))  {
            $name = $_POST['name'];
            $capacity = $_POST['capacity'];
            $model = $_POST['model'];
            $image = $_POST['image'];

            $boatWhithThisName = $this->boatModel->getByName($name);
            if (!empty($boatWhithThisName)){
                $this->showError("The name of the boat already exist. Try with other name.", 1, "add/boat");
            }else{    
                $id = $this->boatModel->insert($name, $capacity, $model, $image);
                $this->showAll();
            }
        }else{
          $this->showError("All fields must be completed", 1, "add/boat");
        }
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
