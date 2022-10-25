<?php
    print_r($_POST);
    if(!isset($_POST['idPersona'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $idPersona = $_POST["idPersona"];
    $id = $_POST["txtID"];
    $nombre = $_POST["txtNombre"];
    $actividad = $_POST["txtActividades"];
    $hora = $_POST["txtHora"];
    $fecha = $_POST["txtFecha"];

    $sentencia = $bd->prepare("UPDATE personal SET idPersona = ?, nombre = ?, actividad = ?, hora = ?, fecha = ? where idPersona = ?;");
    $resultado = $sentencia->execute([$id, $nombre, $actividad, $hora, $fecha, $idPersona]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>