<?php
require_once 'clases/RepositorioLicencia.php';
require_once 'clases/Licencia.php';
require_once 'clases/controladorSesion.php';

session_start();
if (isset($_SESSION['usuario'])) {
    
    $usuario = unserialize($_SESSION['usuario']);
} else {
    
    header('Location: index.php');
}


if (
    !empty($_POST['id_licencia'])
    && !empty($_POST['cantidad'])
) {
   $rl = new RepositorioLicencia();
    
    if ($rl->updateFechaInicio($_POST['id_licencia'], $_POST['fecha_inicio'])) { 
    $redirigir = 'home.php?mensaje=fecha inicio modificada correctamente';
} else if ($rl->updateFechaFin($_POST['id_licencia'], $_POST['fecha_fin'])) { 
    $redirigir = 'home.php?mensaje=fecha fin modificada correctamente';
}else if ($rl->updateEstado($_POST['id_licencia'], $_POST['estado'])) { 
    $redirigir = 'home.php?mensaje=estado modificado correctamente';
}
else if ($rl->updateTipoLicencia($_POST['id_licencia'], $_POST['id_tipo_licencia'])) { 
    $redirigir = 'home.php?mensaje=tipo licencia modificado correctamente';
}
else
{
    $mensaje = "No fue posible modificar la licencia.";
    $redirigir = "home.php?mensaje=$mensaje";
    
}
}
header("Location: $redirigir");