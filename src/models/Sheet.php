<?php
/**
 * Created by PhpStorm.
 * User: mishabehey
 * Date: 4/24/17
 * Time: 10:17 AM
 */

class Sheet extends Model
{
    public $id;
    public $data;
    public $hash_codes;
    public $sheet_name;
    public $id_valid;

    public function __construct()
    {
        parent::__construct();
    }

    public function existingSheet ($sheet_name)
    {
        $this->sheet_name = $sheet_name;
        //here we would probably call a method to get data about existing sheet
    }

    //if we have a new sheet

    public function createSheet ($sheet_name, $data)
    {
        $this->sheet_name=$sheet_name;
        $this->data = $data;
        //in here we need something to instantiate a new sheet

        //connection to the database
        $mysqli = parent::connectTO("db");

        //handle connection failure
        if ($mysqli->connect_errno)
        {
            print ("failed to connect");
        }

        //we need to handle the IDs in here somehow

    }


    //method to get data about existing sheet
    public function retrieveSheet ()
    {
        //connect to database
        $mysqli = parent::connectTO("db"); //connect to db

        //handle error
        if ($mysqli->connect_errno)
        {
            print ("connection error");
        }

        // here we need a method to get an ID from the database

        if ($this->id < 0)
        {
            $this->id_valid = false;
            print ("can't be less than 0");
        }

        else
        {
            $this->id_valid = true; // id is aight
        }
    }
    //method used to insert sheets into the database
    public function insertSheetIntoDB()
    {

    }
    //method used to retrieve sheet's ID
    public function returnID ($mysqli, $name)
    {

    }
    //method used to retrieve the data from the DB
    public function returnData ($mysqli, $name)
    {

    }

}