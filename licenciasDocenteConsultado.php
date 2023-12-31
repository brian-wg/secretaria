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
    $licencias = $rl->getLicenciasDocenteConsultado($id_persona);
    $nomApe = $usuario->getNombreApellido();

} else {
    
    header('Location: LoginModuloSecretaria.php');
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> licencias docente consultado</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="./CSS/styleResto.css">   
    </head>
    <body class="text-center">
    
    <nav class="navbar p-0 navbar-expand-lg sticky-top navbar-light bg-dark">
            <div class="container-fluid">
                <a href="homeSecretario.php"> <img src="./Imagenes/logo.png" class="img-fluid" width="200px" alt="LogoTerciarioUrquiza"> 
                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-lg-auto me-auto ml-2 mb-lg-0 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="">Historia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="">Ingresantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="">Carreras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="">Calendario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="">Contacto</a>
                    </li>            
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="LoginModuloSecretaria.php">Secretaría</a>
                    </li>            
                    </ul>
                </div>
            </div>
        </nav>
    
        <h1 class="h3 mb-3 fw-normal"  id="titulo">Licencias de docente</h1><br> 
        <h4>Hola <?php echo $nomApe;?></h4>

        <div class="container mt-3">
        <div class="row"> 
        <p align="left"><a href="homeSecretario.php">Home</a></p>
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
            $fechaInicio = date('d/m/Y', strtotime($l->getFechaInicio()));
            $fechaFin = date('d/m/Y', strtotime($l->getFechaFin()));

            echo '<tr><td>' . $fechaInicio . '</td><td>' . $fechaFin . '</td><td>' . $l->getIdPersona() . '</td><td>' . $l->getEstado() . '</td><td>' . $l->getTipoLicencia() . '</td>';
            echo '<td><a href="actualizar.php?id=' . $l->getUltimaModificacionPor() . '"';
            echo ' class="btn btn-info">Editar</a></td>';
            echo '<td></td></tr>';
            echo '<td> </td></tr>';
        }?>

        </tbody>
    
        </table>
        </div>
        </div>  
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    </body>
</html>