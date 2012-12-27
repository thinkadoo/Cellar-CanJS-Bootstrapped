<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/12/26
 * Time: 2:27 AM
 */

function welcome() {
    global $twig;
    $views = new Views($twig);
    $views->welcome();
}

function data() {
    global $twig;
    $views = new Views($twig);
    $views->data();
}

function services() {
    global $twig;
    $views = new Views($twig);
    $views->services();
}

function downloads() {
    global $twig;
    $views = new Views($twig);
    $views->downloads();
}

function about() {
    global $twig;
    $views = new Views($twig);
    $views->about();
}

function contact() {
    global $twig;
    $views = new Views($twig);
    $views->contact();
}