<?php
require_once 'clases/RepositorioLicencia.php';
require_once 'clases/Licencia.php';
require_once 'clases/controladorSesion.php';

session_start();
if (isset($_SESSION['usuario'])) {
    
    $usuario = unserialize($_SESSION['usuario']);
} else {
    
    header('Location: LoginModuloSecretaria.php');
}

$rl = new RepositorioLicencia();


$redirigir = '';
$actualizacionExitosa = false;


if (!empty($_POST['fecha_inicio'])) {
    if ($rl->updateFechaInicio($_POST['fecha_inicio'], $_POST['ultima_modificacion_por'], $_POST['id_licencia'])) {
        $actualizacionExitosa = true;
    }
} 

if (!empty($_POST['fecha_fin'])) {
    if ($rl->updateFechaFin($_POST['fecha_fin'], $_POST['ultima_modificacion_por'], $_POST['id_licencia'])) {
        $actualizacionExitosa = true;
    }
} 

if (!empty($_POST['estado'])) {
    if ($rl->updateEstado($_POST['estado'], $_POST['ultima_modificacion_por'], $_POST['id_licencia'])) {
        $actualizacionExitosa = true;
    }
} 

if (!empty($_POST['id_tipo_licencia'])) {
    if ($rl->updateTipoLicencia($_POST['id_tipo_licencia'], $_POST['ultima_modificacion_por'], $_POST['id_licencia'])) {
        $actualizacionExitosa = true;
    }
}

if ($actualizacionExitosa) {
    $redirigir = 'gestionarlicencias.php?mensaje=cambios guardados correctamente';
} else {


    $mensaje = "No fue posible modificar la licencia.";
    $redirigir = "gestionarlicencias.php?mensaje=$mensaje";
}

header("Location: $redirigir");