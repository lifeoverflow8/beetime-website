<?php
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "itsbeetime";
    $dbport = 3306;
    
    $conn = mysqli_connect($servername, $username, $password, $database, $dbport);
    
    /*if (!$conn) {
        die("Connection failed: ". mysqli_connect_error());
    }*/
?>