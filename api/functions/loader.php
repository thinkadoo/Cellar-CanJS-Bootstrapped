<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/12/16
 * Time: 8:39 PM
 * To change this template use File | Settings | File Templates.
 */

require_once 'vendor/autoload.php';
require_once 'functions/api.php';
require_once 'functions/views.php';
require_once 'lib/Wine.php';
require_once 'lib/Utilities.php';

\Slim\Slim::registerAutoloader();
Twig_Autoloader::register();

function loadTwig(){
    $loader = new Twig_Loader_Filesystem('templates');
    $twig = new Twig_Environment($loader, array(
        'cache' => false,
        'debug' => true
    ));
    return $twig;
}