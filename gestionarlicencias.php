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
    $licencias = $rl->getLicencias($usuario);
    $nomApe = $usuario->getNombreApellido();


} else {
    
    header('Location: index.php');
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
     <h5>Hola <?php echo $nomApe;?></h4>

    <div class="container mt-3">
    <div class="row"> 
    

            <div class="col-md-12">
                <table class="table" >
                    <thead class="table-success table-striped" >
                        <tr>
                            <th>id</th>
                            <th>fecha inicio</th>
                            <th>fecha fin</th>
                            <th>docente</th>
                            <th>estado</th>
                            <th>tipo licencia</th>
                        </tr>
                    </thead>

    <tbody>
<?php

// imprimo el total de los productos contados anteriormente almacenados
// echo "<h3>Total de productos de '".$usuario->getNomAp()."': ".$productos_totales."</h3>";

foreach ($licencias as $l) {
    echo '<tr><td>'.$l->getId().'</td><td>'.$l->getFechaInicio().'</td><td>'.$l->getFechaFin().'</td><td>'.$nomApe.'</td><td>'.$l->getEstado().'</td><td>'.$l->getTipoLicencia().'</td>';
    echo '<td><a href="actualizar.php?id='.$l->getId().'"';
    echo ' class="btn btn-info">Editar</a></td>';
    echo '<td><a href="delete.php?id='.$l->getId().'" class="btn btn-danger">Eliminar</a></td></tr>';
}?>


 </tbody>
    </table>
        </div>
        </div>  
        </div>
    </body>
</html>