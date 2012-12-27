<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/12/26
 * Time: 2:28 AM
 */

function getWines() {
    global $app;
    $wine = new WineController($app);
    $wine->getWines();
}
function getWine($id) {
    global $app;
    $wine = new WineController($app);
    $wine->getWine($id);
}

function addWine() {
    global $app;
    $wine = new WineController($app);
    $wine->addWine();
}

function updateWine($id) {
    global $app;
    $wine = new WineController($app);
    $wine->updateWine($id);
}

function deleteWine($id) {
    global $app;
    $wine = new WineController($app);
    $wine->deleteWine($id);
}

function findByName($query) {
    global $app;
    $wine = new WineController($app);
    $wine->findByName($query);
}