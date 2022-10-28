<?php
    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtIdRegistro"]) || empty($_POST["txtNave"]) || empty($_POST["txtTempInt"]) || empty($_POST["txtTempExt"])|| empty($_POST["txtHumedad"])|| empty($_POST["txtRadiacion"])){
    header('Location: invSupervisor.php?mensaje=falta');
    exit();
}

include_once 'model/conexionPersona.php';
$id = $_POST["txtIdRegistro"];
$nave = $_POST["txtNave"];
$tempInterna = $_POST["txtTempInt"];
$temExterna = $_POST["txtTempExt"];
$humeRelativa = $_POST["txtHumedad"];
$radiacion = $_POST["txtRadiacion"];

$sentencia = $bd->prepare("INSERT INTO invernadero(idRegistro,nave,tempInterna,temExterna,humeRelativa,radiacion) VALUES (?,?,?,?,?,?);");
$resultado = $sentencia->execute([$id,$nave,$tempInterna,$temExterna,$humeRelativa,$radiacion ]);

if ($resultado === TRUE) {
    header('Location: invSupervisor.php?mensaje=registrado');
} else {
    header('Location: invSupervisor.php?mensaje=error');
    exit();
}

?>