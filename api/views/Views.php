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

    public function welcome() {
        $template = $this->twig->loadTemplate('welcome.html');
        $navigation = $this->getMenuData();
        // VARS passed to TWIG to change the persistent menu bar
        $navigation[0] = array('href' => './', 'caption' => 'Home', 'class'=>'active');
        $buffer = $template->render(array('navigation'=>$navigation));
        echo $buffer;
    }

    public function data() {
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
        $navigation = $this->getMenuData();
        // VARS passed to TWIG to change the persistent menu bar
        $navigation[1] = array('href' => './data', 'caption' => 'Data', 'class'=>'active');
        $buffer = $template->render(array('wines' => $wines, 'navigation'=>$navigation));
        echo $buffer;
    }

    public function services() {
        $wines = $this->wineModel->getWines();
        $wine = $this->wineModel->getWine(1);
        $template = $this->twig->loadTemplate('services.html');
        $navigation = $this->getMenuData();
        // VARS passed to TWIG to change the persistent menu bar
        $navigation[2] = array('href' => './services', 'caption' => 'Services', 'class'=>'active');
        $buffer = $template->render(array('wines' => $wines, 'wine' => $wine, 'navigation'=>$navigation));
        echo $buffer;
    }

    public function downloads() {
        $template = $this->twig->loadTemplate('downloads.html');
        $navigation = $this->getMenuData();
        // VARS passed to TWIG to change the persistent menu bar
        $navigation[3] = array('href' => './downloads', 'caption' => 'Downloads', 'class'=>'active');
        $buffer = $template->render(array('navigation'=>$navigation));
        echo $buffer;
    }

    public function about() {
        $template = $this->twig->loadTemplate('about.html');
        $navigation = $this->getMenuData();
        // VARS passed to TWIG to change the persistent menu bar
        $navigation[4] = array('href' => './about', 'caption' => 'About', 'class'=>'active');
        $buffer = $template->render(array('navigation'=>$navigation));
        echo $buffer;
    }

    public function contact() {
        $template = $this->twig->loadTemplate('contact.html');
        $navigation = $this->getMenuData();
        // VARS passed to TWIG to change the persistent menu bar
        $navigation[5] = array('href' => './contact', 'caption' => 'Contact', 'class'=>'active');
        $buffer = $template->render(array('navigation'=>$navigation));
        echo $buffer;
    }

    private function getMenuData() {
        // VARS passed to TWIG to build the persistent menu bar
        $navigation = array(
            array('href' => './', 'caption' => 'Home', 'class'=>''),
            array('href' => './data', 'caption' => 'Data', 'class'=>''),
            array('href' => './services', 'caption' => 'Services', 'class'=>''),
            array('href' => './downloads', 'caption' => 'Downloads', 'class'=>''),
            array('href' => './about', 'caption' => 'About', 'class'=>''),
            array('href' => './contact', 'caption' => 'Contact', 'class'=>'')
        );
        return $navigation;
    }

}
