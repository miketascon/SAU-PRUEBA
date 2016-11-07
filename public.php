<?php
require_once"includes/login.class.php";
require_once"includes/functions.php";

// Inicia la sesion
session_start();

// Verificamos quien entra
if (isset($_SESSION['usuario'])) {
  // Aqui no hacemos nada
}else{
  // Otra vez iniciamos una session
  session_start();
  // Destruimos la Session
  session_destroy();
  // redireccionamos al login
  header('Location: login.php');
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SAU v1.0 - JHCodes</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <link href="style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <!-- loading -->
    <div id="loading"></div> 
   

    <!-- ### CONTENEDOR ### -->
  <div id="principal" class="container">


<!-- ### MENU ### -->
  <nav class="navbar navbar-default">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">SAU v1.0</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
        
        <li class="last-option" ><a href="public.php"><i class="fa fa-book"></i> Ultimas Publicaciones</a></li>
        <li class="config-option" ><a href="config.php"><i class="fa fa-cog"></i> Configuracion</a></li>
        <li class="exit-option" ><a href="logout.php"><i class="fa fa-sign-in"></i> Salir</a></li>

      </ul>
    </div><!-- /.navbar-collapse -->
 </nav>
<!-- ### MENU ### -->




    <!-- ### CONTENIDO ### -->
    <div id="bodysystem" class="col-md-12">
      


    <!-- publicaciones -->
    <div id="publicaciones">
       <?php publicacionespublicas(); ?>
    </div>
    <!-- publicaciones -->




    </div>
    <!-- ### CONTENIDO ### -->




</div>
<!-- ### CONTENEDOR ### -->





    <!-- ### shadow ### -->
    <div id="shadow"></div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- spin -->
    <script src="js/spin.js"></script>
    <!-- emoticons -->
    <script src="js/emotions.js"></script>
    <!-- custon functions -->
    <script src="js/system.js"></script>

  </body>
</html>