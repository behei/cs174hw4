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

    }
}