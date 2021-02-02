<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=CSS?>crud.css<?=STYLE_VERSION?>">
  <title>CRUD - <?=APP_NAME?></title>
</head>

<body>
  <?php include INC . 'navbar.php'; ?>
  <div class="container pt-3">
    <h1>CRUD</h1>
    <p><a href="<?=HOST?>crud/?tab=crear">Crear</a></p>

    <?php
        require_once APP . 'database.php';
        require_once 'crudModel.php';
        require_once 'crudController.php';
        $controller = new CrudController();
        $productos = $controller->getProductos();
    ?>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr class="table-dark">
                <th>#</th>
                <th>Marca</th>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($productos as $item) {
                ?>
                    <tr>
                        <td><?=$item['Pro_id']?></td>
                        <td><?=$item['Pro_marca']?></td>
                        <td><?=$item['Pro_nombre']?></td>
                        <td><?=$item['Pro_stock']?></td>
                        <td>$<?=number_format($item['Pro_precio'])?></td>
                        <td><a href="<?=HOST?>crud/?tab=actualizar&id=<?=$item['Pro_id']?>">Actualizar</a></td>
                        <td><a href="<?=HOST?>crud/?tab=eliminar&id=<?=$item['Pro_id']?>">Eliminar</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
  </div>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>
</body>

</html>