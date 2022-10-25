<?php 
    if(!isset($_GET['idPersona'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $idPersona = $_GET['idPersona'];

    $sentencia = $bd->prepare("DELETE FROM personal where idPersona = ?;");
    $resultado = $sentencia->execute([$idPersona]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    
?>