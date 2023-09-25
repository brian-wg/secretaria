<?php
require_once 'clases/ControladorSesion.php';
if (isset($_POST['email']) && isset($_POST['clave'])) {
    $cs = new ControladorSesion();
    $result = $cs->create($_POST['nombre'], $_POST['apellido'], 
                          $_POST['dni'], $_POST['email'],
                          $_POST['telefono'], $_POST['domicilio'],
                          $_POST['situacion_revista'], $_POST['fecha_toma_posicion'],
                          $_POST['clave'], $_POST['rol']);
    if( $result[0] === true ) {
        $redirigir = 'home.php?mensaje='.$result[1];
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

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    

    

<link href="bootstrap.min.css" rel="stylesheet">

    <style>
        @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  
    <h1 class="h3 mb-3 fw-normal">Crear una cuenta nueva</h1><br> 
    
    <h2 class="h3 mb-3 fw-normal" style="color:gray">Ingrese los datos en los campos</h1>

<?php
            if (isset($_GET['mensaje'])) {
                echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>'.$_GET['mensaje'].'</p></div>';
            }
        ?>

    <form action="ar7qj28ss7i.php" method="post">
    <div class="form-floating">
      <input name="nombre" class="form-control" id="floatingInput" placeholder="Nombre" required>
      <label for="floatingInput">Nombre</label>
    </div>
    <div class="form-floating">
      <input name="apellido" class="form-control" id="floatingInput" placeholder="Apellido" required>
      <label for="floatingInput">Apellido</label>
    </div>
    <div class="form-floating">
      <input name="dni" type="number" class="form-control" id="floatingInput" placeholder="Dni" required>
      <label for="floatingInput">Dni</label>
    </div>
     <div class="form-floating">
      <input name="email" type="email" required class="form-control" id="floatingInput" placeholder="Email" required>
      <label for="floatingEmail" >Email</label>
    </div>
    <div class="form-floating">
      <input name="telefono" type="number" class="form-control" id="floatingInput" placeholder="Telefono" required>
      <label for="floatingInput">Telefono</label>
    </div>
    <div class="form-floating">
      <input name="domicilio" class="form-control" id="floatingInput" placeholder="Domicilio" required>
      <label for="floatingInput">Domicilio</label>
    </div>
    <div class="form-control"><label>Situación de revista</label>
              <select name="situacion_revista">
                <option value="1">Titular</option>          
                <option value="2">Suplente</option>         
                <option value="3">Interino</option>                                   
              </select>
    </div>
    <div class="form-floating">
      <input name="fecha_toma_posicion" type="date" required class="form-control" id="floatingInput" placeholder="Fecha toma posicion" required>
      <label for="floatingInput">Fecha toma posicion</label>
    </div>
        <div class="form-floating">
      <input name="clave" class="form-control" id="floatingPassword" type="password" placeholder="Clave" required>
      <label for="floatingPassowrd">Clave</label>
    </div>
    <div class="form-control"><label>Rol</label>
              <select name="situacion_revista">
                <option value="1">Docente</option>          
                <option value="2">Secretario/a</option>                                            
              </select>
    </div>
  
    <input type="submit" value="Registrarse" class="btn btn-primary" style="margin:15px">
  </form>
</main>


    
  </body>
</html>