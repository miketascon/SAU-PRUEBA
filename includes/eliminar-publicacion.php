<?php
require_once 'conexion.class.php';
require_once 'login.class.php';

// Agregamos conexion a base de datos
$conexion = Conexion::singleton_conexion();

// Para eliminar la publicacion
$sql = "DELETE FROM timeline WHERE idtimeline =  :idtimeline AND usuario = :usuario";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':idtimeline', $_POST['idtimeline'], PDO::PARAM_INT); 
$stmt->bindParam(':usuario', $_SESSION['usuarioid'], PDO::PARAM_INT);   
$stmt->execute();

// Para eliminar los comentarios
$sql = "DELETE FROM comentarios WHERE publicacion =  :publicacion ";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':publicacion', $_POST['idtimeline'], PDO::PARAM_INT);  
$stmt->execute();


