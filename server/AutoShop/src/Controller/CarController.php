<?php

namespace AutoShop\Controller;

use AutoShop\Database\CarQueryExecutor;
use AutoShop\Model\Car;
use AutoShop\Session\SessionHandler;

class CarController extends Controller {

    public function executeAction() {
        switch ($this->request['action']) {
            case 'addCar':
                $this->addCar();
                break;
            case 'loadBrands':
                $this->loadBrands();
                break;
            case 'loadCarInfo':
                $this->loadCarInfo();
                break;
            case 'loadCars':
                $this->loadCars();
                break;
            case 'loadModels':
                $this->loadModels();
                break;
        }
    }

    private function addCar() {
        $session = new SessionHandler();
        $session->isAuthorized();

        $car = new Car();
        $this->request['idUser'] = $session->getSessionID();
        $car->setCarDetail($this->request);

        $this->queryExecutor->addCar($car);
        $this->response = Response::succesYes();
    }

    private function loadBrands() {
        $this->response = $this->queryExecutor->fetchAllBrands();
    }

    private function loadModels() {
        $this->response = $this->queryExecutor->fetchBrandModels($this->request['idBrand']);
    }

    private function loadCars() {
        $this->response = $this->queryExecutor->fetchBrandModelCars($this->request['idBrand'], $this->request['idModel']);
    }

    private function loadCarInfo() {
        $this->response = $this->queryExecutor->getCarById($this->request['idCar']);
    }

    protected function makeQueryExecutor() {
        return new CarQueryExecutor($this->db);
    }

}
