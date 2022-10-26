<?php 
    if(!isset($_GET['idPersona'])){
        header('Location: invSupervisor.php?mensaje=error');
        exit();
    }

    include 'model/conexionPersona.php';
    $idPersona = $_GET['idPersona'];

    $sentencia = $bd->prepare("DELETE FROM personal where idPersona = ?;");
    $resultado = $sentencia->execute([$idPersona]);

    if ($resultado === TRUE) {
        header('Location: invSupervisor.php?mensaje=eliminado');
    } else {
        header('Location: invSupervisor.php?mensaje=error');
    }
    
?>