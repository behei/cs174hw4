<?php
/**
 * Created by PhpStorm.
 * User: mishabehey
 * Date: 4/18/17
 * Time: 2:34 PM
 */

namespace HMRTeam\hw4;
require_once("Config.php");

//$hostname = \HMRTeam\hw4\Config::host . ":" . \HMRTeam\hw4\Config::port;

$db = new \mysqli("127.0.0.1", "root");

if ($db->connect_error) {
    die('Could not connect to the database');
}

echo "successfully connected\n";

$dbCreate = 'CREATE DATABASE spreadsheets';

if ($db->query($dbCreate) == true) {
    echo " created \n";
    //$db->select_db(Config::db);
} else {
    echo "Database could not be created" . $db->error . "\n";
    die;
}

mysqli_select_db($db, "spreadsheets");
/**
 * adding actual data tables
 */

$sql =
    "CREATE TABLE sheet (
  sheet_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  sheet_name VARCHAR (255) NOT NULL,
  sheet_data VARCHAR (255) NOT NULL
  )";


if ($db->query($sql) == true)
    echo "table created successfully";
else
    echo "error inserting table";


$sql = "CREATE TABLE sheet_code (
      sheet_id INT(11) NOT NULL,
       hash_code VARCHAR (30) NOT NULL, 
       code_type int (11) NOT NULL
      )";

if ($db->query($sql) == true)
    echo "table created successfully";
else
    echo "error inserting table";

$db->close();