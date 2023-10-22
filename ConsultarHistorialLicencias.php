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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="./CSS/styleResto.css">      
    </head>
    
    <body> 
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
            </div>       
        </div>

        <div class="footer-basic">
            <footer>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Historia</a></li>
                    <li class="list-inline-item"><a href="#">Ingresantes</a></li>
                    <li class="list-inline-item"><a href="#">Carreras</a></li>
                    <li class="list-inline-item"><a href="#">Calendario</a></li>
                    <li class="list-inline-item"><a href="#">Contacto</a></li>
                    <li class="list-inline-item"><a href="#">Secretaría</a></li>
                </ul>
                <p class="copyright">TERCIARIO URQUIZA - Rosario, Santa Fe - Bv. Oroño 634 - 341 4721431 </p>
            </footer>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

    </body>
</html>