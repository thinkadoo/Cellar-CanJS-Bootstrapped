<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/12/24
 * Time: 2:42 PM
 * To change this template use File | Settings | File Templates.
 */

require_once 'vendor/autoload.php';
require_once 'functions/main.php';
require_once 'functions/utilities.php';
require 'lib/Wine.php';

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