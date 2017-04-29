<?php
class landingview 
{
    public function render()
    {
      $layout = new Layouts();
      $layout->header();
        echo '<div id="error"></div><a href="index.php?c=MainController&m=start"><h1>Web Sheets</h1></a>
            <table>
                <tr>
                    <td>
                        <form method="post" name="sheets" action="index.php?c=MainController&m=getSheet" onsubmit="return validateForm()">
                        <input type="text" name="spreadsheet" placeholder="New sheet name or code"/>
                        <input type="submit" value="GO" name="go"/>
                        </form>
                    </td>  
                </tr>
            </table>';
       $layout->footer();
    
    }

     public function renderwitherror($error,$datapassed)
    {  
      $layout = new Layouts();
      $layout->header();
        if(isset($error) && !empty($error)){
            echo "<div class='error'>".$error."</div>";
        }
        echo '<a href="index.php?c=MainController&m=start"><h1>Web Sheets</h1></a>
            <table>
                <tr>
                    <td>
                        <form method="post" name="sheets" action="index.php?c=MainController&m=getSheet"  onsubmit="return validateForm()">
                        <input type="text" name="spreadsheet" placeholder="New sheet name or code" value="'.$datapassed.'"/>
                        <input type="submit" value="GO" name="go"/>
                        </form>
                    </td>
                    </tr>
            </table>';
  
       $layout->footer();
    }}

