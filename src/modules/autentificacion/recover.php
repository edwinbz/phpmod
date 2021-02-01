<?php
$reasign = false;
$token = isset($_GET['token']) ? $_GET['token'] : null;

if($token){
    require_once APP . 'database.php';
    require_once 'autentificacionModel.php';
    require_once 'autentificacionController.php';
    $auth = new AutentificacionController();

    $cs = $auth->checkToken($token);
    if($cs!=false){
        $reasign = true;
    }
}
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Recuperar contraseña - <?= APP_NAME ?></title>
    <!-- styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= CSS ?>auth.css<?= STYLE_VERSION ?>">
</head>

<body class="text-center">
    <?php if (!$reasign): ?>
    <!--Form recover-->
    <form id="form-recover" class="form-auth">
        <a href="<?=HOST?>"><img class="mb-4" src="<?= IMG ?>logo.svg" alt="Logo <?= APP_NAME ?>" width="72" height="72"></a>
        <h1 class="h3 mb-3 font-weight-normal">Restablecer contraseña</h1>

        <div class="alert alert-success" role="alert">
            Se han enviado las instrucciones para recuperar la contraseña a su dirección de correo electrónico.
        </div>

        <?php if (!$reasign && $token!=null): ?>
        <div class="alert alert-danger" role="alert">
            El enlace no es válido o ya ha caducado.
        </div>
        <?php else: ?>

        <div id="form">
            <input type="email" id="user" class="form-control mb-10" placeholder="Correo electrónico registrado" required
                autofocus>
            <div class="d-grid">
                <button id="btnSubmit" class="btn btn-lg btn-primary btn-block" type="submit">Continuar</button>
            </div>
        </div>
        <?php endif; ?>
        
        <div class="mt-3">
            <a href="<?= HOST ?>login/">Ir al inicio de sesión</a>
        </div>
        <a href="<?=HOST?>" class="text-decoration-none">
            <p class="mt-2 mb-0"><?= APP_NAME ?></p>
        </a>
        <p class="mt-0 mb-3 text-muted">&copy; <?= APP_YEAR ?> <a href="<?=APP_AUTOR_WEBSITE?>" class="text-dark text-decoration-none" target="_blank"><?=APP_AUTOR?></a></p>
    </form>

    <?php elseif($reasign): ?>
    <!--Form reasign-->
    <form id="form-reasing" class="form-auth">
        <a href="<?=HOST?>"><img class="mb-4" src="<?= IMG ?>logo.png" alt="Logo <?= APP_NAME ?>" width="72" height="72"></a>
        <h1 class="h3 mb-3 font-weight-normal">Asignar contraseña</h1>

        <div class="alert alert-success" role="alert">
            Se ha actualizado su contraseña. Por favor inicie sesión nuevamente.
        </div>

        <div id="form">
            <input type="hidden" id="token" value="<?=$token?>">
            <input type="password" id="pass1" minlength="6" class="form-control bd-top input-top" placeholder="Nueva contraseña" required
                autofocus>
            <input type="password" id="pass2" minlength="6" class="form-control mb-10 input-bottom" placeholder="Repite la contraseña" required>
            <button id="btnSubmit" class="btn btn-lg btn-primary btn-block" type="submit">Continuar</button>
        </div>
        
        <div class="mt-3">
            <a href="<?= HOST ?>login/">Ir al inicio de sesión</a>
        </div>
        <a href="<?=HOST?>" class="text-decoration-none">
            <p class="mt-2 mb-0"><?= APP_NAME ?></p>
        </a>
        <p class="mt-0 mb-3 text-muted">&copy; <?= APP_YEAR ?> <a href="<?=APP_AUTOR_WEBSITE?>" class="text-dark text-decoration-none" target="_blank"><?=APP_AUTOR?></a></p>
    </form>
    <?php endif; ?>

    <!-- scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="<?= JS ?>main.js<?= SCRIPT_VERSION ?>"></script>
    <script src="<?= JS ?>auth.js<?= SCRIPT_VERSION ?>"></script>

</body>

</html>