<?php
require_once './app/controllers/mainController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


$action = 'home'; // acción por default si no envían
if (!empty($_GET['action'])) { //lee la acción
    $action = $_GET['action'];
} 

// instancio el unico controller que existe por ahora
$mainController = new MainController();

//parseo los parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $mainController->showHome();
        break;

        case 'experiences': 
        if (isset($params[1])) {
            $id = $params[1]; 
            $mainController->showExpById($id);
        } else {
            $mainController->showAllExp(); 
        }
        break;

        case 'boats': 
            if (isset($params[1])) {
                $id = $params[1]; 
                $mainController->showExpByBoat($id);
            } else {
                $mainController->showAllBoats(); 
            }
            break;

    case 'add':
        $mainController->addExp();
        break;

    case 'delete':
        $id = $params[1];
        $mainController->deleteExpById($id);
        break;
    default:
        echo('404 Page not found');
        break;
    
}


?>