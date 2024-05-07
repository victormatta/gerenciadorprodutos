<?php

session_start();

include_once '../model/connection.php';

$data = $_POST;

if(!empty($data)) {

    if($data['type'] === 'create') {
        $userName = $_POST['userName'];
        $password = $_POST['password'];

        $query = "INSERT INTO login (userName, password) VALUE (:userName, :password)";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":userName", $userName);
        $stmt->bindParam(":password", $password);

        try{
            $stmt->execute();
            header("Location: ../view/page1.php");
            
        } catch (PDOException $e) {
            echo "<br><br> ERROR: " . $e->getMessage();
        }
    }
    
}