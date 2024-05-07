<?php

session_start();

include_once '../model/connection.php';

$data = $_POST;

$teste = [];

if(!empty($data)) {

    if($data['type'] === 'create') {
        $product = $_POST['product'];
        $productType = $_POST['productType'];
        $productQuantity = $_POST['productQuantity'];

        $query = "INSERT INTO registerproduct (product, productType, productQuantity, data_hora) VALUES (:product, :productType, :productQuantity, :data_hora)";

        $stmt = $conn->prepare($query);

        $data_hora = date('Y-m-d H:i:s');
        $stmt->bindParam(":data_hora", $data_hora);
        $stmt->bindParam(":product", $product);
        $stmt->bindParam(":productType", $productType);
        $stmt->bindParam(":productQuantity", $productQuantity);

        try{
            $stmt->execute();
            
        } catch(PDOException $e) {
            echo "<br><br> ERROR: " . $e->getMessage();
        }
        
    } elseif ($data['type'] === 'edit') {
        $product = $data['product'];
        $productType = $data['productType'];
        $productQuantity = $data['productQuantity'];
        $id = $data['id'];

        $query = "UPDATE registerproduct SET product = :product, productType = :productType, productQuantity = :productQuantity WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":product", $product);
        $stmt->bindParam(":productType", $productType);
        $stmt->bindParam(":productQuantity", $productQuantity);
        $stmt->bindParam(":id", $id);

        try{
            $stmt->execute();
            
        } catch(PDOException $e) {
            echo "<br><br> ERROR: " . $e->getMessage();
        }
        
    } elseif($data['type'] === 'delete') {
        $id = $data['id'];

        $query = "DELETE FROM registerproduct WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":id", $id);

        try{
            $stmt->execute();
            
        } catch(PDOException $e) {
            echo "<br><br> ERROR: " . $e->getMessage();
        }
        
    }

    header("Location: ../view/page1.php");
    exit();
    
} else {
    $id;
    
    if(!empty($_GET)) {
        $id = $_GET['id'];
    }
    
    // only one contact
    if(!empty($id)) {
        $query = "SELECT * FROM registerproduct WHERE id = :id";
    
        $stmt = $conn->prepare($query);
    
        $stmt->bindParam(":id", $id);
    
        $stmt->execute();
    
        $product = $stmt->fetch();
    } else {
        // All contacts
        $products = [];
    
        $query = "SELECT * FROM registerproduct";
    
        $stmt = $conn->prepare($query);
    
        $stmt->execute();
    
        $products = $stmt->fetchAll(); 
    }
}

$conn = null;