<?php

if(isset($_POST['submit'])){   
    require_once('includes/conexion.php');

    $nombre= isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos= isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email= isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password= isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

    $errores=[];

    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
        $nombre_validate= true;
    }else{
        $nombre_validate= true;
        $errores['nombre']="El nombre no es Válido";
    }

    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/",$apellidos)){
        $apellidos_validate= true;
    }else{
        $apellidos_validate= true;
        $errores['apellidos']="Los apellidos no son Válidos";
    }

    if(!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL)){
        $email_validate= true;
    }else{
        $email_validate= true;
        $errores['email']="El email no es Válido";
    }

    if(!empty($password) ){
        $password_validate= true;
    }else{
        $password_validate= true;
        $errores['password']="La contraseña está vacía";
    }

    $guardar_usuario = false;

    if(count($errores)==0){
        $guardar_usuario = true;

        //CIFRAR CONTRASEÑA
        $password_segura= password_hash($password, PASSWORD_BCRYPT,['cost'=>4]);
        

        //INSERTAR USUARIO EN DB
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', curdate() );";
        $guardar_usuario=mysqli_query($db,$sql);

        // var_dump($guardar_usuario);
        // var_dump(mysqli_error($db));
        // die();

        if($guardar_usuario){
            $_SESSION['completado']= "El registro se ha completado con éxito";
        }else{
            $_SESSION['errores']['general']= "Fallo al guardar el usuario";         
        }
        

    }else{
        $_SESSION['errores']=$errores;
    }

}

header('Location: index.php');
