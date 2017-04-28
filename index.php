<?php

require __DIR__ . '/vendor/autoload.php';
use HMRTeam\hw4\controllers as Contoller;


//in here we would add a controller once we get the solution 3 back
//nothing else goes on index.php page but controller
if(!isset($_REQUEST['c']))
{
	header("Location: index.php?c=MainController");
}
else{


}


//checks if there is a new list to be saved into the database
if (isset($_POST['goButton']))
{
	
}