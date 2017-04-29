<?php
class readsheet 
{
    public function render($sheetId,$sheetData, $hash1, $hash2, $hash3)
      $layout = new Layouts();
      $layout->header();
        echo '<h1><a href="index.php?c=MainController&m=start"> Web Sheets </a> '.$sheetId.'</h1>
            <table>
                <tr>
               <td><b>File Url :</b><input type="text" value="'.BASE_URL."index.php?c=MainController&m=view&arg1=".$hash3.'"></td>
                </tr>
                <tr>
                  <td>
                     <div id="'.$sheetId.'"></div>
                  </td> 
                </tr>
            </table>';
              echo ' <script src="./src/scripts/spreadsheet.js"></script>
                  <script type="text/javascript"> 
                  spreadsheet =  new Spreadsheet("'.$sheetId.'",'.$sheetData.',{"mode":"read"});
                  spreadsheet.draw();
                   </script>';
       
       $layout->footer();   
    }}

