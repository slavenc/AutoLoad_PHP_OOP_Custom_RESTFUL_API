<?php

namespace AutoShop\Controller;

use AutoShop\Database\UserQueryExecutor;
use AutoShop\Session\SessionHandler;
use AutoShop\View\ErrorResponse;
use AutoShop\View\Response;

class UserController extends Controller {

    public function executeAction() {
        switch ($this->request['action']) {
            case 'register':
                $this->register();
                break;
            case 'logIn':
                $this->logIn();
                break;
            case 'logOut':
                $this->logOut();
                break;
            case 'checkLogin':
                $this->checkLogin();
                break;
            case 'getUserInfo':
                $this->getUserInfo();
                break;
        }
    }

    private function register() {
        $this->queryExecutor->isUserExist($this->request['username']);
        $userId = $this->queryExecutor->registerUser($this->request);
        $session = new SessionHandler();
        $session->activateSession($this->request['username'], $userId, 2);
        $this->response = Response::succesYes();
    }

    private function logIn() {
        $user = $this->queryExecutor->fetchUser($this->request['username'], $this->request['password']);
        $session = new SessionHandler();
        $session->activateSession($user['username'], $user['id'], $user['id_user_type']);
        $this->response = Response::logging($user['id_user_type']);
    }

    private function logOut() {
        $session = new SessionHandler();
        $this->response = Response::succesYes();
    }

    private function checkLogin() {
        $session = new SessionHandler();
        if ($session->isUserLogged()) {
            $this->response = Response::userIsLogged();
        } else {
            $this->response = ErrorResponse::succesNo();
        }
    }

    private function getUserInfo() {
        $userID = (new SessionHandler())->getSessionID();
        $this->response = $this->queryExecutor->getUserByID($userID);
    }

    protected function makeQueryExecutor() {
        return new UserQueryExecutor($this->db);
    }

}
