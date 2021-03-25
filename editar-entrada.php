<?php
    require_once 'includes/redireccion.php';
    require_once 'includes/cabecera.php';
    require_once 'includes/lateral.php';
    if(!isset($_GET['id'])){
        header('Location: index.php');
    }

    $usuario_id= $_SESSION['usuario']['id'];
    $entrada_id= $_GET['id'];
    $entrada= conseguirEntrada($db,$entrada_id);

    // var_dump($entrada);
    // var_dump();
    // die();

    if(empty($entrada)){
        header('Location: index.php');
    }
?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1>Actualiza Entrada</h1><br>

    <form action="actualizar-entrada.php?id=<?=$entrada['id'] ?>" method="POST">
        <label for="titulo">Título de la Entrada:</label>
        <?php echo isset($_SESSION['errores']['entradas']) ? mostrarError($_SESSION['errores']['entradas'],'titulo') : '';?>
        <input type="text" name="titulo" value="<?=$entrada['titulo'] ?> " > <br>

        <label for="categoria">Categoría de la Entrada</label>
        <?php echo isset($_SESSION['errores']['entradas']) ? mostrarError($_SESSION['errores']['entradas'],'categoria') : '';?>
        <select name="categoria" >
            <?php 
                $categorias= conseguirCategorias($db);
                if(!empty($categorias)):
                while($categoria = mysqli_fetch_assoc($categorias)):
            ?>
                <option value="<?=$categoria['id'] ?>"  <?=$entrada['categoria_id']==$categoria['id'] ? 'selected': '' ?> >
                    <?=$categoria['nombre'] ?>
                </option>
            <?php 
                endwhile;
                endif;
            ?>
        </select><br><br>

        <label for="descripcion">Contenido</label>
        <?php echo isset($_SESSION['errores']['entradas']) ? mostrarError($_SESSION['errores']['entradas'],'descripcion') : '';?>
        <textarea 
            name="descripcion" 
            cols="69" 
            rows="10"
        ><?=$entrada['descripcion'] ?></textarea><br><br>

        <input class="boton" type="submit" value="Actualizar Entrada">
    </form>
    <?php borrarError()?>
</div>

<!-- PIE DE PÁGINA -->
<?php require_once './includes/footer.php';?>