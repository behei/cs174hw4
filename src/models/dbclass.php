<?php

class dbclass {
      public $db = null;

    function __construct()
    {
        if(!$this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS))
            Echo "Failed to connect to db";
        
    }
}
