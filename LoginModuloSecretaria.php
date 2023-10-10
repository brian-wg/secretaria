<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Modulo Secretaria</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    

    

<link href="bootstrap.min.css" rel="stylesheet">


    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form action="login.php" method="post">
    <h1 class="h3 mb-3 fw-normal">Modulo Secretaria</h1><br>	
    
    <h2 class="h3 mb-3 fw-normal" style="color:gray">Ingrese con su cuenta</h1>

<?php
            if (isset($_GET['mensaje'])) {
                echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>'.$_GET['mensaje'].'</p></div>';
            }
        ?>

    <div class="form-floating">
      <input name="usuario" class="form-control" id="floatingInput" placeholder="Usuario">
      <label for="floatingInput">Usuario</label>
    </div>
    <div class="form-floating">
      <input name="clave" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Clave</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>	
    
    <p class="mt-5 mb-3 text-muted">&copy;2023</p>
  </form>
</main>


    
  </body>
</html>
