<?php

// incluimos conexion a base de datos
require_once 'conexion.class.php';


function totalusuarios(){

  // Agregamos conexion a base de datos
  $conexion = Conexion::singleton_conexion();

  $sql = "SELECT count(*) FROM usuarios"; 
  $result = $conexion->prepare($sql); 
  $result->execute(); 
  $total = $result->fetchColumn();
  echo $total; 
}


function totalpublicaciones(){

  // Agregamos conexion a base de datos
  $conexion = Conexion::singleton_conexion();

  $sql = "SELECT count(*) FROM timeline"; 
  $result = $conexion->prepare($sql); 
  $result->execute(); 
  $total = $result->fetchColumn();
  echo $total; 
}


function totalcomentarios(){

  // Agregamos conexion a base de datos
  $conexion = Conexion::singleton_conexion();

  $sql = "SELECT count(*) FROM comentarios"; 
  $result = $conexion->prepare($sql); 
  $result->execute(); 
  $total = $result->fetchColumn();
  echo $total; 
}








function fechastring($fecha){


$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array(" ","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

$year = substr($fecha,0,4);
$month = substr($fecha, 5, 2);
$day = substr($fecha, 8, 2);
$time = date('h:i A',strtotime(substr($fecha, 11,8)));

$complete = '<i title="'.$time.'" >'.$dias[$day]." ".$day." de ".$meses[(int)$month]. " del ".$year.'</i>';

return $complete;

}


function comentarios($publi){

    // Agregamos conexion a base de datos
    $conexion = Conexion::singleton_conexion();

    // Comprobamos si ya existe una foto de perfil
    $sql = $conexion->prepare('SELECT name,comentario,idcomment,fechacomment FROM usuarios,comentarios,timeline WHERE comentarios.usuario = usuarios.iduser AND comentarios.publicacion = timeline.idtimeline AND timeline.idtimeline = :publicacion ');
    $sql->execute(array('publicacion' => $publi));
    $resultado = $sql->fetchAll();
    if (empty($resultado)) {

    }else{
      foreach ($resultado as $row) {
       
       echo '
    <!-- comentario -->
    <div class="col-md-12 comments-post">
       <div class="user-post">
       <strong><i class="fa fa-user"></i> '.$row['name'].'</strong>
        &raquo; <small class="time-post"><i class="fa fa-clock-o"></i>'.fechastring($row['fechacomment']).'</small>
        </div>
      <p class="status-post"> '.$row['comentario'].' </p>
    </div>
    <!-- comentario -->

       ';
 
     }
    }

}




function publicaciones(){


    // Agregamos conexion a base de datos
    $conexion = Conexion::singleton_conexion();

    // Comprobamos si ya existe una foto de perfil
    $sql = $conexion->prepare('SELECT name,estatus,fecha,idtimeline FROM usuarios,timeline WHERE timeline.usuario = usuarios.iduser AND usuarios.iduser = :usuario ORDER BY idtimeline DESC');
    $sql->execute(array('usuario' => $_SESSION['usuarioid']));
    $resultado = $sql->fetchAll();
    if (empty($resultado)) {
       
       echo '

    <!-- no staus -->
    <div class="panel panel-default">
      <div class="panel-body status">
        <div class="user-post"><strong><i class="fa fa-code"></i> SAU v1.0</strong></div>
        <p class="status-post">De momento no hay nada que mostrar :) eso quiere decir que no hay publicaciones, empieza cuando gustes. :D</p>
      </div>
    </div>
    <!-- no staus -->


       ';

    }else{
      foreach ($resultado as $row) {
       
       echo '
    <!-- status -->
    <div id="timeline-post-'.$row['idtimeline'].'" class="panel panel-default time-line-post">
      <div class="panel-body status">
       <div class="user-post">
       <strong><i class="fa fa-user"></i> '.$row['name'].'</strong>
        &raquo; <small class="time-post"><i class="fa fa-clock-o"></i>'.fechastring($row['fecha']).'</small>

         <div class="btn-group pull-right">
         <button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-cog"></i> <span class="caret"></span>
         </button>
         <ul class="dropdown-menu">
           <li><a class="delete-timeline" data-timeline="'.$row['idtimeline'].'" href="#">Eliminar</a></li>
         </ul>
       </div>
       </div>
       <p class="status-post"> '.$row['estatus'].'</p>
      </div>
      <div class="panel-footer comments">
       <form method="POST" action="includes/comentarios.php">

         <div class="col-md-10"><input class="form-control" type="text" name="comentario" >
         <input type="hidden" name="publi" value="'.$row['idtimeline'].'" ></div>
         <div class="col-md-2"><button class="btn btn-success">Comentar</button></div>
         
       </form>

        ';

          comentarios($row['idtimeline']);

        echo'
        </div>
      </div>
    </div>
    <!-- status -->

       ';
 
     }
    }


}



function publicacionespublicas(){


    // Agregamos conexion a base de datos
    $conexion = Conexion::singleton_conexion();

    // Comprobamos si ya existe una foto de perfil
    $sql = $conexion->prepare('SELECT name,estatus,fecha,idtimeline FROM usuarios,timeline WHERE timeline.usuario = usuarios.iduser ORDER BY idtimeline DESC LIMIT 50');
    $sql->execute();
    $resultado = $sql->fetchAll();
    if (empty($resultado)) {
       
       echo '

    <!-- no staus -->
    <div class="panel panel-default">
      <div class="panel-body status">
        <div class="user-post"><strong><i class="fa fa-code"></i> SAU v1.0</strong></div>
        <p class="status-post">De momento no hay nada que mostrar :) eso quiere decir que no hay publicaciones, empieza cuando gustes. :D</p>
      </div>
    </div>
    <!-- no staus -->


       ';

    }else{
      foreach ($resultado as $row) {
       
       echo '
    <!-- status -->
    <div id="timeline-post-'.$row['idtimeline'].'" class="panel panel-default time-line-post">
      <div class="panel-body status">
       <div class="user-post">
       <strong><i class="fa fa-user"></i> '.$row['name'].'</strong>
        &raquo; <small class="time-post"><i class="fa fa-clock-o"></i>'.fechastring($row['fecha']).'</small>
       </div>
       <p class="status-post"> '.$row['estatus'].'</p>
      </div>
      <div class="panel-footer comments">
       <form method="POST" action="includes/comentarios-publicos.php">

         <div class="col-md-10"><input class="form-control" type="text" name="comentario" >
         <input type="hidden" name="publi" value="'.$row['idtimeline'].'" ></div>
         <div class="col-md-2"><button class="btn btn-success">Comentar</button></div>
         
       </form>
        ';

          comentarios($row['idtimeline']);

        echo'
        </div>
      </div>
    </div>
    <!-- status -->

       ';
 
     }
    }


}





?>