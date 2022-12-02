<?php
    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtIdRegistro"]) || empty($_POST["txtNombreSupervisor"]) || empty($_POST["txtNave"]) || empty($_POST["txtTempInt"]) || empty($_POST["txtTempExt"])|| empty($_POST["txtHumedad"]) || empty($_POST["txtRadiacion"]) || empty($_POST["txtFecha"])){
    header('Location: invSupervisor.php?mensaje=falta');
    exit();
}

include_once 'model/conexionPersona.php';
$id = $_POST["txtIdRegistro"];
$nombreSupervisor = $_POST["txtNombreSupervisor"];
$nave = $_POST["txtNave"];
$tempInterna = $_POST["txtTempInt"];
$temExterna = $_POST["txtTempExt"];
$humeRelativa = $_POST["txtHumedad"];
$radiacion = $_POST["txtRadiacion"];
$fecha = $_POST["txtFecha"];

$sentencia = $bd->prepare("INSERT INTO invernadero(idRegistro,nombreSupervisor,nave,tempInterna,temExterna,humeRelativa,radiacion,fecha) VALUES (?,?,?,?,?,?,?,?);");
$resultado = $sentencia->execute([$id,$nombreSupervisor,$nave,$tempInterna,$temExterna,$humeRelativa,$radiacion,$fecha ]);

if ($resultado === TRUE) {
    header('Location: invSupervisor.php?mensaje=registrado');
} else {
    header('Location: invSupervisor.php?mensaje=error');
    exit();
}

?>