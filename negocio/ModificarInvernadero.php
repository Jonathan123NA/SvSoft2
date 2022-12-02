<?php include 'template/headerInvernadero.php' ?>
<link rel="stylesheet" href="css/fondoEstatico.css">
<link rel="stylesheet" href="css/bootstrap.css">
<?php
    if(!isset($_GET['idRegistro'])){
        header('Location: invSupervisor.php?mensaje=error');
        exit();
    }

    include_once 'model/conexionPersona.php';
    $idRegistro = $_GET['idRegistro'];

    $sentencia = $bd->prepare("select * from invernadero where idRegistro = ?;");
    $sentencia->execute([$idRegistro]);
    $registro = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($registro);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                Editar datos:
                </div>
                <form class="p-4" method="POST" action="ModificarProcesoInvernadero.php">
                    <div class="mb-3">
                        <label class="form-label">ID Registro: </label>
                        <input type="text" class="form-control" name="txtIdRegistro" autofocus required value="<?php echo $registro->idRegistro; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre del Supervisor: </label>
                    <input type="text" class="form-control" name="txtNombreSupervisor" autofocus required value="<?php echo $registro->nombreSupervisor; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nave: </label>
                        <input type="text" class="form-control" name="txtNave" autofocus required value="<?php echo $registro->nave; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Temperatura Interna: </label>
                        <input type="text" class="form-control" name="txtTempInt" autofocus required value="<?php echo $registro->tempInterna; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Temperatura Externa: </label>
                        <input type="text" class="form-control" name="txtTempExt" autofocus required value="<?php echo $registro->temExterna; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Humedad Relativa: </label>
                        <input type="text" class="form-control" name="txtHumedad" autofocus required value="<?php echo $registro->humeRelativa; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Radiación: </label>
                        <input type="text" class="form-control" name="txtRadiacion" autofocus required value="<?php echo $registro->radiacion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha: </label>
                        <input type="date" class="form-control" name="txtFecha" autofocus required value="<?php echo $registro->fecha; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="idRegistro" value="<?php echo $registro->idRegistro; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br></br>
<?php include 'template/footerInvernadero.php' ?>