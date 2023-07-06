<?php

    $database= new mysqli("localhost","root","","careerbooking");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>