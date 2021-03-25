<!-- CABECERA -->
<?php require_once './includes/cabecera.php';?>

<!-- SIDEBAR -->
<?php require_once './includes/lateral.php';?>

<?php
    $entrada=conseguirEntrada($db, (int)$_GET['id']);
    // var_dump(mysqli_error($db));
    // var_dump($entrada);
    // die();
    if(!isset($entrada['titulo'])){
        header('Location: index.php');
    }
?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1><?=$entrada['titulo'] ?></h1>
    <a href="categoria.php?id=<?=$entrada['categoria_id'] ?>">
        <h2><?=$entrada['categoria'] ?></h2>
    </a>
    <h4><?=$entrada['fecha'] ?> | <?=$entrada['usuario'] ?></h4>
    <p><?=$entrada['descripcion'] ?></p>           

    <?php if(isset($_SESSION['usuario']) && $entrada['usuario_id']==$_SESSION['usuario']['id']): ?>
        <div style="float: inline-end;">
            <a href="editar-entrada.php?id=<?=$entrada['id'] ?>" class="boton boton-verde boton-icon"><i class="fas fa-edit"></i></a>
            <a href="borrar-entrada.php?id=<?=$entrada['id'] ?>" class="boton boton-rojo boton-icon"><i class="fas fa-trash-alt"></i></a>   
        </div>
    <?php endif;?>
</div>

<!-- PIE DE PÁGINA -->
<?php require_once './includes/footer.php';?>