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
    $rl = new RepositorioLicencia();
    $licencias = $rl->listaTipoLicencias();

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
                <p align="left"><a href="homeDocente.php">Home</a></p>
        <h3>Cargar licencia</h3>
        <form action="insertarD2.php" method="POST" enctype="multipart/form-data">
    <input type="date" class="form-control mb-3" name="fecha_inicio" placeholder="fecha_inicio">
    <input type="date" class="form-control mb-3" name="fecha_fin" placeholder="fecha_fin">
    <input type="hidden" name="id_persona" value="<?php echo  $id?>">
    <label for="id_tipo_licencia">Seleccione tipo de licencia</label>
    <select name="id_tipo_licencia" id="id_tipo_licencia">
    <option value="" disabled selected>tipo licencia</option>
    <?php 
    foreach($licencias as $l) { 
        echo "<option value='" . $l["id_tipo_licencia"] . "'>" . $l["descripcion"] . "</option>";
    }
    ?>


    </select>
    <label for="archivo">Archivo</label>
    <input id="archivo "type="file" name="archivo">
    <button class="w-100 btn btn-lg btn-primary" type="submit">Cargar</button>	
      </form>


        </div>

        </body>
</html>