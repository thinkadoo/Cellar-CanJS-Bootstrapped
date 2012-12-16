<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/12/16
 * Time: 10:26 AM
 * To change this template use File | Settings | File Templates.
 */

function welcome() {
    $loader = new Twig_Loader_Filesystem('templates');
    $twig = new Twig_Environment($loader, array(
        'cache' => false,
        'debug' => true
    ));
    $template = $twig->loadTemplate('welcome.html');
    $buffer = $template->render(array());
    echo $buffer;
}

function sayHello ($name) {
    echo "Hello, $name";
}

function postResponse() {
    echo 'This is a POST route';
}

function putResponse() {
    echo 'This is a PUT route';
}

function deleteResponse() {
    echo 'This is a DELETE route';
}

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
    $w = new Wine();
    $result = $w->updateWine($id);
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