<?php
    $host = "localhost";
    $user = "";
    $pw = "";
    $db = "";
    
    $connect = new mysqli($host, $user, $pw, $db);
    $connect -> set_charset("UTF-8");

    // if(mysqli_connect_errno()){
    //     echo "DATABASE Connect False";
    // } else {
    //     echo "DATABASE Connect True";
    // }
?>