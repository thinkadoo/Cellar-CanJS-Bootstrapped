<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/12/26
 * Time: 2:28 AM
 */

function getWines() {
    global $app;
    $controller = new WineController($app);
    $controller->getWines();
}
function getWine($id) {
    global $app;
    $controller = new WineController($app);
    $controller->getWine($id);
}

function addWine() {
    global $app;
    $controller = new WineController($app);
    $controller->addWine();
}

function updateWine($id) {
    global $app;
    $controller = new WineController($app);
    $controller->updateWine($id);
}

function deleteWine($id) {
    global $app;
    $controller = new WineController($app);
    $controller->deleteWine($id);
}

function findByName($query) {
    global $app;
    $controller = new WineController($app);
    $controller->findByName($query);
}