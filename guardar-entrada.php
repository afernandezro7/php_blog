<?php

if(isset($_POST)){   
    require_once('includes/conexion.php');

    $usuario= isset($_SESSION['usuario']) ?  (int)$_SESSION['usuario']['id'] : false;
    $categoria= isset($_POST['categoria']) ? (int)mysqli_real_escape_string($db, $_POST['categoria']) : false;
    $titulo= isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
    $descripcion= isset($_POST['descripcion']) ? (mysqli_real_escape_string($db, $_POST['descripcion'])) : false;

    // var_dump($usuario);
    // var_dump($categoria);
    // var_dump($titulo);
    // var_dump($descripcion);
    
    $errores=array();

    if(empty($usuario) || !is_numeric($usuario)){
        $errores['usuario']="El usuario no es válido";
    }

    if(empty($categoria) || !is_numeric($categoria)){ 
        $errores['categoria']="La categoria no es válida";
    }

    if(empty($titulo) || is_numeric($titulo)){   
        $errores['titulo']="El Título no es válido";
    }

    if(empty($descripcion)){
        $errores['descripcion']="El contenido no puedeestar vacío";
    }

    if(count($errores)==0){
        $sql="INSERT INTO entradas VALUES(null,'$usuario','$categoria','$titulo', '$descripcion',curdate());";
        $entrada_guardada= mysqli_query($db,$sql);

        // var_dump($entrada_guardada);

    }else{
        $_SESSION['errores']['entradas']=$errores;
    }
}

header('Location: crear-entrada.php');