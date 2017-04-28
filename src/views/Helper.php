<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
class Helper {

    function checkName($sheet_name_code) {

        if (!preg_match("/^[a-zA-Z0-9 ]+$/", $sheet_name_code)) {
            return "Only alphanumeric and space allowed";
        }
        return true;
    }

    function randomGenerator($size) {
        $a[] = " ";
        $key = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'), $a);
        $result = '';

        for ($i = 0; $i < $size; $i++) {
            $result .= $key[array_rand($key)];
        }

        return $result;
    }

    function logger($message) {

        $log = new Logger('navigation');
        $log->pushHandler(new StreamHandler('./app_data/spread.log', Logger::DEBUG));
        $log->addInfo($message);
    }

}
