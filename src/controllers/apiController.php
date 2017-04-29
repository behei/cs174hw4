<?php

class apiController {

    public function update() {
        // log the update
        $logger = new Helper();
        $logger->logger("Visited Updating via Ajax Page");

        // post the update
        $name = trim($_POST['sheetname']);
        $data = trim($_POST['sheetdata']);
        $model = new sheet_code();
        $model->updatesheet($sheet_data, $sheet_name);
    }

}
