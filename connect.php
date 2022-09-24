<?php
    $host='YOUR_HOST_NAME';
    $username='USERNAME_OF_DB';
    $password='PASSWORD_OF_DB';
    $database='DATABASE_NAME';
    $conn = new mysqli($host, $username,$password,$database);
    if(!$conn){
    die("Connection faild!"); 
    }

?>