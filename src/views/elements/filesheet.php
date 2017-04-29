<?php

class filesheet 
{

    public function render($xml)
    {
     header('Content-type: text/xml');
     echo $xml;
    
    }
    
    
    
}

