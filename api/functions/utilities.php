<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/12/16
 * Time: 8:39 PM
 * To change this template use File | Settings | File Templates.
 */
function urldecode_to_array ($url) {
    $ret_ar = array();

    if (($pos = strpos($url, '?')) !== false)         // parse only what is after the ?
        $url = substr($url, $pos + 1);
    if (substr($url, 0, 1) == '&')                    // if leading with an amp, skip it
        $url = substr($url, 1);

    $elems_ar = explode('&', $url);                   // get all variables
    for ($i = 0; $i < count($elems_ar); $i++) {
        list($key, $val) = explode('=', $elems_ar[$i]); // split variable name from value
        $ret_ar[urldecode($key)] = urldecode($val);     // store to indexed array
    }

    return $ret_ar;
}

function array_to_object($array) {
    $obj = new stdClass;
    foreach($array as $k => $v) {
        if(is_array($v)) {
            $obj->{$k} = array_to_object($v); //RECURSION
        } else {
            $obj->{$k} = $v;
        }
    }
    return $obj;
}