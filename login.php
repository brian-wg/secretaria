<?php
require_once 'clases/ControladorSesion.php';

if (empty($_POST['usuario']) || empty($_POST['clave'])) {
    $redirigir = 'LoginModuloSecretaria.php?mensaje=Error: Todos los campos son obligatorios';
} else {
    $cs = new ControladorSesion();
    $login = $cs->login($_POST['usuario'], $_POST['clave']);
    if ($login[0] === true) {
        $usuario = unserialize($_SESSION['usuario']);
        
        if ($usuario->getRol() === 'secretario') {
            $redirigir = 'homeSecretario.php';
        } elseif ($usuario->getRol() === 'docente') {
            $redirigir = 'homeDocente.php';
        } else {

            $redirigir = 'noexisto.php';
        }
    } else {
        $redirigir = 'LoginModuloSecretaria.php?mensaje=' . $login[1];
    }
}

header('Location: ' . $redirigir);