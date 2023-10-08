<?php 
session_start();
require_once 'clases/Persona.php';
require_once 'clases/ControladorSesion.php';
require_once 'clases/Licencia.php';
require_once 'clases/RepositorioPersona.php';
require_once 'clases/RepositorioLicencia.php';



if (isset($_SESSION['usuario'])) {
    
    $usuario = unserialize($_SESSION['usuario']);

    $rl = new RepositorioLicencia();
    $estado = "pendiente";
    $licencias = $rl->getLicenciasSecretarioPendiente($estado, $usuario);
    $nomApe = $usuario->getNombreApellido();


} else {
    
    header('Location: LoginModuloSecretaria.php');
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Gestionar Licencias</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    </div>
    <body class="text-center">
     <h1 class="h3 mb-3 fw-normal" id="titulo">Gesion de licencias</h1><br> 
     <h4>Hola <?php echo $nomApe;?></h4>

    <div class="container mt-3">
    <div class="row"> 
    

            <div class="col-md-12">
                <table class="table" >
                    <thead class="table-success table-striped" >
                        <tr>
                            <th>fecha inicio</th>
                            <th>fecha fin</th>
                            <th>docente</th>
                            <th>estado</th>
                            <th>tipo licencia</th>
                            <th>Acciones</th>
                            <th></th>
                            <th></th>

                        </tr>
                    </thead>

    <tbody>
<?php


foreach ($licencias as $l) {
    echo '<tr><td>'.$l->getFechaInicio().'</td><td>'.$l->getFechaFin().'</td><td>'.$l->getIdPersona().'</td><td>'.$l->getEstado().'</td><td>'.$l->getTipoLicencia().'</td>';
    echo '<td><a href="actualizar.php?id='.$l->getId().'"';
    echo ' class="btn btn-info">Editar</a></td>';
    echo '<td><a href="aprobar.php?id='.$l->getId().'" class="btn btn-info">Aprobar</a></td></tr>';
    echo '<td><a href="rechazar.php?id='.$l->getId().'"';
    echo ' class="btn btn-danger">Rechazar</a></td>';
}?>


 </tbody>
    </table>
        </div>
        </div>  
        </div>
    </body>
</html>