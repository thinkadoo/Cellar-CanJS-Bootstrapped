<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/12/26
 * Time: 2:27 AM
 */

function welcome() {
    global $twig;
    $view = new ViewsController($twig);
    $view->welcome();
}

function data() {
    global $twig;
    $view = new ViewsController($twig);
    $view->data();
}

function services() {
    global $twig;
    $view = new ViewsController($twig);
    $view->services();
}

function downloads() {
    global $twig;
    $view = new ViewsController($twig);
    $view->downloads();
}

function about() {
    global $twig;
    $view = new ViewsController($twig);
    $view->about();
}

function contact() {
    global $twig;
    $view = new ViewsController($twig);
    $view->contact();
}