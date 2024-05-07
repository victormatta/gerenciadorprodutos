<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
        .centered-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .custom-card {
            width: 1000px; /* Define a largura desejada para o card */
            height: 300px;
        }
    </style>
    
    <title>Document</title>
</head>
<body>

<?php
    include_once '../templates/header.php';
    include_once '../controller/actions_cadaster.php';

?>

<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="#">IMAGE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active text-light" aria-current="page" href="page1.php">Home</a>
        <a class="nav-link active text-light" aria-current="page" href="pageCreate.php">Adicionar produtos</a>
      </div>
    </div>
  </div>
</nav>

<div class="container centered-container">
        <div class="card text-center custom-card">
            <div class="card-header">
                Edit your product here
            </div>
            <div class="card-body">
            <form action="../controller/actions_cadaster.php" method="post" class="form">
                    <input type="hidden" name="type" value="edit">
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                    <br>
                    <div class="form-group">
                        <input type="text" value="<?= $product['product'] ?>" name="product" id="product" placeholder="Digite o nome do produto" class="form-control" required>
                    </div>

                    <br><br>

                    <div class="form-group">
                        <input type="text" value="<?= $product['productType'] ?>" name="productType" id="productType" placeholder="Produto salgado ou doce" class="form-control" required>
                    </div>

                    <br><br>                            

                    <div class="form-group">
                        <input type="text" value="<?= $product['productQuantity'] ?>" name="productQuantity" id="productQuantity" placeholder="Quantidade de produtos comprados" class="form-control" required>
                    </div>

                    <br><br>

                </div>
                <div class="card-footer text-body-secondary">
                    <button type="submit" class="btn btn-primary btn-right">Send</button>
                </div>
            </form>
        </div>
</div>