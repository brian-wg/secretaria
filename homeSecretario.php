<?php 
session_start();
require_once 'clases/Persona.php';
require_once 'clases/ControladorSesion.php';
require_once 'clases/Licencia.php';
require_once 'clases/RepositorioPersona.php';
require_once 'clases/RepositorioLicencia.php';




if (isset($_SESSION['usuario'])) {
    
    $usuario= unserialize($_SESSION['usuario']);
    $nomApe = $usuario->getNombreApellido();


} else {
    
    header('Location: loginscreen.php');
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Panel Secretario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <div class="container mt-2">
    <p align="right"><a href="logout.php">Cerrar sesión</a></p>
    <p align="left"><a href="ar7qj28ss7i.php">Crear usuario</a></p>
    </div>
    <body class="text-center">
     <h1 class="h3 mb-3 fw-normal" id="titulo">Panel Secretario</h1><br> 
     <h4>Hola <?php echo $nomApe;?></h4>

        <a  href="insertar.php" class="w-10 btn btn-lg btn-primary">Agregar licencia</a>
        <a  href="gestionarlicencias.php" class="w-10 btn btn-lg btn-primary">Gestionar licencias</a>
        <a  href="ConsultarHistorialLicencias.php" class="w-10 btn btn-lg btn-primary">Historial cambios licencias</a>
        <a  href="consultarLicenciaDocente.php" class="w-10 btn btn-lg btn-primary">Consultar licencias docente</a>
    </body>
</html>