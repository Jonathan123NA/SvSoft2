<link rel="stylesheet" href="css/fondo.css">
<link rel="stylesheet" href="css/bootstrap.css">
<?php include 'template/headerPersona.php' ?>

<?php
    include_once "model/conexionPersona.php";
    $sentencia = $bd -> query("select * from personal");
    $personal = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($personal);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <!-- Alerta --->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>
            <!-- fin -->
            <!-- Alerta --->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado correctamente!</strong> Se registraron todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>
            <!-- fin -->

            <!-- Alerta --->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   


        <!-- Alerta --->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- Alerta --->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <div class="card">
                <div class="card-header">
                    Registro de Actividades    
                </div>
                <div class="p-4">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Id Personal</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Actividad</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col" colspan="2" >Opciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                foreach($personal as $dato){
                            ?>
                           
                                <tr>
                                    <td scope="row"><?php echo $dato->idPersona; ?></td>
                                    <td><?php echo $dato->nombre; ?></td>
                                    <td><?php echo $dato->actividad; ?></td>
                                    <td><?php echo $dato->hora; ?></td>
                                    <td><?php echo $dato->fecha; ?></td>
                                    <td><a class="text-success" href="ModificarPersona.php?idPersona=<?php echo $dato->idPersona; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="EliminarPersona.php?idPersona=<?php echo $dato->idPersona; ?>"><i class="bi bi-trash"></i></a></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
    
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Captura de Datos
                </div>
                <form  class="p-4" method="POST" action="RegistrarPersona.php">
                    <div class="mb-3">
                        <label class="form-label">ID Personal: </label>
                    <input type="text" class="form-control" name="txtID" autofocus required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nombre Personal: </label>
                    <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Descripcion de Actividad: </label>
                    <input type="text" class="form-control" name="txtActividades" autofocus required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Hora: </label>
                    <input type="time" class="form-control" name="txtHora" autofocus required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fecha: </label>
                    <input type="date" class="form-control" name="txtFecha" autofocus required>
                    </div>

                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value=" Guardar">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>


<?php include 'template/footerPersona.php' ?>