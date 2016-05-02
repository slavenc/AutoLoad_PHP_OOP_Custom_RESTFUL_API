<?php

namespace AutoShop\Database;

use AutoShop\Model\Car;
use AutoShop\View\ErrorResponse;
use Exception;

class CarQueryExecutor extends QueryExecutor {

    function __construct($db) {
        parent::__construct($db);
    }

    public function addCar(Car $car) {
        $sql = "INSERT INTO car (id_user, id_brand, id_model, year,  price , description )
                VALUES 
                ('{$car->getIdUser()}',
                '{$car->getIdBrand()}',
                '{$car->getIdModel()}',
                '{$car->getYear()}',
                '$car->getPrice()',
                '{$car->getDescription()}' )";

        if (!$this->db->query($sql) === true) {
            throw new Exception(ErrorResponse::cantAddUser(), 400);
        }
    }

    public function fetchAllBrands() {
        $sql = "SELECT * FROM brands";
        $result = $this->db->query($sql);
        $brands = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $brands[] = array('brandName' => $row['name'], 'idBrand' => $row['id']);
            }
        }
        return $brands;
    }

    public function fetchBrandModels($idBrand) {
        $sql = "SELECT * FROM car_model WHERE id_brand = {$idBrand}";

        $result = $this->db->query($sql);
        $models = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $models[] = array('modelName' => $row['name'], 'idModel' => $row['id']);
            }
        }
        return $models;
    }

    public function fetchBrandModelCars($idBrand, $idModel) {
        $sql = "SELECT c.id, c.description, c.year, c.price, cm.name AS carModel, b.name AS brandName "
                . "FROM car AS c "
                . "INNER JOIN car_model AS cm ON c.id_model = cm.id "
                . "INNER JOIN brands AS b ON b.id = cm.id_brand "
                . "WHERE b.id = {$idBrand} AND cm.id = {$idModel}";

        $result = $this->db->query($sql);
        $cars = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cars[] = $result[] = array(
                    'id' => $row['id'],
                    'description' => $row['description'],
                    'year' => $row['year'],
                    'carModel' => $row['carModel'],
                    'price' => $row['price'],
                    'brandName' => $row['brandName']
                );
            }
        }
        return $cars;
    }

    public function getCarById($idCar) {
        $sql = "SELECT c.id, c.description, c.year, c.price, cm.name AS carModel, b.name AS brandName, u.name, u.surname, u.email "
                . "FROM car AS c "
                . "INNER JOIN car_model AS cm ON c.id_model = cm.id "
                . "INNER JOIN brands AS b ON b.id = cm.id_brand "
                . "INNER JOIN user AS u ON c.id_user = u.id "
                . "WHERE c.id = $idCar ";

        $result = $this->db->query($sql);

        $car = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $car = array(
                    'user' => $row['name'],
                    'surname' => $row['surname'],
                    'email' => $row['surname'],
                    'id' => $row['id'],
                    'description' => $row['description'],
                    'year' => $row['year'],
                    'carModel' => $row['carModel'],
                    'price' => $row['price'],
                    'brandName' => $row['brandName']
                );
            }
        }
        return $car;
    }

}
