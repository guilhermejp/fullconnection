<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function msg($message = "Mensagem de Erro", $type = "error", $delay = 3, $title = "") {
    return array('message' => strip_tags($message),
        'type' => $type,
        'delay' => $delay*1000,
        'title' => $title);
}

function is_json($string) {
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
}
