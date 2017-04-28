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

$dbCreate = 'CREATE DATABASE IF NOT EXISTS' . Config::db;

if ($db->query($dbCreate) == true) {
    echo Config::db . " created \n";
    $db->select_db(Config::db);
} else {
    echo "Database could not be created" . $db->error . "\n";
    die;
}


/**
 * adding actual data tables
 */

$tables = [
    "CREATE TABLE IF NOT EXISTS `sheet` (`sheet_id`(11) INT NOT NULL AUTO_INCREMENT,
  `sheet_name` VARCHAR (255) NOT NULL,
  `sheet_data` TEXT NOT NULL,
 ,PRIMARY KEY `sheet_id`)",
    "CREATE TABLE IF NOT EXISTS `sheet_code` (
      `sheet_id` INT(11) NOT NULL,
       `hash_code` VARCHAR (30) NOT NULL, 
       `code_type` int (11) NOT NULL,
      )"

];

foreach ($tables as $table) {
    print ("$table ;\n");
    $outcome = \mysqli_query($db, $table);
    print ("Result: $outcome \n");
}
$db->close();