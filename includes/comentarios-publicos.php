<?php
require_once 'conexion.class.php';
require_once 'login.class.php';

// Agregamos conexion a base de datos
$conexion = Conexion::singleton_conexion();

if (empty($_POST['comentario'])) {
header('Location: ../public.php');
}else{
$sql = "INSERT INTO comentarios(comentario,publicacion,usuario,fechacomment) VALUES (:comentario,:publicacion,:usuario,:fechacomment)";
$fecha = date('Y-m-d h:i:s');                                          
$stmt = $conexion->prepare($sql);               
$stmt->bindParam(':comentario', strip_tags($_POST['comentario']), PDO::PARAM_STR);       
$stmt->bindParam(':usuario', $_SESSION['usuarioid'], PDO::PARAM_INT);
$stmt->bindParam(':publicacion', strip_tags($_POST['publi']), PDO::PARAM_STR); 
$stmt->bindParam(':fechacomment', $fecha, PDO::PARAM_STR);               
$stmt->execute();	
}

header('Location: ../public.php#timeline-post-'.$_POST['publi']);

