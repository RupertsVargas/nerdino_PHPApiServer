<?php
function getGUID(){
    if (function_exists('com_create_guid')){
        $newGuid = com_create_guid();
        return str_replace("}","",str_replace("{","",$newGuid));

    }
    else {
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12);
        return $uuid;
    }
}

function readData()
{
    $jsonString = file_get_contents('../../data/todoListsDB.json');
    $jsonData = json_decode($jsonString, true);
    return $jsonData;
}

function writeData($jsonData)
{
    $jsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
    // Write in the file
    $fp = fopen('../../data/todoListsDB.json', 'w');
    fwrite($fp, $jsonString);
    fclose($fp);
}