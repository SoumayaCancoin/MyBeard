<?php

namespace App;
    
use App\Router;
use controller\ProjectController;

require_once "app\Autoloader.php";
Autoloader::register();
    /* ------------------ CONSTANTES ------------------ */
    const APP_BASE_PATH = __DIR__;
    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT_DIR', '.'.DS); // "./"
    define('PUBLIC_PATH', ROOT_DIR.'public'.DS); // "./public/"
    define('CSS_PATH', PUBLIC_PATH.'css'.DS); // "./public/css/"
    define('IMG_PATH', PUBLIC_PATH.'img'.DS); // "./public/img/"
    define('JS_PATH', PUBLIC_PATH.'js'.DS); // "./public/js/"

    define('SERVICE_PATH', ROOT_DIR.'app'.DS); // "./app/"
    define('CTRL_PATH', ROOT_DIR.'controller'.DS); // "./controller/"
    define('VIEW_PATH', ROOT_DIR.'view'.DS); // "./view/"

    define('ADMIN_MAIL', "admin@forummvc.com"); //mail de l'administrateur

    require SERVICE_PATH."Router.php"; // require "./app/Router.php"
    session_start();

// Start Controller : NAMESPACE\CLASSNAME
$controller = new ProjectController();

// Call Controller method
$controller->projectCreateCardOk(); // check get value
// END SCRIPT
