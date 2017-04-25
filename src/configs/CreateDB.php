<?php
/**
 * Created by PhpStorm.
 * User: mishabehey
 * Date: 4/18/17
 * Time: 2:34 PM
 */

namespace HMRTeam\hw4;
require_once("Config.php");

$hostname = \HMRTeam\hw4\Config::host . ":" . \HMRTeam\hw4\Config::port;

$db = new \mysqli($hostname, \HMRTeam\hw4\Config::user, \HMRTeam\hw4\Config::password);

if ($db->connect_error) {
    die('Could not connect to the database');
}

echo "successfully connection\n";

$dbCreate = 'CREATE DATABASE IF NOT EXISTS' .Config::db;

if ($db->query($dbCreate) == true) {
    echo Config::db . " created \n";
    $db->select_db(Config::db);
} else {
    echo "Database could not be created" . $db->error . "\n";
    die;
}


/**
 * adding actual datatables
 */

$tables = [
    "CREATE TABLE `sheet` (`id` INT NOT NULL AUTO_INCREMENT, `data` VARCHAR (100) NOT NULL
 ,PRIMARY KEY `id`)",
    "CREATE TABLE `sheet_code` (id INT NOT NULL AUTO_INCREMENT, sheet_id INT NOT NULL, sheet_name VARCHAR (100) NOT NULL,
 `hash_code` VARCHAR (8) NOT NULL, `type` VARCHAR (4) NOT NULL, PRIMARY KEY (`id`))"

];

foreach ($tables as $table){
    print ("$table ;\n");
    $outcome = \mysqli_query($db, $table);
    print ("Result: $outcome \n");
}
$db->close();