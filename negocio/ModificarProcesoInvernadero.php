<?php
    print_r($_POST);
    if(!isset($_POST['idRegistro'])){
        header('Location: invSupervisor.php?mensaje=error');
    }

    include 'model/conexionPersona.php';
    $idRegistro = $_POST["idRegistro"];
    $id = $_POST["txtIdRegistro"];
    $nombreSupervisor = $_POST["txtNombreSupervisor"];
    $nave = $_POST["txtNave"];
    $tempInterna = $_POST["txtTempInt"];
    $temExterna = $_POST["txtTempExt"];
    $humeRelativa = $_POST["txtHumedad"];
    $radiacion = $_POST["txtRadiacion"];
    $fecha= $_POST["txtFecha"];

    $sentencia = $bd->prepare("UPDATE invernadero SET idRegistro = ?, nombreSupervisor = ?, nave = ?, tempInterna = ?, temExterna = ?, humeRelativa = ?, radiacion = ?, fecha = ? where idRegistro = ?;");
    $resultado = $sentencia->execute([$id, $nombreSupervisor,$nave, $tempInterna, $temExterna, $humeRelativa, $radiacion, $fecha, $idRegistro]);

    if ($resultado === TRUE) {
        header('Location: invSupervisor.php?mensaje=editado');
    } else {
        header('Location: invSupervisor.php?mensaje=error');
        exit();
    }
    
?>