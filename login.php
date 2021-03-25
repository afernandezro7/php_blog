<?php

require_once 'includes/conexion.php';

if(isset($_POST)){ 

    if(isset($_SESSION['error_login'])){
        $_SESSION['error_login']= null;
        unset($_SESSION['error_login']);
    }

    $email= trim($_POST['email']);
    $password= $_POST['password'];

    $sql= "SELECT * FROM usuarios WHERE email='$email' LIMIT 1";
    $login=mysqli_query($db,$sql);

    //var_dump($login);
    //var_dump(mysqli_error($db));

    if($login && mysqli_num_rows($login)==1){
        $usuario = mysqli_fetch_assoc($login);
        // var_dump($usuario);

        $verify_pass= password_verify($password,$usuario['password']);
        // var_dump($password_cifrada);

        if($verify_pass){
            $_SESSION['usuario']=$usuario;

            
        }else{
            $_SESSION['error_login']="Login Incorrecto";
        }

    
    }else{
        $_SESSION['error_login']="Login Incorrecto";
    }

}

header('Location: index.php');