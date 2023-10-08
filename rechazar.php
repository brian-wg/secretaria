<?php
session_start();
require_once 'clases/RepositorioLicencia.php';
require_once 'clases/Licencia.php';

if (isset($_SESSION['usuario'])) {
    
    $usuario = unserialize($_SESSION['usuario']);
} else {
    
    header('Location: index.php');
}

$rl = new RepositorioLicencia();

$id_licencia = $_GET['id'];
$ultima_modificacion_por = $usuario->getNombreApellido();


if ($rl->RechazarLicencia("Rechazada", $ultima_modificacion_por, $id_licencia)) { 
	$redirigir = 'gestionarlicencias.php?mensaje=Licencia rechazada';
}	
else {
	$redirigir = 'gestionarlicencias.php?mensaje=No se pudo rechazar la licencia';
	
}
header('Location: '.$redirigir);
