<?php

require_once 'functions/loader.php';

$app = new \Slim\Slim();

// VIEWS //

$app->get('/', 'welcome');
$app->get('/data', 'data');
$app->get('/services', 'services');
$app->get('/downloads', 'downloads');
$app->get('/about', 'about');
$app->get('/contact', 'contact');

// API //

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