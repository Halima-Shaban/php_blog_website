<?php


function getRow (string $table,$id){
    global $conn;
    $sql= "SELECT * FROM `$table` WHERE `id`='$id'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_affected_rows($conn)){
          return $post= mysqli_fetch_assoc($result);

    }else{
        return false;
    }
};