<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/12/26
 * Time: 2:28 AM
 * To change this template use File | Settings | File Templates.
 */

function getWines() {
    $w = new Wine();
    $result = $w->getWines();
    echo $result;
}

function getWine($id) {
    $w = new Wine();
    $result = $w->getWine($id);
    echo $result;
}

function addWine() {
    global $app;
    $w = new Wine();
    $request = $app->request();
    $wine = ($request->getBody());
    $requestArray = urldecode_to_array($wine);
    $requestObject = array_to_object($requestArray);
    $result = $w->addWine($requestObject);
    echo $result;
}

function updateWine($id) {
    global $app;
    $w = new Wine();
    $request = $app->request();
    $wine = ($request->getBody());
    $requestArray = urldecode_to_array($wine);
    $requestObject = array_to_object($requestArray);
    $result = $w->updateWine($requestObject,$id);
    echo $result;
}

function deleteWine($id) {
    $w = new Wine();
    $result = $w->deleteWine($id);
    echo $result;
}

function findByName($query) {
    $w = new Wine();
    $result = $w->findByName($query);
    echo $result;
}