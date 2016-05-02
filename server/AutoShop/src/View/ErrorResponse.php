<?php

namespace AutoShop\View;

class ErrorResponse {

    private $response;

    public static function userExist() {
        return json_encode(array('succes' => 'no', 'error' => 'User alredy exisit'));
    }

    public static function cantAddUser() {
        return json_encode(array('succes' => 'no', 'error' => 'Cant add user'));
    }

    public static function cantAddCar() {
        return json_encode(array('succes' => 'no', 'error' => 'Cant add Car'));
    }

    public static function succesNo() {
        return array('succes' => 'no');
    }

    public static function invalidUser() {
        return array('succes' => 'no', 'error' => 'Invalid user');
    }

    public static function badRequest() {
        return array('succes' => 'no', 'error' => 'Bad request');
    }

    public static function internalServerError() {
        return array('succes' => 'no', 'error' => 'Internal server error');
    }

}
