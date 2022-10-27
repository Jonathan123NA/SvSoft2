<?php 
    if(!isset($_GET['idPersona'])){
        header('Location: perSupervisor.php?mensaje=error');
        exit();
    }

    include 'model/conexionPersona.php';
    $idPersona = $_GET['idPersona'];

    $sentencia = $bd->prepare("DELETE FROM personal where idPersona = ?;");
    $resultado = $sentencia->execute([$idPersona]);

    if ($resultado === TRUE) {
        header('Location: perSupervisor.php?mensaje=eliminado');
    } else {
        header('Location: perSupervisor.php?mensaje=error');
    }
    
?>