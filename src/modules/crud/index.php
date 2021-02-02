<?php
$tab = isset($_GET['tab']) ? $_GET['tab'] : null;
switch ($tab) {
    case 'crear':
        require_once 'crear.php';
        break;
    case 'eliminar':
            require_once 'eliminar.php';
            break;
    case 'actualizar':
        require_once 'actualizar.php';
        break;
    
    default:
        require_once 'crud.php';
        break;
}