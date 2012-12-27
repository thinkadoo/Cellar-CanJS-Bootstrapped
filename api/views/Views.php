<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/12/27
 * Time: 1:18 PM
 */

class Views
{
    var $twig;
    var $wineModel;

    function __construct($Twig){
        $this->wineModel = new WineModel();
        $this->twig = $Twig;
    }

    function welcome() {
        $template = $this->twig->loadTemplate('welcome.html');
        $buffer = $template->render(array());
        echo $buffer;
    }

    function data() {
        $data = $this->wineModel->getWinesArray();
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
        $template = $this->twig->loadTemplate('data.html');
        $buffer = $template->render(array('wines' => $wines));
        echo $buffer;
    }

    function services() {
        $wines = $this->wineModel->getWines();
        $wine = $this->wineModel->getWine(1);
        $template = $this->twig->loadTemplate('services.html');
        $buffer = $template->render(array('wines' => $wines, 'wine' => $wine));
        echo $buffer;
    }

    function downloads() {
        $template = $this->twig->loadTemplate('downloads.html');
        $buffer = $template->render(array());
        echo $buffer;
    }

    function about() {
        $template = $this->twig->loadTemplate('about.html');
        $buffer = $template->render(array());
        echo $buffer;
    }

    function contact() {
        $template = $this->twig->loadTemplate('contact.html');
        $buffer = $template->render(array());
        echo $buffer;
    }

}
