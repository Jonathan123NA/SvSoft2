<?php
    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtID"]) || empty($_POST["txtNombre"]) || empty($_POST["txtActividades"])|| empty($_POST["txtHora"])|| empty($_POST["txtFecha"])){
    header('Location: invSupervisor.php?mensaje=falta');
    exit();
}

include_once 'model/conexionPersona.php';
$id = $_POST["txtID"];
$nombre = $_POST["txtNombre"];
$actividad = $_POST["txtActividades"];
$hora = $_POST["txtHora"];
$fecha = $_POST["txtFecha"];

$sentencia = $bd->prepare("INSERT INTO personal(idPersona,nombre,actividad,hora,fecha) VALUES (?,?,?,?,?);");
$resultado = $sentencia->execute([$id,$nombre,$actividad,$hora,$fecha ]);

if ($resultado === TRUE) {
    header('Location: invSupervisor.php?mensaje=registrado');
} else {
    header('Location: invSupervisor.php?mensaje=error');
    exit();
}

?>