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
    $licencias = $rl->getLicenciasDocente($usuario);
    $nomApe = $usuario->getNombreApellido();

} else {
    
    header('Location: LoginModuloSecretaria.php');
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Mis Licencias</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">         
        <link rel="stylesheet" href="estilosHomes.css">        
    </head>
    </div>
    <body class="text-center">
        <nav class="navbar p-0 navbar-expand-lg sticky-top navbar-light bg-dark">
            <div class="container-fluid">
                <div class="navbar-brand" href="../index.html"><img src="./Imagenes/logo.png" class="img-fluid" width="200px" alt="LogoOrci"></div>
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
                        <a class="nav-link active text-white" aria-current="page" href="LoginModuloSecretaria2.php">Secretaría</a>
                    </li>            
                    </ul>
                </div>
            </div>
        </nav>
        
        <h1 class="h3 mb-3 fw-normal" id="titulo">Mis licencias</h1><br> 
        <h4>Hola <?php echo $nomApe;?></h4>

        <div class="container mt-3">
            <div class="row"> 
                <p align="left"><a href="homeDocente.php">Home</a></p>
    

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
   echo '<td><a href="actualizarD.php?id='.$l->getArchivo().'"';
      if ($l->getEstado() === "Pendiente") { 
    echo ' class="btn btn-info">Editar</a></td>';}
    echo '<td></td></tr>';
    echo '<td> </td></tr>';
}?>


        </tbody>
                    </table>
                </div>
            </div>  
        </div>

        <footer>
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="address">
                                <h3>Terciario Urquiza</h3>
                                <p class="mb-4 mt-4">Rosario, Santa Fe, Argentina</p>
                                <p><strong>Tel.:</strong> 341 4721431</p>
                                <p><strong>Dirección:</strong> Bv. Oroño 634, esquina Santa Fe</p>
                            </div>
                        </div>

                        <div class="col-lg-2 col-sm-6 footer-menus">
                            <h4>Secciones</h4>
                            <ul>
                                <li><i class="fas fa-check"></i> <a href="">Historia</a></li>
                                <li><i class="fas fa-check"></i> <a href="">Ingresantes</a></li>
                                <li><i class="fas fa-check"></i> <a href="">Carreras</a></li>
                                <li><i class="fas fa-check"></i> <a href="">Calendario</a></li>
                                <li><i class="fas fa-check"></i> <a href="">Contacto</a></li>
                                <li><i class="fas fa-check"></i> <a href="">Secretaría</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <p class="text-center mb-2"><strong>Terciario Urquiza 2023</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer> 
        
    </body>
</html>