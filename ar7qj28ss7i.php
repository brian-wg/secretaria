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

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    

    

<link href="bootstrap.min.css" rel="stylesheet">



    
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
      <input name="usuario" class="form-control" id="floatingInput" placeholder="Usuario" required>
      <label for="floatingInput">Usuario</label>
    </div>
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
                <option value="">Secretario</option>
                <option value="titular">Titular</option>          
                <option value="suplente">Suplente</option>         
                <option value="interino">Interino</option>                                   
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
              <select name="rol">
                <option value="docente">Docente</option>          
                <option value="secretario">Secretario/a</option>                                            
              </select>
    </div>
  
    <input type="submit" value="Registrarse" class="btn btn-primary" style="margin:15px">
  </form>
</main>


    
  </body>
</html>