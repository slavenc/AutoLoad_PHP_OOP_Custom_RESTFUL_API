<?php

namespace AutoShop\Controller;

use AutoShop\View\ErrorResponse;
use Exception;

class ContollerFactory {

    public static function makeControllerFromAction($action) {

        $controller = null;

        switch ($action) {
            case in_array($action, ['register', 'logIn', 'logOut', 'checkLogin', 'getUserInfo']):
                $controller = new UserController();
                break;
            case in_array($action, ['addCar', 'loadBrands', 'loadCarInfo', 'loadCars', 'loadModels']):
                $controller = new CarController();
                break;
            default:
                errorLog("Cant make Controller");
                throw new Exception(ErrorResponse::badRequest(), 400);
        }
        
        return $controller;
    }

}
