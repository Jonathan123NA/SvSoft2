<link rel="stylesheet" href="css/fondo.css">
<?php include 'template/headerInvernadero.php' ?>

<?php
    include_once "model/conexionPersona.php";
    $sentencia = $bd -> query("select * from invernadero");
    $invernadero = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($personal);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Registro de la información relevante del invernadero   
                </div>
                <div class="p-4">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Id Registro</th>
                                    <th scope="col">Nave</th>
                                    <th scope="col">Temperatura interna</th>
                                    <th scope="col">Temperatura externa</th>
                                    <th scope="col">Humedad</th>
                                    <th scope="col">Radiacion</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                foreach($invernadero as $dato){
                            ?>
                           
                                <tr>
                                    <td scope="row"><?php echo $dato->idRegistro; ?></td>
                                    <td><?php echo $dato->nave; ?></td>
                                    <td><?php echo $dato->tempInterna; ?></td>
                                    <td><?php echo $dato->temExterna; ?></td>
                                    <td><?php echo $dato->humeRelativa; ?></td>
                                    <td><?php echo $dato->radiacion; ?></td>
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


<?php include 'template/footerInvernadero.php' ?>