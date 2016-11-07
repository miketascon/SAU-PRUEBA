<?php
require_once 'conexion.class.php';
require_once 'login.class.php';

// Agregamos conexion a base de datos
$conexion = Conexion::singleton_conexion();

if (empty($_POST['estatus'])) {
header('Location: ../index.php');
}else{
$sql = "INSERT INTO timeline(estatus,usuario,fecha) VALUES (:estatus,:usuario,:fecha)";
$fecha = date('Y-m-d h:i:s');                                          
$stmt = $conexion->prepare($sql);               
$stmt->bindParam(':estatus', strip_tags($_POST['estatus']), PDO::PARAM_STR);       
$stmt->bindParam(':usuario', $_SESSION['usuarioid'], PDO::PARAM_INT); 
$stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);               
$stmt->execute();	
}

header('Location: ../index.php');

