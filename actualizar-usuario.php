<?php

if(isset($_POST)){   
    require_once('includes/conexion.php');

    $nombre= isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos= isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email= isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
    $usuario_id= isset($_SESSION['usuario']) ?  (int)$_SESSION['usuario']['id'] : false;
 

    // var_dump($nombre);
    // var_dump($apellidos);
    // var_dump($email);
    // var_dump($usuario);

    
    
    $errores=array();
   
    if(empty($nombre) || is_numeric($nombre)){   
        $errores['nombre']="El nombre no es válido";
    }
    if(empty($apellidos) || is_numeric($apellidos)){   
        $errores['apellidos']="Los apellidos no son válidos";
    }
    if(empty($email) || is_numeric($nombre) || !filter_var($email,FILTER_VALIDATE_EMAIL)){   
        $errores['email']="El email no es válido";
    }
    
    // var_dump($errores);
    // die();

    if(count($errores)==0){
        $sql="UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos',email='$email' WHERE id='$usuario_id';";
        $consula= mysqli_query($db,$sql);

        if($consula){
            $_SESSION['usuario']['nombre']= $nombre;
            $_SESSION['usuario']['apellidos']= $apellidos;
            $_SESSION['usuario']['email']= $email;
            $_SESSION['completado_misdatos']='Actualización Realizada con éxito';
        }else{
            $errores['error_actualizacion']="Error al introducir los datos";
            $_SESSION['errores_misdatos']=$errores;
            
        }


    }else{
        $_SESSION['errores_misdatos']=$errores;
    }
}

header('Location: mis-datos.php');