<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/12/26
 * Time: 2:28 AM
 */

function getWines() {
    global $app;
    if($app->request()->isAjax()){
        $w = new Wine();
        $result = $w->getWines();
        echo $result;
    }else{
        redirectToWelcome();
    }
}
function getWine($id) {
    global $app;
    if($app->request()->isAjax()){
        $w = new Wine();
        $result = $w->getWine($id);
        echo $result;
    }else{
        redirectToWelcome();
    }
}

function addWine() {
    global $app;
    if($app->request()->isAjax()){
        $w = new Wine();
        $request = $app->request();
        $wine = ($request->getBody());
        $utilities = new Utilities();
        $requestArray = $utilities->urldecode_to_array($wine);
        $requestObject = $utilities->array_to_object($requestArray);
        $result = $w->addWine($requestObject);
        echo $result;
    }else{
        redirectToWelcome();
    }
}

function updateWine($id) {
    global $app;
    if($app->request()->isAjax()){
        $w = new Wine();
        $request = $app->request();
        $wine = ($request->getBody());
        $utilities = new Utilities();
        $requestArray = $utilities->urldecode_to_array($wine);
        $requestObject = $utilities->array_to_object($requestArray);
        $result = $w->updateWine($requestObject,$id);
        echo $result;
    }else{
        redirectToWelcome();
    }
}

function deleteWine($id) {
    global $app;
    if($app->request()->isAjax()){
        $w = new Wine();
        $result = $w->deleteWine($id);
        echo $result;
    }else{
        redirectToWelcome();
    }
}

function findByName($query) {
    global $app;
    if($app->request()->isAjax()){
        $w = new Wine();
        $result = $w->findByName($query);
        echo $result;
    }else{
        redirectToWelcome();
    }
}

function redirectToWelcome(){
    global $app;
    $app->redirect($app->request()->getRootUri()."/");
}