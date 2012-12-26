<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/12/26
 * Time: 2:27 AM
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