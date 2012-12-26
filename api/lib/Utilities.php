<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/12/26
 * Time: 10:41 AM
 * To change this template use File | Settings | File Templates.
 */
class Utilities
{

    function __construct(){

    }

    public function urldecode_to_array ($url) {
        $ret_ar = array();

        if (($pos = strpos($url, '?')) !== false)
            $url = substr($url, $pos + 1);
        if (substr($url, 0, 1) == '&')
            $url = substr($url, 1);

        $elems_ar = explode('&', $url);
        for ($i = 0; $i < count($elems_ar); $i++) {
            list($key, $val) = explode('=', $elems_ar[$i]);
            $ret_ar[urldecode($key)] = urldecode($val);
        }

        return $ret_ar;
    }

    public function array_to_object($array) {
        $obj = new stdClass;
        foreach($array as $k => $v) {
            if(is_array($v)) {
                $obj->{$k} = array_to_object($v);
            } else {
                $obj->{$k} = $v;
            }
        }
        return $obj;
    }

}
