<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/12/15
 * Time: 8:45 AM
 */

require 'Slim/Slim.php';
require 'models/Wine.php';

$app = new Slim();

$app->get('/wines', 'getWines');
$app->get('/wines/:id',	'getWine');
$app->get('/wines/search/:query', 'findByName');
$app->post('/wines', 'addWine');
$app->put('/wines/:id', 'updateWine');
$app->delete('/wines/:id',	'deleteWine');

$app->run();

function getWines() {
    $w = new Wine();
    $w->getWines();
}

function getWine($id) {
    $w = new Wine();
    $w->getWine($id);
}

function addWine() {
    $w = new Wine();
    $w->addWine();
}

function updateWine($id) {
    $w = new Wine();
    $w->updateWine($id);
}

function deleteWine($id) {
    $w = new Wine();
    $w->deleteWine($id);
}

function findByName($query) {
    $w = new Wine();
    $w->findByName($query);
}