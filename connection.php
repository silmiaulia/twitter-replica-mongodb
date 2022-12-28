<?php

require __DIR__.'../../../vendor/autoload.php';


    try{

        $con = new MongoDB\Client("mongodb://localhost:27017"); 

        $db = $con->tubes;

        $collection = $db->account; 

    }
    catch (Exception $e){

        die("Error. Couldn't connect to the server. Please Check");
    }
    //    session_start();
    // tambahin apa aja
?>