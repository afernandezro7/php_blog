
<!-- CABECERA -->
<?php require_once './includes/cabecera.php';?>
    
<!-- SIDEBAR -->
<?php require_once './includes/lateral.php';?>

<?php 
    if(!isset($_POST['busqueda'])){
        header('Location: index.php');
    }

    $busqueda= buscarEntradas($db, $_POST['busqueda']); 

?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1>Resultado de la búsqueda->"<?=$_POST['busqueda'] ?>"</h1>

    <?php  
        if(!empty($busqueda)):
        while($entrada = mysqli_fetch_assoc($busqueda)):
    ?>
        <article class="entrada">
            <a href="entrada.php?id=<?=$entrada['id']?>">
                <h2><?=$entrada['titulo'] ?></h2>
                <span class="fecha"><?=$entrada['categoria'] . ' | ' . $entrada['fecha'] ?></span>
                <p><?=substr($entrada['descripcion'],0,180) ?>...</p>
            </a>
        </article>
    <?php 
        endwhile;
        else:
    ?>
        <article class="entrada">
            <h2>No hay Coincidencias.</h2>      
        </article>
    <?php 
        endif;
    ?>

</div>

<!-- PIE DE PÁGINA -->
<?php require_once './includes/footer.php';?>


