<?php

require_once 'vendor/autoload.php';
require_once 'functions/mainapi.php';
require_once 'functions/mainviews.php';
require_once 'functions/utilities.php';
require 'lib/Wine.php';

\Slim\Slim::registerAutoloader();
Twig_Autoloader::register();

$app = new \Slim\Slim();


// GET API views

$app->get('/', 'welcome');
$app->get('/data', 'data');
$app->get('/services', 'services');
$app->get('/downloads', 'downloads');
$app->get('/about', 'about');
$app->get('/contact', 'contact');

// API

// GET routes
$app->get('/wines', 'getWines');
$app->get('/wines/:id',	'getWine');
$app->get('/wines/search/:query', 'findByName');

// POST routes
$app->post('/wines', 'addWine');

// PUT routes
$app->put('/wines/:id', 'updateWine');

// DELETE routes
$app->delete('/wines/:id',	'deleteWine');



$app->run();