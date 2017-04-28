<?php

namespace HMRTeam\hw4\views\views;

class landing
{
    function render()
    {
        $layout = new \Layouts();
        $layout->header();
        echo '
                <h1><a href="index.php?c=Home&m=index">Web Sheets</a></h1>
                <form method="post" name="sheets" action="index.php?c=Home&m=docheck"
                onsubmit="return validateForm()">
                <input type="text" name="spreadsheet" placeholder="Enter sheet name or hash code" />
                <input type="submit" value="GO" name="go"/>
                
                </form>
            
            ';
        $layout->footer();
    }
}