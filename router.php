<?php
require_once './app/controllers/mainController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');


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

    case 'experience':
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
        $tupla = ($params[1]);
        $mainController->add($tupla);
        break;


    case 'insert':
        if (isset($params[1])) {
            switch ($params[1]) {
                case  'experience':
                    $mainController->insertExp();
                    break;
                case  'boat':
                    $mainController->insertBoat();
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
                    $mainController->deleteExpById($id);
                    break;
                case  'boat':
                    $id = $params[2];
                    $mainController->deleteBoatById($id);
                    break;
                default:
                    echo ('404 Page not found');
                    break;
            }
        }
        break;

    case 'edit':
        if (isset($params[1])) {
            switch ($params[1]) {
                case  'experience':
                    $id = $params[2];
                    $mainController->showFomEditExp($id);
                    break;
                case  'boat':
                    $id = $params[2];
                    $mainController->showFomEditBoat($id);
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
                        $mainController->updateExp();
                        break;
                    case  'boat':
                        $mainController->updateBoat();
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
