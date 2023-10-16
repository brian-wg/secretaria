<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywoard" content="Desarrollo de Software, informática">
  <meta name="description" content="Terciario Urquiza">
  <title>Terciario Urquiza</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="estilosLoginSecretaria2.css">
    <link rel="stylesheet" type="text/css" href="estilosLoginSecretaria1.css">
</head>

<body>
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
  
    <main>
        <form action="login.php" method="post">
        <?php
            if (isset($_GET['mensaje'])) {
                echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>'.$_GET['mensaje'].'</p></div>';
            }
        ?>

        <div class="container">
            <div class="d-flex justify-content-center h-100">
                <div class="cards">
                    <div class="card-header">
                        <h3>Ingrese su cuenta</h3>
                    </div>
                    <div class="card-body">

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input name="usuario" type="text" class="form-control" placeholder="Usuario">					
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input name="clave" type="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Ingresar" class="btn float-right login_btn">
                            </div>

                    </div>
                </div>
            </div>
        </div>    
        </form>
    </main>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
