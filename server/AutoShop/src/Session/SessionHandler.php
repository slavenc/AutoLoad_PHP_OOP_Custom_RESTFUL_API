<?php

namespace AutoShop\Session;

use AutoShop\View\ErrorResponse;
use Exception;

class SessionHandler {

    public function activateSession($username, $id, $userType = 2) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $id;
        $_SESSION['id_user_type'] = $userType;
    }

    public function isUserLogged() {
        session_start();
        if (!isset($_SESSION['username'])) {
            return false;
        } else {
            return true;
        }
    }

    public function isAuthorized() {
        if (!$this->isUserLogged()) {
            throw new Exception(ErrorResponse::badRequest(), 400);
        }
    }

    public function sessionDestroy() {
        session_destroy();
    }

    public function getSessionID() {
        session_start();
        return $_SESSION['id'];
    }

}
