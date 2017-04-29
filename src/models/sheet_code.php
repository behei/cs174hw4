<?php

class sheet_code extends dbclass {

    public function getCodeDetails($sheet) {
        $sql = "SELECT * FROM sheet NATURAL JOIN sheet_codes where  sheet_name = '" . $sheet . "' OR hash_code = '" . $sheet . "'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

     public function updatesheet( $sheet_data, $sheet_name) {
        $sql = "Update sheet set sheet_data=:sheet_data where sheet_name=:sheet_name";
        $query = $this->db->prepare($sql);
        $parameters = array(':sheet_name' => $sheet_name, ':sheet_data' => $sheet_data);
        $query->execute($parameters);
    }

    public function getCodes($sheet) {
        $sql = "SELECT * FROM sheet_codes where  sheet_id = " . $sheet;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function addSheet($sheet_name, $sheet_data) {

        $sql = "INSERT INTO sheet (sheet_name, sheet_data) VALUES (:sheet_name, :sheet_data)";
        $query = $this->db->prepare($sql);
        $parameters = array(':sheet_name' => $sheet_name, ':sheet_data' => $sheet_data);
        $query->execute($parameters);

        $sheetId = $this->db->lastInsertId();

        $codes = [];
        $logger = new Helper();
        $random = $logger->randomGenerator(8);
        $codes[] = $random;

        $sql = "INSERT INTO sheet_codes (sheet_id,hash_code, code_type) VALUES (:sheet_id,:hash_code, :code_type)";
        $query = $this->db->prepare($sql);
        $parameters = array(':sheet_id' => $sheetId, ':hash_code' => $random, ':code_type' => 0);
        $query->execute($parameters);

        $random = $logger->randomGenerator(8);
        while (in_array($random, $codes)) {
            $random = $logger->randomGenerator(8);
        }
        $codes[] = $random;
        $sql = "INSERT INTO sheet_codes (sheet_id,hash_code, code_type) VALUES (:sheet_id,:hash_code, :code_type)";
        $query = $this->db->prepare($sql);
        $parameters = array(':sheet_id' => $sheetId, ':hash_code' => $random, ':code_type' => 1);
        $query->execute($parameters);

        $random = $logger->randomGenerator(8);
        while (in_array($random, $codes)) {
            $random = $logger->randomGenerator(8);
        }
        $codes[] = $random;
        $sql = "INSERT INTO sheet_codes (sheet_id,hash_code, code_type) VALUES (:sheet_id,:hash_code, :code_type)";
        $query = $this->db->prepare($sql);
        $parameters = array(':sheet_id' => $sheetId, ':hash_code' => $random, ':code_type' => 2);
        $query->execute($parameters);

        return $codes;

    }

}
