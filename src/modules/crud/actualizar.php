<?php
require_once APP . 'database.php';
require_once 'crudModel.php';
require_once 'crudController.php';
$controller = new CrudController();

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id) {
    $item = $controller->getProducto($id);
} else {
    header('location: ' . HOST . 'crud');
}
?>

<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <title>Actualizar - <?=APP_NAME?></title>
</head>

<body>
  <?php include INC . 'navbar.php';?>
  <div class="container pt-3">
  <h1>CRUD</h1>
  <p>Actualizar producto</p>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?=$id?>">
        <div class="mb-3">
            <label class="form-label">Marca</label>
            <input type="text" class="form-control" name="mar" value="<?=$item['Pro_marca']?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nom" value="<?=$item['Pro_nombre']?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number" class="form-control" name="sto" value="<?=$item['Pro_stock']?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="number" class="form-control" name="pre" value="<?=$item['Pro_precio']?>" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="submit">Actualizar producto</button>
        </div>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        if ($controller->updateProducto()) {
            header('location: ' . HOST . 'crud');
        }
    }
    ?>

    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
</body>

</html>