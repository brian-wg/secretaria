<?php 

require_once 'clases/Persona.php';
require_once 'clases/ControladorSesion.php';
require_once 'clases/Licencia.php';
require_once 'clases/RepositorioPersona.php';
require_once 'clases/RepositorioLicencia.php';


session_start();
if (isset($_SESSION['usuario'])) {
    
    $usuario = unserialize($_SESSION['usuario']);

    
    $rl = new RepositorioLicencia();
    $estado = "Pendiente";
    $licencias = $rl->getLicenciasDocente($usuario);

} else {
    
    header('Location: LoginModuloSecretaria.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Editar Licencia</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body class="text-center"> 

<div class="container mt-5">
    <div class="row"> 
    <div class="col-md-3">
        <h3>Editar Licencia</h3>
        <form action="actualizarD2.php" method="POST">
    <input type="hidden" class="form-control mb-3" name="id_licencia" value="<?php echo $_GET['id']; ?>" readonly="">
    <input type="hidden" class="form-control mb-3" name="ultima_modificacion_por" value="<?php echo $usuario->getNombreApellido(); ?>" readonly="">
    <input type="date" class="form-control mb-3" name="fecha_inicio" value="<?php echo $rl->getFechaInicioAnterior($_GET['id']); ?>">
    <input type="date" class="form-control mb-3" name="fecha_fin" value="<?php echo $rl->getFechaFinAnterior($_GET['id']); ?>">


    
    <select name="id_tipo_licencia" id="id_tipo_licencia">
            <option value="">Tipo Licencia</option>
            <option value="1">Enfermedad</option>
            <option value="2">Imprevisto</option>
            <option value="3">Duelo</option>
        </select>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Editar</button>	
      
      </form>
        </div>

        </body>
</html>