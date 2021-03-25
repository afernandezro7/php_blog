
<!-- CABECERA -->
<?php require_once './includes/cabecera.php';?>
    
<!-- SIDEBAR -->
<?php require_once './includes/lateral.php';?>


<!-- CAJA PRINCIPAL -->
<div id="principal">
    <?php
        $categoria=conseguirPorID($db, (int)$_GET['id']);
        if(!isset($categoria['nombre'])){
            header('Location: index.php');
        }
    ?>
    <h1>Entradas de la categoría <?=$categoria['nombre'] ?></h1>
    <?php  
        $entradas= conseguirEntradasXid($db,(int)$_GET['id']); 
        if(!empty($entradas)):
        while($entrada = mysqli_fetch_assoc($entradas)):
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
            <h2>No hay artículos en esta Categoría aún.</h2>      
        </article>
    <?php 
        endif;
    ?>

</div>

<!-- PIE DE PÁGINA -->
<?php require_once './includes/footer.php';?>


