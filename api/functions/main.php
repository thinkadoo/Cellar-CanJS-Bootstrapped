<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/12/16
 * Time: 10:26 AM
 * To change this template use File | Settings | File Templates.
 */

function welcome() {
    $twig = loadTwig();
    $template = $twig->loadTemplate('welcome.html');
    $buffer = $template->render(array());
    echo $buffer;
}

function data() {
    $w = new Wine();
    $data = $w->getWinesArray();
    $wines = array();
    $item = array();
    foreach($data as $wine){
        $item   ['id'] = $wine->id;
        $item   ['name'] = $wine->name;
        $item   ['year'] = $wine->year;
        $item   ['grapes'] = $wine->grapes;
        $item   ['country'] = $wine->country;
        $item   ['region'] = $wine->region;
        $item   ['description'] = $wine->description;
        $item   ['picture'] = $wine->picture;
        $wines [] = $item;
        $item = null;
    }
    $twig = loadTwig();
    $template = $twig->loadTemplate('data.html');
    $buffer = $template->render(array('wines' => $wines));
    echo $buffer;
}

function services() {
    $w = new Wine();
    $wines = $w->getWines();
    $wine = $w->getWine(1);

    $twig = loadTwig();
    $template = $twig->loadTemplate('services.html');
    $buffer = $template->render(array('wines' => $wines, 'wine' => $wine));
    echo $buffer;
}

function downloads() {
    $twig = loadTwig();
    $template = $twig->loadTemplate('downloads.html');
    $buffer = $template->render(array());
    echo $buffer;
}

function about() {
    $twig = loadTwig();
    $template = $twig->loadTemplate('about.html');
    $buffer = $template->render(array());
    echo $buffer;
}

function contact() {
    $twig = loadTwig();
    $template = $twig->loadTemplate('contact.html');
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