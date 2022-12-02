<link rel="stylesheet" href="css/fondoEstatico.css">
<link rel="stylesheet" href="css/bootstrap.css">
<?php include 'template/headerInvernadero.php' ?>

<!-- Conexion con la base de datos y sentencia select-->
<?php
    include_once "model/conexionPersona.php";
    $sentencia = $bd -> query("select * from invernadero");
    $invernadero = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($personal);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9"> <!-- El numero indica el tamaño de la tabla --->

            <!-- Alerta en caso de campos faltantes del formulario--->
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

            <!-- Alerta al agregar un registro --->
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

            <!-- Alerta en caso de error --->
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


            <!-- Alerta al cambiar un registro--->
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

            <!-- Alerta al eliminar un registro--->
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
                <div class="card-header"> <!-- Titulo de la tabla -->
                    Registro de la información relevante del invernadero   
                </div>
                <div class="p-4">
                        <table class="table align-middle">
                            <thead>
                                <!-- Campos de la tabla -->
                                <tr>
                                    <th scope="col">Id Registro</th>
                                    <th scope="col">Nombre Supervisor</th>
                                    <th scope="col">Nave</th>
                                    <th scope="col">Temperatura interna</th>
                                    <th scope="col">Temperatura externa</th>
                                    <th scope="col">Humedad Relativa</th>
                                    <th scope="col">Radiación</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col" colspan="2" >Opciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            <!-- Recorrido de todos los datos para mostrarlos en la tabla -->
                            <?php
                                foreach($invernadero as $dato){
                            ?>

                                <!-- Mostrar cada dato de la base de datos en el campo correspondente -->
                                <tr>
                                    <td scope="row"><?php echo $dato->idRegistro; ?></td>
                                    <td><?php echo $dato->nombreSupervisor; ?></td>
                                    <td><?php echo $dato->nave; ?></td>
                                    <td><?php echo $dato->tempInterna; ?></td>
                                    <td><?php echo $dato->temExterna; ?></td>
                                    <td><?php echo $dato->humeRelativa; ?></td>
                                    <td><?php echo $dato->radiacion; ?></td>
                                    <td><?php echo $dato->fecha; ?></td>
                                    <!-- Icono que redirecciona al apartado de modificar un registro en especifico -->
                                    <td><a class="text-success" href="ModificarInvernadero.php?idRegistro=<?php echo $dato->idRegistro; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <!-- Icono para eliminar un registro especifico -->
                                    <td><a onclick="return confirm('¿Estas seguro de que se desea eliminar?');" class="text-danger" href="EliminarInvernadero.php?idRegistro=<?php echo $dato->idRegistro; ?>"><i class="bi bi-trash"></i></a></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                
                <!-- Graficas --->
                <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
                <script src="librerias/jquery-3.3.1.min.js"></script>
                <script src="librerias/plotly-latest.min.js"></script>
                <script type="text/javascript">
                $(document).ready(function(){
                    $('#cargaLineal').load('lineal.php');
                    $('#cargaBarras').load('barras.php');
                });
                </script>
                <br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel panel-heading">
                                    Datos del invernadero acorde a la nave
                                </div>
                                <div class="panel panel-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div><h4>&emsp; &emsp; Nave</h4></div>
                                            <div id="cargaLineal"></div> <!-- Grafica Lineal -->
                                            <div><h4>&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; Temperatura Interna</h4></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div><h4>&emsp; &emsp; Nave</h4></div>
                                            <div id="cargaBarras"></div> <!-- Grafica de barras -->
                                            <div><h4>&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; Temperatura Externa</h4></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        
        <!-- Apartado del formulario para la captura de datos para crear un nuevo registro -->
        <div class="col-md-3"> <!-- El numero indica el tamaño de la tabla --->
            <div class="card">
                <div class="card-header">
                    Captura de Datos
                </div>
                <form  class="p-4" method="POST" action="RegistrarInvernadero.php">
                    
                    <div class="mb-3">
                        <label class="form-label">ID Registro: </label>
                    <input type="text" class="form-control" name="txtIdRegistro" autofocus required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nombre del Supervisor: </label>
                    <input type="text" class="form-control" name="txtNombreSupervisor" autofocus required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nave: </label>
                    <input type="text" class="form-control" name="txtNave" autofocus required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Temperatura Interna: </label>
                    <input type="text" class="form-control" name="txtTempInt" autofocus required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Temperatura Externa: </label>
                    <input type="text" class="form-control" name="txtTempExt" autofocus required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Humedad Relativa: </label>
                    <input type="text" class="form-control" name="txtHumedad" autofocus required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Radiación: </label>
                    <input type="text" class="form-control" name="txtRadiacion" autofocus required>
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
<br></br><br></br>
</div>

<!-- Footer -->
<?php include 'template/footerInvernadero.php' ?>