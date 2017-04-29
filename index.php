<?php

require './vendor/autoload.php';

if (isset($_GET['m']) && isset($_GET['c'])) {
    $controller = new $_GET['c'];
    $method = $_GET['m'];
    $controller->$method();

} else {
    $controller = new MainController();
    $controller->start();
}