<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terciario Urquiza</title>
    <link rel="shortcut icon" href="img/favicon-32x32.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
</head>


<body>
  <div class="contenido">
    <nav class="navbar p-0 navbar-expand-lg sticky-top navbar-light bg-dark">
        <div class="container-fluid">
          <div class="navbar-brand" href="modulosecretarios.html"><img src="img/android-chrome-192x192.png" class="img-fluid" width="100px" alt="LogoOrci"></div>
          <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-lg-auto me-auto ml-2 mb-lg-0 align-items-center">
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="">Inicio</a>
              </li>
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
                <a class="nav-link active text-white" aria-current="page" href="">Contacto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="">Calendario</a>
              </li>        
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="">Secretaria</a>
              </li>        
            </ul>
          </div>
        </div>
      </nav>

      <div class="presentacion">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
         <div class="carousel-inner">
           <div class="carousel-item active">
             <img src="img/fondo.webp" class="d-block w-100" height="400px" alt="terciario-urquiza">
             <div class="carousel-caption d-none d-md-block">
               <div class="textoP">
                 <h1>Secretarios</h1>
                 <p>Seleccione una opción para continuar:</p>
               </div>
             </div>
           </div>
         </div>
       </div> 
     </div>

     <div class="centrar">
        <button type="button" id="botonlicencias" class="botonPersonalizado">Gestionar licencias
          <a href="gestionarlicencias.php" id="botonlicencias"></a>
        </button>

        <button type="button" id="botonlicencias" class="botonPersonalizado">Consultar historial licencias docentes
          <a href="consultarlicencias.php" id="botonlicencias"></a>
        </button>
     </div>
  </div>

     <footer>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="text-center mb-2"><strong>Terciario Urquiza</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
</body>


</html>