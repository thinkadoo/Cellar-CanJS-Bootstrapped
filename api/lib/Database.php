<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/12/15
 * Time: 8:41 AM
 */

class Database
{
    var $dbn;

    function __construct(){

    }

    function __destruct(){
        $this->dbn = null;
    }

    public function getConnection() {
        $dbhost="localhost";
        $dbuser="root";
        $dbpass="root";
        $dbname="cellar";
        $this->dbn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $this->dbn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->dbn;
    }

    public function closeConnection(){
        $this->dbn = null;
    }

}
