<?php

namespace AutoShop\Database;

class QueryExecutor {

    protected $db;

    function __construct($db) {
        $this->db = $db;
    }
}
