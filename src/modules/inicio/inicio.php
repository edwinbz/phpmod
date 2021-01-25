<?php
$rol = isset($_SESSION['user_rol']) ? $_SESSION['user_rol'] : null;
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

  <title><?=APP_NAME?></title>
</head>

<body>
  <?php include INC . 'navbar.php'; ?>
  <div class="container">

    <div class="bg-light p-5 mt-5 rounded">
      <h1>Inicio</h1>
      <p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi quis voluptatum doloremque quas reiciendis et temporibus a natus dicta, autem, illo esse? Exercitationem atque ea placeat dolor distinctio iusto laborum?</p>
    </div>
  </div>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>
</body>

</html>