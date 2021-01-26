  <!doctype html>
  <html lang="es">

  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Iniciar sesión - <?= APP_NAME ?></title>
      <!-- styles -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <link rel="stylesheet" href="<?= CSS ?>auth.css<?= STYLE_VERSION ?>">
  </head>

  <body class="text-center">
      <form id="form-login" class="form-auth">
          <a href="<?=HOST?>"><img class="mb-4" src="<?= IMG ?>logo.svg" alt="Logo <?= APP_NAME ?>" width="72" height="72"></a>
          <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1>
          <input type="text" id="user" class="form-control input-top" placeholder="Usuario o correo electrónico" required autofocus>
          <input type="password" id="pass" autocomplete="" class="form-control input-bottom" placeholder="Contraseña" required>
          <div class="d-grid">
            <button id="btnSubmit" class="btn btn-lg btn-primary btn-block" type="submit">Continuar</button>
          </div>

          <div class="mt-3 mb-2 clearfix">
              <!--<a href="<?=HOST?>signin/" class="mr-2">Registrate</a>-->
              <a href="<?= HOST ?>recover/">¿Olvidaste tu contraseña?</a>
          </div>
          <a href="<?=HOST?>" class="text-decoration-none">
              <p class="mt-2 mb-0"><?= APP_NAME ?></p>
          </a>
          <p class="mt-0 mb-3 text-muted">&copy; <?= APP_YEAR ?> <a href="<?=APP_AUTOR_WEBSITE?>" class="text-dark text-decoration-none" target="_blank"><?=APP_AUTOR?></a></p>
      </form>

      <!-- scripts -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
      <script src="<?= JS ?>main.js<?= SCRIPT_VERSION ?>"></script>
      <script src="<?= JS ?>auth.js<?= SCRIPT_VERSION ?>"></script>
  </body>

  </html>