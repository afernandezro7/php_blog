<?php

if(isset($_POST)){   
    require_once('includes/conexion.php');
    $nombre= isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;

    $errores=array();

    if(!empty($nombre) && !is_numeric($nombre)){
        $nombre_validate= true;
    }else{
        $nombre_validate= false;
        $errores['nombre']="El nombre de la categoría no es válido";
    }

    $guardar_usuario = false;

    if(count($errores)==0){
        $sql="INSERT INTO categorias(nombre) VALUES('$nombre');";
        $categoria_guardada= mysqli_query($db,$sql);

    }else{
        $_SESSION['errores']['categoria']=$errores;
    }
}
// var_dump($_SESSION['errores']['categoria']);
// die();
header('Location: crear-categoria.php');