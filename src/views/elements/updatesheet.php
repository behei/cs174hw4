<?php
/**
 * Created by PhpStorm.
 * User: mishabehey
 * Date: 4/20/17
 * Time: 2:19 AM
 */

class updatesheet
{
    public function render($sheet_id, $sheet_data, $hash_code1, $hash_code2, $hash_code3)
    {
        $layout = new Layouts();
        $layout->header();
        echo '<h1><a href="index.php?c=Home&m=index"> Web Sheets </a> '.$sheet_id.'</h1>
     
                  <b>Edit Url :</b><input type="text" value="'.BASE_URL."index.php?c=Home&m=view&arg1=".$hash_code1.'">
                
                    <td><b>Read Url :</b><input type="text" value="'.BASE_URL."index.php?c=Home&m=view&arg1=".$hash_code2.'">
                
                    <td><b>File Url :</b><input type="text" value="'.BASE_URL."index.php?c=Home&m=view&arg1=".$hash_code3.'">
                
                        <div id="'.$sheet_id.'"></div>
                   ';
        echo ' <script src="./src/scripts/spreadsheet.js"></script>
                  <script type="text/javascript"> 
                  spreadsheet =  new Spreadsheet("'.$sheet_id.'",'.$sheet_data.',{"mode":"write"});
                  spreadsheet.draw();
                   
                    </script>';
        $layout->footer();
    }
}