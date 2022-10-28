<?php 
    if(!isset($_GET['idRegistro'])){
        header('Location: invSupervisor.php?mensaje=error');
        exit();
    }

    include 'model/conexionPersona.php';
    $idRegistro = $_GET['idRegistro'];

    $sentencia = $bd->prepare("DELETE FROM invernadero where idRegistro = ?;");
    $resultado = $sentencia->execute([$idRegistro]);

    if ($resultado === TRUE) {
        header('Location: invSupervisor.php?mensaje=eliminado');
    } else {
        header('Location: invSupervisor.php?mensaje=error');
    }
    
?>