<?php
require_once 'clases/ControladorSesion.php';

if (empty($_POST['email']) || empty($_POST['clave'])) {
    $redirigir = 'index.php?mensaje=Error: Todos los campos son obligatorios';
} else {
    $cs = new ControladorSesion();
    $login = $cs->login($_POST['email'], $_POST['clave']);
    if ($login[0] === true) {
        $redirigir = 'home.php';
    } else {
        $redirigir = 'index.php?mensaje=' . $login[1];
    }
}
header('Location: '.$redirigir);
