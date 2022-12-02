
<link rel="stylesheet" href="css/fondoCambiante.css"><!--css con el fondo y el boton de cambiar paleta de colores-->
<link rel="stylesheet" href="css/cabecera.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    
        <script src="https://kit.fontawesome.com/03a89292db.js" crossorigin="anonymous"></script>
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
                    Registro de Actividades    
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

<script src="js/main.js"></script><!--Importante para que funcione el boton de cambio-->
<?php include 'template/footerInvernadero.php' ?>