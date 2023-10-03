<?php 

require_once 'clases/Persona.php';
require_once 'clases/ControladorSesion.php';
require_once 'clases/Licencia.php';
require_once 'clases/RepositorioPersona.php';
require_once 'clases/RepositorioLicencia.php';


session_start();
if (isset($_SESSION['usuario'])) {
    
    $usuario = unserialize($_SESSION['usuario']);

    $id = $usuario->getIdUsuario();

    


} else {
    
    header('Location: LoginModuloSecretaria.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Cargar licencia</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body class="text-center"> 

<div class="container mt-5">
    <div class="row"> 
    <div class="col-md-3">
        <h3>Cargar licencia</h3>
        <form action="insertar2.php" method="POST">
    <input type="date" class="form-control mb-3" name="fecha_inicio" placeholder="fecha_inicio">
    <input type="date" class="form-control mb-3" name="fecha_fin" placeholder="fecha_fin">
    <input type="number" class="form-control mb-3" name="id_persona" placeholder="id_persona">
    <input type="number" class="form-control mb-3" name="id_tipo_licencia" placeholder="id_tipo_licencia">
    <label for="file">Archivo</label>
    <input id="file "type="file">
    <button>Subir Archivo</button>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Cargar</button>	
      </form>


        </div>

        </body>
</html>