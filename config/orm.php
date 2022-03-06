<?php 

function find_data():array
{
    $dataJson = file_get_contents(PATH_DB);
    $data = json_decode($dataJson,true);

    return $data;
}

function save_data($key,$array)
{

    $data= find_data();
    array_push($data[$key],$array);
    //$empData = json_encode([$key=>$data[$key]],JSON_PRETTY_PRINT);
    $empData = json_encode($data,JSON_PRETTY_PRINT);
    file_put_contents(PATH_DB,$empData);
}