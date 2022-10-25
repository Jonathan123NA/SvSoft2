<?php
$usuario=$_POST['usuario'];
$password=$_POST['password'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","","svsoft");

$consulta="SELECT*FROM usuario where usuario='$usuario' and password='$password'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['tipoUsuario']==1){ //administrador
    header("location:indexAdministrador.php");

}else
if($filas['tipoUsuario']==2){ //cliente
header("location:indexSupervisor.php");
}
else{
    ?>
    <?php
    include("index.html");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);

