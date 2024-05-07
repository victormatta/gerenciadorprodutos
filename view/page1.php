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

<!-- Container centralizado -->
<div class="container centered-container">
    <?php if(count($products) > 0): ?>
        <table class="table table-light table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Produto</th>
                <th scope="col">Tipo</th>
                <th scope="col">Quantidade</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $productInfo): ?>
            <tr>
                <th scope="row"><?= $productInfo['id'] ?></th>
                <td><?= $productInfo['product'] ?></td>
                <td><?= $productInfo['productType'] ?></td>
                <td><?= $productInfo['productQuantity'] ?></td>
                <td class="actions">
                    <a href="visu.php?id=<?= $productInfo['id'] ?>" class="text-success"><i class="fas fa-eye check-icon fa-lg"></i></a>
                    <a href="editPage.php?id=<?= $productInfo['id'] ?>"><i class="far fa-edit edit-icon fa-lg"></i></a>
                    <form action="../controller/actions_cadaster.php" method="post" style="display: inline-block;">
                        <input type="hidden" name="type" value="delete">
                        <input type="hidden" name="id" value="<?= $productInfo['id'] ?>">
                        <button type="submit" class="btn btn-outline-danger delete-btn btn-sm"><i class="fas fa-times delete-icon fa-lg"></i></button>
                    </form>
                </td>
            </tr>
                
            <?php endforeach; ?>
        </tbody>
    </table>
        
    <?php endif; ?>
</div>

<?php
    include_once '../templates/footer.php';
?>

</body>
</html>