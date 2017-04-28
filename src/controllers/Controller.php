<?php
/**
 * @author Mykhailo Behei
 * @author Hien Nguyen
 * @author Richard Lack
 */


namespace HMRTeam\hw4\controllers;
use HMRTeam\hw4\views as views;

/**
 * Class Controller
 * @package HMRTeam\hw4\controllers
 *
 *
 */

class Controller {
    //handle views in here
    private $data;
    function render() {
        $data ='';
        $this->landingView = new views\views\landing('landing');
        $this->landingView->display($data);
    }
}