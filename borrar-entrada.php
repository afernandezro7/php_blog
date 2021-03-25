<?php
require_once 'includes/conexion.php';

if(isset($_SESSION['usuario']) && isset($_GET['id'])){
    $usuario_id= $_SESSION['usuario']['id'];
    $entrada_id= $_GET['id'];

    var_dump($usuario_id);
    var_dump($entrada_id);

    $sql="DELETE FROM entradas WHERE usuario_id=$usuario_id AND id=$entrada_id;";
    $borrar=mysqli_query($db,$sql);

    // var_dump(mysqli_error($db));
    // var_dump($borrar);
    // die();

}

header('Location: index.php');