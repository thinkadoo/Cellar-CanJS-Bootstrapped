<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/12/16
 * Time: 8:15 AM
 */

function getWines() {
    $w = new Wine();
    $w->getWines();
    echo $w;
}

function getWine($id) {
    $w = new Wine();
    $w->getWine($id);
    echo $w;
}

function addWine() {
    $w = new Wine();
    $w->addWine();
    echo $w;
}

function updateWine($id) {
    $w = new Wine();
    $w->updateWine($id);
    echo $w;
}

function deleteWine($id) {
    $w = new Wine();
    $w->deleteWine($id);
    echo $w;
}

function findByName($query) {
    $w = new Wine();
    $w->findByName($query);
    echo $w;
}