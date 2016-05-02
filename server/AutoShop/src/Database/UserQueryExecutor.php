<?php

namespace AutoShop\Database;

use AutoShop\View\ErrorResponse;
use Exception;

class UserQueryExecutor extends QueryExecutor {

    function __construct($db) {
        parent::__construct($db);
    }

    public function isUserExist($username) {
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            throw new Exception(ErrorResponse::userExist(), 200);
        }
    }

    public function registerUser($data) {
        $sql = "INSERT INTO user (username, password, name,  surname, email, id_user_type )
        VALUES ('{$data['username']}', '{$data['password']}', '{$data['name']}', '{$data['surname']}', '{$data['email']}', 2 )";

        if (!$this->db->query($sql) === TRUE) {
            throw new Exception(ErrorResponse::cantAddUser(), 200);
        }

        return $this->db->insert_id;
    }

    public function fetchUser($username, $password) {
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = $this->db->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            throw new Exception(ErrorResponse::invalidUser(), 200);
        }
    }

    public function getUserByID($idUser) {
        $sql = "SELECT * FROM user WHERE id = {$idUser}";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();

        return array(
            'username' => $row['username'],
            'password' => $row['password'],
            'name' => $row['name'],
            'surname' => $row['surname'],
            'email' => $row['email']);
    }

}
