<?php

namespace AutoShop\Controller;

use AutoShop\Database\MySQLAdapter;
use AutoShop\Database\UserQueryExecutor;
use AutoShop\View\ErrorResponse;
use Exception;
<?php

namespace AutoShop\Controller;

use AutoShop\Database\MySQLAdapter;
use AutoShop\Database\UserQueryExecutor;
use AutoShop\View\ErrorResponse;
use Exception;

abstract class Controller {

    public $request;
    public $response = [];
    public $queryExecutor;
    public $db;

    protected abstract function makeQueryExecutor();

    public function initDb() {
        $this->db = MySQLAdapter::instance();
        $this->queryExecutor = $this->makeQueryExecutor();
    }

    public function setRequest($request) {
        
        foreach ($request as $key => $value) {
            $value = mysql_real_escape_string($value);
            if (!$value) {
                errorLog('Sql Injection Error');
                throw new Exception(ErrorResponse::badRequest(), 400);
            }
            $request["{$key}"] = $value;
        }
        $this->request = $request;
    }

    public abstract function executeAction();
}
abstract class Controller {

    public $request;
    public $response = [];
    public $queryExecutor;
    public $db;

    protected abstract function makeQueryExecutor();

    public function initDb() {
        $this->db = MySQLAdapter::instance();
        $this->queryExecutor = $this->makeQueryExecutor();
    }

    public function setRequest($request) {
        
        foreach ($request as $key => $value) {
            $value = mysql_real_escape_string($value);
            if (!$value) {
                errorLog('Sql Injection Error');
                throw new Exception(ErrorResponse::badRequest(), 400);
            }
            $request["{$key}"] = $value;
        }
        $this->request = $request;
    }

    public abstract function executeAction();
}
