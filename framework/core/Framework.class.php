<?php
class Framework
{
    public static function run() {
        
        self::init();
        
        self::autoload();
        
        self::dispatch();
    }
    
    private static function init() {
        
        define('DS', DIRECTORY_SEPARATOR);
        
        define('ROOT', getcwd().DS);
        
        define("APP_PATH", ROOT . 'applications' . DS);

        define("FRAMEWORK_PATH", ROOT . "framework" . DS);

        define("PUBLIC_PATH", ROOT . "public" . DS);
        
        
        
        define("CONFIG_PATH", APP_PATH . "config" . DS);

        define("CONTROLLER_PATH", APP_PATH . "controllers" . DS);

        define("MODEL_PATH", APP_PATH . "models" . DS);

        define("VIEW_PATH", APP_PATH . "views" . DS);
        
        
        $uri = explode('/', $_SERVER['REQUEST_URI']);

        //define("PLATFORM", isset($_REQUEST['p']) ? $_REQUEST['p'] : 'home');

        define("CONTROLLER", (isset($uri[1]) && $uri[1] != '') ? $uri[1] : 'blog');

        define("ACTION", (isset($uri[2])  && $uri[2] != '') ? $uri[2] : 'index');

        define("CURR_VIEW_PATH", VIEW_PATH . CONTROLLER . DS);
        
        // Load core classes
       
        define("CORE_PATH", FRAMEWORK_PATH . "core" . DS);

        define("DB_PATH", FRAMEWORK_PATH . "database" . DS);

        require CORE_PATH . "Controller.class.php";
        
        require CORE_PATH . "Model.class.php";
        
        require DB_PATH . "Mysql.class.php";
        
        require CONFIG_PATH . "config.php";

    }
    
    private static function autoload() {
        
        spl_autoload_register(array(__CLASS__,'load'));
        
    }
    
    private static function load($classname) {
        
       // Here simply autoload app’s controller and model classes

        if (substr($classname, -10) == "Controller"){

            // Controller

            require_once CONTROLLER_PATH . "$classname.class.php";

        } elseif (substr($classname, -5) == "Model"){

            // Model

            require_once  MODEL_PATH . "$classname.class.php";

        }
        
    }
    
    
    private function dispatch() {
        
        // Instantiate the controller class and call its action method

        $controller_name = CONTROLLER . "Controller";

        $action_name = ACTION . "Action";

        $controller = new $controller_name;

        $controller->$action_name();
    }
    
}
