<?php

function pr($string, $isnull = false) {
    echo '<pre>';
    print_r($string);
    echo '</pre>';
    if ($isnull)
        die;
}

function getControllerOrActionName($type = 0) {
    $currentAction = \Route::currentRouteAction();
    list($controller, $method) = explode('@', $currentAction);
    if (!empty($type)) {
        return preg_replace('/.*\\\/', '', $method);
    }
    return preg_replace('/.*\\\/', '', $controller);
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

