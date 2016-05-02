<?php

error_reporting(E_ALL);

require '../vendor/autoload.php';
require '../init/init.inc.php';

use AutoShop\Controller\ContollerFactory;
use AutoShop\View\ErrorResponse;
use Exception;

if (isset($_POST['action'])) {
    $request = $_POST;
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $request = $_GET;
    $action = $_GET['action'];
} else {
    errorLog('Unsupported method!');
    throw new Exception(ErrorResponse::badRequest(), 400);
}


header('Content-Type: application/json');


try {
    $controller = ContollerFactory::makeControllerFromAction($action);
    $controller->setRequest($request);
    $controller->initDb();
    $controller->executeAction();
    echo json_encode($controller->response);
} catch (Exception $exc) {
    echo json_encode(json_decode($exc->getMessage()));
}




