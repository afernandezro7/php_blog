<?php
require_once 'includes/conexion.php';

if(isset($_SESSION['usuario']) && isset($_GET['id']) && isset($_POST)){
    $usuario_id= (int)$_SESSION['usuario']['id'];
    $entrada_id= (int)$_GET['id'];

    $titulo= isset($_POST['titulo']) ? trim(mysqli_real_escape_string($db, $_POST['titulo'])) : false;
    $categoria= isset($_POST['categoria']) ? (int)mysqli_real_escape_string($db, $_POST['categoria']) : false;
    $descripcion= isset($_POST['descripcion']) ? trim(mysqli_real_escape_string($db, $_POST['descripcion'])) : false;

    // var_dump($usuario_id);
    // var_dump($entrada_id);
    // var_dump($titulo);
    // var_dump($categoria);
    // var_dump($descripcion);
    // die();

    $errores=array();


    if(empty($titulo) || is_numeric($titulo)){   
        $errores['titulo']="El Título no es válido";
    }

    if(empty($descripcion)){
        $errores['descripcion']="El contenido no puedeestar vacío";
    }

    // var_dump($errores);
    // die();

    if(count($errores)==0){

        $sql="UPDATE entradas SET titulo='$titulo', categoria_id=$categoria, descripcion='$descripcion' WHERE usuario_id=$usuario_id AND id=$entrada_id;";
        $editar=mysqli_query($db,$sql);

        header('Location: index.php');
    }else{
        $_SESSION['errores']['entradas']=$errores;
        header('Location: editar-entrada.php?id=' . $entrada_id);
    }


}

