<?php

namespace AutoShop\Database;

use AutoShop\View\ErrorResponse;
use Exception;
use mysqli;
use mysqli_sql_exception;
use function errorLog;

class MySQLAdapter extends mysqli {

    private $host = 'localhost';
    private $account = 'root';
    private $password = 'root';
    private $database = 'Auto';
    private static $instance;

    private function __construct() {

        try {
            parent::__construct($this->host, $this->account, $this->password, $this->database);
            parent::set_charset('utf8');
        } catch (mysqli_sql_exception $e) {
            errorLog(sprintf("Connect failed: %s\n", mysqli_connect_error()));
            throw new Exception(ErrorResponse::internalServerError());
        }
    }

    static function instance() {

        if (!self::$instance)
            self::$instance = new MySQLAdapter;

        return self::$instance;
    }

    function query($query) {
        $result = parent::query($query);
        
        if (mysqli_error($this)) {//provjeravam jeli ima greske - gotova funkcija
            errorLog(mysqli_error($this) . ' - ' . $query);
            throw new Exception(ErrorResponse::internalServerError());
        }

        return $result;
    }

}
