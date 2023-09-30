<?php
session_start();
require_once 'clases/RepositorioLicencia.php';
require_once 'clases/Licencia.php';



$rl = new RepositorioLicencia();

$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$id_persona = $_POST['id_persona'];
$estado = "Pendiente";
$id_tipo_licencia = $_POST['id_tipo_licencia'];



$l = new Licencia($fecha_inicio, $fecha_fin, $id_persona, $estado, $id_tipo_licencia);

$usuario = unserialize($_SESSION['usuario']);


if($rl->agregar($l, $usuario)) {
    $redirigir = 'home.php?mensaje=Licencia agregada';
} else {
	$redirigir = 'home.php?mensaje=Error al agregar';
	
}
header('Location: '.$redirigir);
