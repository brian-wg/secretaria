<?php 
session_start();
require_once 'clases/Persona.php';
require_once 'clases/ControladorSesion.php';
require_once 'clases/Licencia.php';
require_once 'clases/RepositorioPersona.php';
require_once 'clases/RepositorioLicencia.php';



if (isset($_SESSION['usuario'])) {
    
    $usuario = unserialize($_SESSION['usuario']);
    
    $id_persona = $_POST['id_persona'];
    $rl = new RepositorioLicencia();
    $logs = $rl->historialCambiosLicencias($id_persona);
    $nomApe = $usuario->getNombreApellido();

} else {
    
    header('Location: LoginModuloSecretaria.php');
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Historial Licencia Consultada</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    </div>
    <body class="text-center">
     <h1 class="h3 mb-3 fw-normal" id="titulo">Historial Licencia Consultada</h1><br> 
     <h4>Hola <?php echo $nomApe;?></h4>

    <div class="container mt-3">
    <div class="row"> 
    

            <div class="col-md-12">
                <table class="table" >
                    <thead class="table-success table-striped" >
                        <tr>
                            <th>Docente</th>
                            <th>Editor</th>
                            <th>Fecha cambio</th>
                            <th>Campo modificado</th>
                            <th>Valor anterior</th>
                            <th>Nuevo valor</th>
                            <th>Estado</th>
                            <th>Tipo licencia</th>

                        </tr>
                    </thead>

    <tbody>
<?php

foreach ($logs as $l) {
    echo '<tr><td>'.$l['nombre'].'</td><td>'.$l['id_editor'].'</td><td>'.$l['fecha_cambio'].'</td><td>'.$l['campo_modificado'].'</td><td>'.$l['valor_anterior'].'</td><td>'.$l['nuevo_valor'].'</td><td>'.$l['estado'].'</td><td>'.$l['descripcion'].'</td>';
    echo '<td></td></tr>';
    echo '<td> </td></tr>';
}?>


 </tbody>
    </table>
        </div>
        </div>  
        </div>
    </body>
</html>