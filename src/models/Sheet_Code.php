<?php
/**
 * Created by PhpStorm.
 * User: mishabehey
 * Date: 4/25/17
 * Time: 1:56 AM
 */

namespace HMRTeam\hw4\models;


class Sheet_Code extends Model
{
    public $sheet_id;
    public $sheet_name;
    public $hash_code_sheet;
    public $code_type;
    public $sheet_id_valid;

    public function __construct()
    {
        parent::__construct();
    }

    //first, user should be able to directly type the hash_code and retrieve needed spreadsheet
    public function hashCodeExists($hash_code)
    {
        $this->hash_code_sheet = $hash_code;
        //here goes the method to retrieve the data from the db
    }

    //to add a new spreadsheet, we need instantiate all the fields

    public function createNewSheet($sheet_id, $sheet_name, $hash_code_sheet, $code_type)
    {
        $this->sheet_id = $sheet_id;
        $this->sheet_name = $sheet_name;
        $this->hash_code_sheet = $hash_code_sheet;
        $this->code_type = $code_type;

        //need to access db at this point
        $db = parent::connectTO("db");
        if ($db->connect_errno)
        {
            print("error");
        }
        //here we have to setup the method to assign the ID
        //first we get the ID from the DB and set it to equal to our sheet id
        //and put data into the database

        //$this->id = $this-> //method to get and set the ID
        //$this-> //method to put sheet_id, sheet_name, hash_code_sheet into db

        //handle bad ID here
        if ($this->sheet_id <0)
        {
            $this->sheet_id_valid = false;
        }
        else{
            $this->sheet_id_valid = true;
        }
    }
}