<?php

try{
    $host = 'localhost';
    $db = 'cadasterSystem';
    $user = 'root';
    $pass = '';

    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo '<br><br>ERROR: ' . $e->getMessage();
}