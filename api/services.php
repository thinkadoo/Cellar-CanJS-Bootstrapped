<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/12/24
 * Time: 2:55 PM
 * To change this template use File | Settings | File Templates.
 */

require_once 'vendor/autoload.php';
require_once 'functions/main.php';
require_once 'functions/utilities.php';
require 'lib/Wine.php';

$w = new Wine();
$wines = $w->getWines();
$wine = $w->getWine(1);

$twig = loadTwig();
$template = $twig->loadTemplate('services.html');
$buffer = $template->render(array('wines' => $wines, 'wine' => $wine));
echo $buffer;