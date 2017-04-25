<?php
/**
 * Created by PhpStorm.
 * User: mishabehey
 * Date: 4/24/17
 * Time: 10:17 AM
 */

namespace HMRTeam\hw4\models;
class Sheet extends Model
{
    public $sheet_id;
    public $data;
    //public $hash_codes;
    public $sheet_name;
    public $sheet_id_valid;

    public function __construct()
    {
        parent::__construct();
    }

    public function existingSheet($sheet_name)
    {
        $this->sheet_name = $sheet_name;
        $this->retrieveSheet(); //sheet already exists
        //here we would probably call a method to get data about existing sheet
    }

    //if we have a new sheet

    public function createSheet($sheet_name, $data)
    {
        //$this->sheet_id = $sheet_id;
        $this->sheet_name = $sheet_name;
        $this->data = $data;
        //in here we need something to instantiate a new sheet
        $this->insertSheetIntoDB();
        //connection to the database
        $mysqli = parent::connectTO("db");

        //handle connection failure
        if ($mysqli->connect_errno) {
            print ("failed to connect");
        }

        //we need to handle the IDs in here somehow


        if ($this->sheet_id < 0)
            $this->sheet_id_valid = false;
        else
            $this->sheet_id_valid = true;

    }


    //method to get data about existing sheet
    public function retrieveSheet()
    {
        //connect to database
        $mysqli = parent::connectTO("db"); //connect to db

        //handle error
        if ($mysqli->connect_errno) {
            print ("connection error");
        }

        // here we need a method to get an ID from the database

        if ($this->sheet_id < 0) {
            $this->sheet_id_valid = false;
            print ("can't be less than 0");
        } else {
            $this->sheet_id_valid = true; // id is aight
        }

        $mysqli->close();
    }

    //method used to insert sheets into the database
    public function insertSheetIntoDB()
    {
        $mysqli = parent::connectTO("spreadsheet");

        $sql = "INSERT INTO spreadsheet ($this->id, $this->sheet_name, $this->data) VALUES ($this->id, $this->sheet_name, $this->data)";
        if ($mysqli->query($sql) == true) {
            $last_id = $mysqli->insert_id;
            echo "New record created. Last ID" . $last_id;
        } else
            echo "ERROR: " . $sql . "<br>" . $mysqli->connect_errno;

        $mysqli->close();
    }

    //not sure if we need this tbh
    public function returnID($mysqli, $name)
    {
        $sql = "SELECT id FROM `sheet` WHERE name='$name'";
        if ($mysqli->query($sql) == true)
        {
            $row = $mysqli->query($sql)->fetch_assoc();
            $id = $row["id"];
            if (empty($id))
                $id = -1;
            $mysqli->query($sql)->free();
        }

        return $id;

    }

    //method used to retrieve the data from the DB
    public function returnData($mysqli, $name)
    {
        $sql = "SELECT data FROM `sheet` WHERE name='$name'";
        if ($mysqli->query($sql) == true)
        {
            $row = $mysqli->query($sql)->fetch_assoc();
            $data = $row["data"];
        }

        return $data;
    }

}