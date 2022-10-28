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
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'template/footerPersona.php' ?>