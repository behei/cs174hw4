<?php

class MainController {
    
    // Will display the landing page 
    public function start() {
        $logger = new Helper();
        $logger->logger("Visited Landing");
        $view = new landingview();
        $view->render();
    }
    
    // if there was an error in finding sheet display this
    public function ifError($error, $data) {
        $logger = new Helper();
        $logger->logger("Landing Page with error:" . $error);
        $view = new landingview();
        $view->renderwitherror($error, $data);
    }
 
    // if user enters a hash code or name then find the sheet
    public function getSheet() {
        $logger = new Helper();

        if (isset($_POST['spreadsheet']) && !empty($_POST['spreadsheet'])) {
            $name = trim($_POST['spreadsheet']);
            $var = $logger->checkName($name);
           
            if (!is_string($var)) {
                $model = new sheet_code();
                $result = $model->getCodeDetails($name);
                
                if (count($result) != 0) {
                    $results = $model->getCodes($result[0]['sheet_id']);
                    $codes;
                    $code_type = "";
                    foreach ($results as $r) {
                        $codes [] = $r['hash_code'];
                        if ($name == $r['hash_code']) {
                            $code_type = $r['code_type'];
                        }}
                    
                    if ($code_type == 0)
                        $this->update($result[0]['sheet_name'], $result[0]['sheet_data'], $codes[0], $codes[1], $codes[2]);
                    else if ($code_type == 1)
                        $this->read($result[0]['sheet_name'], $result[0]['sheet_data'], $codes[0], $codes[1], $codes[2]);
                    else if ($code_type == 2)
                        $this->file($result[0]['sheet_name'], $result[0]['sheet_data']);
                    else
                        $this->update($result[0]['sheet_name'], $result[0]['sheet_data'], $codes[0], $codes[1], $codes[2]);
                } else {
                    
                    // create a new sheet if it doesnt exist
                    $result = $model->addSheet($name, '[[,],[,]]');
                    $codes;
                   
                    foreach ($result as $result) {
                        $codes[] = $result;
                    }
                    $this->update($name, '[[,],[,]]', $codes[0], $codes[1], $codes[2]);
                }
            } else {
                // error
                $this->ifError($var, $name);
            }
        } else {

            $this->ifError("You must enter a valid name or code!", NULL);
        }
    }

    public function view() {
        $logger = new Helper();

        if (isset($_GET['arg1']) && !empty($_GET['arg1'])) {
            $name = trim($_GET['arg1']);
            $var = $logger->checkName($name);
            if (!is_string($var)) {
                // looking for new/existing spreadsheet
                $model = new sheet_code();
                $result = $model->getCodeDetails($name);

                if (count($result) > 0) {
                    $results = $model->getCodes($result[0]['sheet_id']);
                    $code_type = "";
                    $codes;
                    foreach ($results as $r) {
                        $codes [] = $r['hash_code'];
                        if ($name == $r['hash_code']) {
                            $code_type = $r['code_type'];
                        }
                    }
                    //exit
                    if ($code_type == 0)
                        $this->update($result[0]['sheet_name'], $result[0]['sheet_data'], $codes[0], $codes[1], $codes[2]);
                    else if ($code_type == 1)
                        $this->read($result[0]['sheet_name'], $result[0]['sheet_data'], $codes[0], $codes[1], $codes[2]);
                    else if ($code_type == 2)
                        $this->file($result[0]['sheet_name'], $result[0]['sheet_data']);
                } else {
                    $this->ifError("This hash code doesn't exist", NULL);
                }
            } else {
                // error
                $this->ifError($var, $name);
            }
        } else {

            $this->ifError("You must enter a valid name or code!", NULL);
        }
    }

    public function update($sheet_id, $sheet_data, $hash1, $hash2, $hash3) {
        $logger = new Helper();
        $logger->logger("Visited edit page ");
        $view = new updatesheet();
        $view->render($sheet_id, $sheet_data, $hash1, $hash2, $hash3);
    }

    public function read($sheet_id, $sheet_data, $hash1, $hash2, $hash3) {
        $logger = new Helper();
        $logger->logger("Visited read page");
        $view = new readsheet();
        $view->render($sheet_id, $sheet_data, $hash1, $hash2, $hash3);
    }

    public function file($sheet_id, $sheet_data) {
        $logger = new Helper();
        $logger->logger("Visited file page");
        $xml = '<?xml version="1.0" encoding="iso-8859-1"?>
                <!DOCTYPE spreadsheet SYSTEM "spreadsheet.dtd">
                <spreadsheet>
                <title>' . $sheet_id . '</title>
                <rows>';
        $sheet_data =  json_decode($sheet_data);
        foreach ($sheet_data as $rows) {
            $xml.="<row>";
            foreach ($rows as $element) {
                $xml .="<element>".$element."</element>";
                
            }
            $xml.="</row>";
        }
        $xml.="</rows>
               </spreadsheet>";
        $view = new filesheet();
        $view->render($xml);
    }

}
