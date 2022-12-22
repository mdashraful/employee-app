<?php

function getFormatedDate($date){
    $temp_date_array = explode('-', $date);
    $rev_temp_date_array = array_reverse($temp_date_array);
    $date = implode("/", $rev_temp_date_array);
    return $date;
}

function setFormatedDate($date){
    $temp_date_array = explode('/', $date);
    $rev_temp_date_array = array_reverse($temp_date_array);
    $date = implode('-', $rev_temp_date_array);
    return $date;
}