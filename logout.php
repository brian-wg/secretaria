<?php
session_start();
session_destroy();
header('Location: LoginModuloSecretaria.php?mensaje=se ha cerrado la sesion');
#test