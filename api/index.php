<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/12/15
 * Time: 8:45 AM
 */

require 'Slim/Slim.php';
require 'models/Wine.php';
require 'controllers/Main.php';

$app = new Slim();

$app->get('/wines', 'getWines');
$app->get('/wines/:id',	'getWine');
$app->get('/wines/search/:query', 'findByName');
$app->post('/wines', 'addWine');
$app->put('/wines/:id', 'updateWine');
$app->delete('/wines/:id',	'deleteWine');

$app->run();