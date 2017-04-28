<?php
/**
 * @author Mykhailo Behei
 * @author Hien Nguyen
 * @author Richard Lack
 */
namespace HMRTeam\hw4\views\layouts;
require_once('Layout.php');

class Header implements Layout {


    function render($data)
    {
        ?>
        <!doctype html>
        <html>
            <head>
                <title>Spreadsheet App <?=$data?></title>
            </head>

        <body>
        <?php
    }
}