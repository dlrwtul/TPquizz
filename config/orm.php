<?php 

function find_data($key):array
{
    $dataJson = file_get_contents(PATH_DB);
    $data = json_decode($dataJson,true);

    return $data[$key];
}

function save_data($key,$array)
{
    $data[$key]= find_data($key);
    array_push($data[$key],$array);
    $empData = json_encode(["users"=>$data[$key]],JSON_PRETTY_PRINT);
    file_put_contents(PATH_DB,$empData);
}