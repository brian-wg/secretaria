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
$archivo = $_FILES['archivo'];


 if ($fecha_inicio === "" || $fecha_fin === "") {

    $mensaje = "Por favor, seleccione fecha inicio y fecha fin.";
    echo '<script>window.alert("' . $mensaje . '");</script>';
    echo '<script>window.location.href = "insertarD.php";</script>';
    exit;
}

$fecha_inicio_obj = new DateTime($fecha_inicio);
$fecha_fin_obj = new DateTime($fecha_fin);


if ($fecha_fin_obj < $fecha_inicio_obj) {
    $mensaje = "La fecha de fin no puede ser anterior a la fecha de inicio.";
    echo '<script>window.alert("' . $mensaje . '");</script>';
    echo '<script>window.location.href = "insertar.php";</script>';
    exit;
}

if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
    $carpeta_destino = 'certificados/';
    $nombre_archivo = $_FILES['archivo']['name'];

    if (move_uploaded_file($_FILES['archivo']['tmp_name'], $carpeta_destino . $nombre_archivo)) {
        $archivo = $carpeta_destino . $nombre_archivo;
    }
 else {
 	$archivo = null; 
 }

}
else {
	$archivo = null;
}

$l = new Licencia($fecha_inicio, $fecha_fin, $id_persona, $estado, $id_tipo_licencia, $archivo);

var_dump($l);
die();
$usuario = unserialize($_SESSION['usuario']);


if($rl->agregarDocente($l, $usuario)) {
    $redirigir = 'homeDocente.php?mensaje=Licencia agregada';
} else {
	$redirigir = 'homeDocente.php?mensaje=Error al agregar';
	
}
header('Location: '.$redirigir);
