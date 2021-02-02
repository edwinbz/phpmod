<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id) {
    require_once APP . 'database.php';
    require_once 'crudModel.php';
    require_once 'crudController.php';
    $controller = new CrudController();
    if ($controller->deleteProducto($id)) {
        header('location: ' . HOST . 'crud');
    } else {
        print('Se ha producido un error');
    }
} else {
    header('location: ' . HOST . 'crud');
}
