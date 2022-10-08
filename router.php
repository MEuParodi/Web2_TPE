<?php
require_once './app/controllers/authController.php';
require_once './app/controllers/boatController.php';
require_once './app/controllers/expController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');


$action = 'experience'; // acción por default si no envían
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'login':
        $authController = new AuthController();
        $authController->showFormLogin();
        break;
    case 'validate':
        $authController = new AuthController();
        $authController->validateUser();
        break;
    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;
    case 'experience':
        $expController = new ExpController();
        if (isset($params[1])) {
            if (isset($params[2]) && ($params[1] == 'boats')) { //experience/boats/:boat_id
                $id = $params[2];
                $expController->ShowExpByBoat($id);
            } else {
                $id = $params[1]; //experience/:id
                $expController->showById($id);
            }
        } else {
            $expController->showAll();
        }
        break;
    case 'boat':
        $boatController = new BoatController();
        $boatController->showAll();
        break;
    case 'add':
        if (isset($params[1])) {
            switch ($params[1]) {
                case  'experience':
                    $expController = new ExpController();
                    $expController->add();
                    break;
                case  'boat':
                    $boatController = new BoatController();
                    $boatController->add();
                    break;
                default:
                    echo ('404 Page not found');
                    break;
            }
        }
        break;
    case 'insert':
        if (isset($params[1])) {
            switch ($params[1]) {
                case  'experience':
                    $expController = new ExpController();
                    $expController->insert();
                    break;
                case  'boat':
                    $boatController = new BoatController();
                    $boatController->insert();
                    break;
                default:
                    echo ('404 Page not found');
                    break;
            }
        }
        break;
    case 'delete':
        if (isset($params[1])) {
            switch ($params[1]) {
                case  'experience':
                    $id = $params[2];
                    $expController = new ExpController();
                    $expController->deleteById($id);
                    break;
                case  'boat':
                    $id = $params[2];
                    $boatController = new BoatController();
                    $boatController->deleteById($id);
                    break;
                default:
                    echo ('404 Page not found');
                    break;
            }
        }
        break;

    case 'remove':
        $id = $params[2];
        $boatController = new BoatController();
        $boatController->removeById($id);
        break;

        case 'edit':
        if (isset($params[1])) {
            switch ($params[1]) {
                case  'experience':
                    $id = $params[2];
                    $expController = new ExpController();
                    $expController->Edit($id);
                    break;
                case  'boat':
                    $id = $params[2];
                    $boatController = new BoatController();
                    $boatController->Edit($id);
                    break;
                default:
                    echo ('404 Page not found');
                    break;
            }
        }
        break;

    case 'update':
        if (isset($params[1])) {
            switch ($params[1]) {
                case  'experience':
                    $expController = new ExpController();
                    $expController->update();
                    break;
                case  'boat':
                    $boatController = new BoatController();
                    $boatController->update();
                    break;
                default:
                    echo ('404 Page not found');
                    break;
            }
        }
        break;
    default:
        echo ('404 Page not found');
        break;
}
