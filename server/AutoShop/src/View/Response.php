<?php

namespace AutoShop\View;

class Response {

    public static function succesYes() {
        return array('succes' => 'yes');
    }

    public static function userIsLogged() {
        return array('succes' => 'yes', 'userMessage' => 'You are logged in as ' . $_SESSION['username'], 'userType' => $_SESSION['id_user_type']);
    }

    public static function logging($userType){
        return array('succes' => 'yes', 'userType' => $userType);
    }  
}
