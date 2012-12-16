<?php

require_once 'vendor/autoload.php';
require_once 'functions/main.php';
require_once 'functions/utilities.php';
require 'lib/Wine.php';

\Slim\Slim::registerAutoloader();
Twig_Autoloader::register();

$app = new \Slim\Slim();



// GET routes
$app->get('/', 'welcome');
$app->get('/hello/:name', 'sayHello');
$app->get('/wines', 'getWines');
$app->get('/wines/:id',	'getWine');
$app->get('/wines/search/:query', 'findByName');

// POST routes
$app->post('/post', 'postResponse');
$app->post('/wines', 'addWine');

// PUT routes
$app->put('/put', 'putResponse');
$app->put('/wines/:id', 'updateWine');

// DELETE routes
$app->delete('/delete', 'deleteResponse');
$app->delete('/wines/:id',	'deleteWine');



$app->run();