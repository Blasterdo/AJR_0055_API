<?php
    $host = "localhost";
    $user = "ajrxyz13_ajr_0055";
    $pass = "Pokemonstg901*";
    $name = "ajrxyz13_ajr_0055";

    $con = mysqli_connect($host, $user, $pass, $name);
    
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL : ". mqsqli_connect_error();
    }