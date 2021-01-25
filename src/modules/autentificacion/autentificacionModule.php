<?php
// Define routes
Modules::setRoute('autentificacion', 'login', 'login.php', false, []);
Modules::setRoute('autentificacion', 'recover', 'recover.php', false, []);

// Define AJAX controller access
Modules::setAjax('autentificacion', 'autentificacionModel.php', 'AutentificacionModel', 'autentificacionController.php', 'AutentificacionController', false, []);
