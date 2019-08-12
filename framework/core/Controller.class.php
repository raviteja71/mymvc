<?php

// Base Controller

class Controller
{

    // Base Controller has a property called $loader, it is an instance of Loader class(introduced later)

    protected $loader;
    
    public $data;

    public function __construct() {
        $this->data = $_GET;
        //$this->loader = new Loader();

    }

    public function redirect($url,$message,$wait = 0) {

        if ($wait == 0){

            header("Location:$url");

        } else {

            include CURR_VIEW_PATH . "message.html";

        }

        exit;

    }
    protected function setView($template) {
        
        require(VIEW_PATH.'home/header.php');
        
        include  CURR_VIEW_PATH . $template;
        
        require(VIEW_PATH.'home/header.php');
    }

}
