<?php

/**
 * Created by PhpStorm.
 * User: mishabehey
 * Date: 4/20/17
 * Time: 2:19 AM
 */
class readsheet
{
    public function render($sheet_id, $sheet_data, $hash_code1, $hash_code2, $hash_code3)
    {
        $layout = new Layouts();
        $layout->header();
        echo '
            <h1><a href="index.php?c=MainController&m=index">Web Sheets</a>' . $sheet_id . '</h1>
            <b>File URL:</b>
           <input type="text" value="'.BASE_URL."index.php?c=MainController&m=view&arg1=".$hash_code3.'">
        ';

        echo ' <script src="./src/scripts/spreadsheet.js"></script>
                  <script type="text/javascript"> 
                  spreadsheet =  new Spreadsheet("' . $sheet_id . '",' . $sheet_data . ',{"mode":"read"});
                  spreadsheet.draw();
                   
                    </script>';
       $layout->footer();
    }

}
