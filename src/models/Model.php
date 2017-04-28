<?php
/**
 * Created by PhpStorm.
 * User: mishabehey
 * Date: 4/20/17
 * Time: 2:19 AM
 */
namespace HMRTeam\hw4\models;
use \HMRTeam\hw4\configs as C;

class Model
{
    public $user;
    public $password;
    public $port;

    public function __construct()
    {
        $configs = new C\Config;
        $this->user = $configs->user;
        $this->password = $configs->password;
        $this->port = $configs->port;
    }

    public function connect()
    {
        return new \mysqli("127.0.0.1:" . $this->port, $this->user, $this->password);
    }

    public function connectTO ($db)
    {
        return new\mysqli("127.0.0.1:" . $this->port, $this->user, $this->password, $db);
    }
}