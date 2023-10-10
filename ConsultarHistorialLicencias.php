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
    $rp = new RepositorioPersona();
    $rol = "docente";
    $docentes = $rp->listaDocentes($rol);

} else {
    
    header('Location: LoginModuloSecretaria.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Consultar Historial Licencias</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body class="text-center"> 

<div class="container mt-5">
    <div class="row"> 
    <div class="col-md-3">
        <h3>Consultar Historial Licencias</h3>
        <form action="HistorialLicenciaConsultada.php" method="POST">
    <label for="id_persona">Seleccione un docente</label>
    <select name="id_persona" id="id_persona">
    <?php 
    foreach($docentes as $d) { 
        echo "<option value='" . $d["id_persona"] . "'>" . $d["nombre"] . " " . $d["apellido"] . "</option>";
    }
    ?>
    </select>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Buscar</button>	
      </form>
        </div>

        </body>
</html>