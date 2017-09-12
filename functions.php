<?php

function renderTemplate($file_path, $data) {

    if(file_exists($file_path)) {
        /*$data = validateData($data);*/

        ob_start();
        extract($data);
        require_once($file_path);
        return ob_get_clean();
    }

    return '';
}

function getTime($ts) {

    $time_diff = (time() - $ts) / 3600;

    switch ($time_diff) {
        case $time_diff >= 24:
        $bet_time = date('d.m.y' . ' в ' . 'H:i' , $ts);
        break;

        case $time_diff < 1:
        $bet_time = date('i' . ' минут назад', $ts);
        break;

        default:
        $bet_time = date('H' . ' часов назад', $ts);
    }

    return $bet_time;
}


function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validateNumericInput($data) {
    if ((is_numeric($data) == false) || ($data <= 0)) {
        return false;
    }

    return true;
}

function validateDateInput($data) {
    $now = time();
    $data = strtotime($data);

    if ($data > $now) {
        return true;
    }

    return false;
}

