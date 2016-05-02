<?php

namespace AutoShop\Model;

class Car {

    private $id;
    private $idBrand;
    private $idModel;
    private $year;
    private $price;
    private $description;
    private $idUser;

    public function setCarDetail($data) {
        $this->idBrand = $data['idBrand'];
        $this->idModel = $data['idModel'];
        $this->year = $data['year'];
        $this->price = $data['price'];
        $this->description = $data['description'];
        $this->idUser = $data['idUser'];
    }

    public function getIdBrand() {
        return $this->idBrand;
    }

    public function getIdModel() {
        return $this->idModel;
    }

    public function getYear() {
        return $this->year;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getIdUser() {
        return $this->idUser;
    }

}
