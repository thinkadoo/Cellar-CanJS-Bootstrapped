<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/12/24
 * Time: 3:31 PM
 * To change this template use File | Settings | File Templates.
 */

require_once 'vendor/autoload.php';
require_once 'functions/utilities.php';

$twig = loadTwig();
$template = $twig->loadTemplate('downloads.html');
$buffer = $template->render(array());
echo $buffer;