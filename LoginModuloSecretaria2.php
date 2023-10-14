<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./CSS/estilosLoginsecretaria2.css">
    <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
    <nav class="navbar p-0 navbar-expand-lg sticky-top navbar-light bg-dark">
        <div class="container-fluid">
          <div class="navbar-brand" href="../index.html"><img src="./Imagenes/logo.png" class="img-fluid" width="200px" alt="LogoOrci"></div>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
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
    

      <div class="wrapper fadeInDown">
        <div id="formContent">
         
          <form action="login.php" method="post">
          <h1 class="h3 mb-3 fw-normal" style="color:gray">Modulo Secretaria</h1><br>	
          <h2 class="h3 mb-3 fw-normal" style="color:gray", font>Ingrese con su cuenta</h1>

            <?php
            if (isset($_GET['mensaje'])) {
                echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>'.$_GET['mensaje'].'</p></div>';
            }
        ?>
            <input type="text" id="login" class="fadeIn second" name="login" placeholder="usuario">
            <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
            <label for="floatingPassword">Clave</label>
            <input type="submit" class="fadeIn fourth" value="Ingresar">
          </form>  
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