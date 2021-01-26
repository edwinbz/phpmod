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

  <title>
    <?=APP_NAME?>
  </title>
</head>

<body>
  <?php include INC . 'navbar.php';?>
  <div class="container pt-4">
    <h1>Inicio</h1>
    <p>
      <?=APP_DESCRIPTION?>
    </p>
    <p>Session vars</p>
    <ul>
      <li><b>user_id:</b> <?=$_SESSION['user_id']?></li>
      <li><b>user_rol:</b> <?=$_SESSION['user_rol']?></li>
      <li><b>user_name:</b> <?=json_encode($_SESSION['user_name'])?></li>
    </ul>

    <p>Config vars (constants)<p>
    <ul>
      <li><b>HOST:</b> <?=HOST?></li>
      <li><b>APP_DEBUG:</b> <?=APP_DEBUG ? 'true' : 'false'?></li>
      <li><b>DEFAULT_VIEW:</b> <?=DEFAULT_VIEW?></li>
      <li><b>URI:</b> <?=URI?></li>
    </ul>

    <hr>
    

    <p>Pages with login required</p>
    <ul>
      <li><a href="<?=HOST?>dashboard/">
          <?=HOST?>dashboard/
        </a></li>
    </ul>

    <p>Valid home URL</p>
    <ul>
      <li><a href="<?=HOST?>">
          <?=HOST?>
        </a></li>
      <li><a href="<?=HOST?>inicio">
          <?=HOST?>inicio
        </a></li>
      <li><a href="<?=HOST?>inicio/">
          <?=HOST?>inicio/
        </a></li>
    </ul>
    <p>Logout link</p>
    <ul>
      <li><a href="<?=HOST?>logout/">
          <?=HOST?>logout/
        </a></li>
    </ul>

    <p>Commutator URL
      <br> path = module/function</p>
    <ul>
      <li><a href="<?=HOST?>commutator.php"><?=HOST?>commutator.php</a></li>
    </ul>
    
    <p>Error pages</p>
    <ul>
      <li>Force error 404 <a href="<?=HOST?>xpage/">
          <?=HOST?>xpage/
        </a></li>
      <li>Force error 403 <a href="<?=HOST?>www">
          <?=HOST?>www/
        </a></li>
    </ul>
  </div>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>
</body>

</html>