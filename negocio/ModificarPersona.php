<?php include 'template/headerPersona.php' ?>

<?php
    if(!isset($_GET['idPersona'])){
        header('Location: perSupervisor.php?mensaje=error');
        exit();
    }

    include_once 'model/conexionPersona.php';
    $idPersona = $_GET['idPersona'];

    $sentencia = $bd->prepare("select * from personal where idPersona = ?;");
    $sentencia->execute([$idPersona]);
    $personal = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($personal);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="ModificarProcesoPersona.php">
                    <div class="mb-3">
                        <label class="form-label">ID Personal: </label>
                        <input type="text" class="form-control" name="txtID" autofocus required value="<?php echo $personal->idPersona; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required value="<?php echo $personal->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Actividades: </label>
                        <input type="text" class="form-control" name="txtActividades" autofocus required value="<?php echo $personal->actividad; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hora: </label>
                        <input type="time" class="form-control" name="txtHora" autofocus required value="<?php echo $personal->hora; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha: </label>
                        <input type="date" class="form-control" name="txtFecha" autofocus required value="<?php echo $personal->fecha; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="idPersona" value="<?php echo $personal->idPersona; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footerPersona.php' ?>