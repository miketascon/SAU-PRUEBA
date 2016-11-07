<?php
require_once 'includes/login.class.php';

//accedemos al método singleton que es quién crea la instancia
//de nuestra clase y así podemos acceder sin necesidad de
//crear nuevas instancias, lo que ahorra consumo de recursos
$nuevoSingleton = Login::singleton_login();
 

if (isset($_SESSION['usuario'])) {
//////////////////////////////////////////////

  header("Location: index.php");

//////////////////////////////////////////////
}else{

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    //accedemos al método usuarios y los mostramos
    $usuario = $nuevoSingleton->login_users($email,$password);
    
    if($usuario == TRUE){
        header("Location: index.php");
    }
    if($usuario == FALSE){   
      session_start();
      session_destroy();
      header("Location: login.php?error");
    }
 }
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

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <link href="style.css" rel="stylesheet">
    <style type="text/css">
      .container{margin-top: 15%;}
      .alert-danger {color: #FFF;background-color: rgba(185, 9, 37, 0.65);border-color: transparent;text-align: center;}
    </style>

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
   

      <div id="loginbox" class="container">


          <div class="row">
              <div class="col-sm-6 col-md-4 col-md-offset-4">
        <?php
           if (isset($_GET['error'])) {
             echo '<div id="errorbox" class="alert alert-danger" role="alert">
                  <strong><i class="fa fa-times"></i> No tienes acceso a esta area del sistema, para acceder inciia sersion con tus datos de acceso, gracias.</strong>
                 </div>';
           }
        ?>
                  <div class="account-wall">
                  <h1 class="text-center login-title">SAU v1.0</h1>
                      <form class="form-signin" method="POST" action="">
                      <input type="text" name="email" class="form-control" placeholder="Correo Electronico" required autofocus>
                      <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                      <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fa fa-sign-in"></i> Iniciar Sesion</button>
                      </form>
                    </div>
                  </div>
              </div>
          </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- spin -->
    <script src="js/spin.js"></script>
    <!-- custon functions -->
    <script src="js/functions.js"></script>

  </body>
</html>