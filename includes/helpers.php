<?php


function mostrarError($errores, $campo){
    $alerta= '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alert alerta-error'>". $errores[$campo] . "</div>";
    }

    return $alerta;
}

function borrarError(){
    if(isset($_SESSION['errores'])){
        $_SESSION['errores']= null;
        unset($_SESSION['errores']);
    }
    if(isset($_SESSION['completado'])){
        $_SESSION['completado']= null;
        unset($_SESSION['completado']);
    }
    if(isset($_SESSION['errores']['generales'])){
        $_SESSION['generales']= null;
        unset($_SESSION['generales']);
    }
    if(isset($_SESSION['errores']['categoria'])){
        $_SESSION['errores']['categoria']= null;
        unset($_SESSION['errores']['categoria']);
    }
    if(isset($_SESSION['errores']['entradas'])){
        $_SESSION['errores']['entradas']= null;
        unset($_SESSION['errores']['entradas']);
    }

    if(isset($_SESSION['errores_misdatos'])){
        $_SESSION['errores_misdatos']= null;
        unset($_SESSION['errores_misdatos']);
    }
    if(isset($_SESSION['completado_misdatos'])){
        $_SESSION['completado_misdatos']= null;
        unset($_SESSION['completado_misdatos']);
    }
}

function conseguirCategorias($conexion){
    $sql="SELECT * FROM categorias ORDER BY id ASC;";
    $categorias= mysqli_query($conexion,$sql);

    $result= array();

    if($categorias && mysqli_num_rows($categorias)>=1){
        $result= $categorias;
    }
    
    return $result;
}

function conseguirPorID($conexion,$id){
    $sql="SELECT * FROM categorias WHERE id=$id;";
    $categoria= mysqli_query($conexion,$sql);

    $result= false;

    if($categoria && mysqli_num_rows($categoria)==1){
        $result= mysqli_fetch_assoc($categoria);
    }
    
    return $result;
}

function conseguirEntradas($conexion, $type='limitada'){

    switch ($type) {
        case 'limitada':
            $sql="SELECT e.*,c.nombre AS 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id=c.id ORDER BY e.id DESC LIMIT 4;";
            break;
        case 'completo':
            $sql="SELECT e.*,c.nombre AS 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id=c.id ORDER BY e.id DESC";
            break;
        
        default:
            $sql="SELECT e.*,c.nombre AS 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id=c.id ORDER BY e.id DESC LIMIT 4;";
            break;
    }
    
    $entradas= mysqli_query($conexion,$sql);

    $result= array();

    if($entradas && mysqli_num_rows($entradas)>=1){
        $result= $entradas;
    }
    
    return $result;
}


function conseguirEntradasXid($conexion, $id){
    $sql="SELECT e.*,c.nombre AS 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id=c.id WHERE e.categoria_id=$id ORDER BY e.id DESC;";
    $entradas= mysqli_query($conexion,$sql);

    $result= array();

    if($entradas && mysqli_num_rows($entradas)>=1){
        $result= $entradas;
    }
    
    return $result;
}

function conseguirEntrada($conexion, $id){
    $sql="SELECT e.*,c.nombre AS 'categoria', concat(u.nombre, ' ' ,u.apellidos) AS 'usuario' FROM entradas e INNER JOIN categorias c ON e.categoria_id=c.id INNER JOIN usuarios u ON e.usuario_id=u.id WHERE e.id=$id ;";
    $entrada= mysqli_query($conexion,$sql);

    $result= null;

    if($entrada && mysqli_num_rows($entrada)==1){
        $result= mysqli_fetch_assoc($entrada);
    }
    
    return $result;
}

function buscarEntradas($conexion, $busqueda){

    $sql="SELECT e.*,c.nombre AS 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id=c.id WHERE e.titulo LIKE '%$busqueda%' OR e.descripcion LIKE '%$busqueda%';";
    $entradas= mysqli_query($conexion,$sql);

    $result= array();

    if($entradas && mysqli_num_rows($entradas)>=1){
        $result= $entradas;
    }
    
    return $result;
}