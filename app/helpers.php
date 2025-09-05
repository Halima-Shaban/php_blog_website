<?php 
function sanitize($input){
        return htmlentities(trim($input));
    };



    function redirect($path){
        header("location:$path");


    };


    function dump($data){
        echo "<pre>";
        var_dump($data);


        echo "</pre>";
        die;

    };



?>