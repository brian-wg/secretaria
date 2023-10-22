<?php
require_once 'clases/ControladorSesion.php';
if (isset($_POST['usuario']) && isset($_POST['clave'])) {
    $cs = new ControladorSesion();
    $result = $cs->create($_POST['usuario'], $_POST['nombre'], $_POST['apellido'], 
                          $_POST['dni'], $_POST['email'],
                          $_POST['telefono'], $_POST['domicilio'],
                          $_POST['situacion_revista'], $_POST['fecha_toma_posicion'],
                          $_POST['clave'], $_POST['rol']);
    if( $result[0] === true ) {
        $redirigir = 'homeSecretario.php?mensaje='.$result[1];
    } else {
        $redirigir = 'ar7qj28ss7i.php?mensaje='.$result[1];
    }
    header('Location: ' . $redirigir);
}
?>

<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Crear usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/styleLogin2.css">

    </head>

    <body class="text-center">
    <nav class="navbar p-0 navbar-expand-lg sticky-top navbar-light bg-dark">
            <div class="container-fluid">
                <a href="index.html"> <img src="./Imagenes/logo.png" class="img-fluid" width="200px" alt="LogoTerciarioUrquiza"> 
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

    <main>    
        <?php
        if (isset($_GET['mensaje'])) {
            echo '<div id="mensaje" class="alert alert-primary text-center">
            <p>'.$_GET['mensaje'].'</p></div>';
            }
        ?>

        <form action="ar7qj28ss7i.php" method="post">
        <div class="container">
            <div class="d-flex justify-content-center h-100">
                <div class="cards">
                    <div class="card-header">
                        <h3>Crear una cuenta nueva</h3>
                    </div>
                    <div class="card-body">

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input name="usuario" type="text" class="form-control" placeholder="Usuario" required>					
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input name="nombre" type="text" class="form-control" placeholder="Nombre" required>	
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input name="apellido" type="text" class="form-control" placeholder="Apellido" required>					
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input name="dni" type="number" class="form-control" placeholder="DNI" required>					
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input name="email" type="email" class="form-control" placeholder="Email" required>					
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input name="telefono" type="number" class="form-control" placeholder="Teléfono" required>					
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input name="domicilio" class="form-control" placeholder="Domicilio" required>			
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input name="clave" type="password" class="form-control" placeholder="Clave" required>					
                            </div>

                            <div class="form-control" style = "margin-bottom: 16px;">
                                <label>Situación de revista</label>
                                        <select name="situacion_revista">
                                        <option value="">Secretario</option>
                                        <option value="titular">Titular</option>          
                                        <option value="suplente">Suplente</option>         
                                        <option value="interino">Interino</option>                                   
                                        </select>
                            </div>
                            
                            <div class="form-control" style = "margin-bottom: 16px;">
                                <label>Rol</label>
                                    <select name="rol">
                                    <option value="docente">Docente</option>          
                                    <option value="secretario">Secretario/a</option>                                    
                                    </select>
                            </div>

                            <div class="form-floating">
                                <input name="fecha_toma_posicion" type="date" required class="form-control" id="floatingInput" placeholder="Fecha toma posicion" required>
                                <label for="floatingInput">Fecha toma posicion</label>
                            </div>


                            <input type="submit" value="Registrarse" class="btn btn-primary" style="margin:15px">
                    </div>
                </div>
            </div>   
        </form>
    </main>

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