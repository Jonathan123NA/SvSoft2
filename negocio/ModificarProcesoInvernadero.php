<?php
    print_r($_POST);
    if(!isset($_POST['idRegistro'])){
        header('Location: invSupervisor.php?mensaje=error');
    }

    include 'model/conexionPersona.php';
    $idRegistro = $_POST["idRegistro"];
    $id = $_POST["txtIdRegistro"];
    $nave = $_POST["txtNave"];
    $tempInterna = $_POST["txtTempInt"];
    $temExterna = $_POST["txtTempExt"];
    $humeRelativa = $_POST["txtHumedad"];
    $radiacion = $_POST["txtRadiacion"];

    $sentencia = $bd->prepare("UPDATE invernadero SET idRegistro = ?, nave = ?, tempInterna = ?, temExterna = ?, humeRelativa = ?, radiacion = ? where idRegistro = ?;");
    $resultado = $sentencia->execute([$id, $nave, $tempInterna, $temExterna, $humeRelativa, $radiacion, $idRegistro]);

    if ($resultado === TRUE) {
        header('Location: invSupervisor.php?mensaje=editado');
    } else {
        header('Location: invSupervisor.php?mensaje=error');
        exit();
    }
    
?>