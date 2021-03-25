<?php
    require_once 'includes/redireccion.php';
    require_once 'includes/cabecera.php';
    require_once 'includes/lateral.php';
?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1>Crear Entrada</h1><br>
    <p>Añade nuevas Entradas al blog para que los usuarios puedan 
        leerlas y disfrutar de nuestro contenido.
    </p><br>
    <form action="guardar-entrada.php" method="POST">
        <label for="titulo">Título de la Entrada:</label>
        <?php echo isset($_SESSION['errores']['entradas']) ? mostrarError($_SESSION['errores']['entradas'],'titulo') : '';?>
        <input type="text" name="titulo"> <br>

        <label for="categoria">Categoría de la Entrada</label>
        <?php echo isset($_SESSION['errores']['entradas']) ? mostrarError($_SESSION['errores']['entradas'],'categoria') : '';?>
        <select name="categoria">
            <?php 
                $categorias= conseguirCategorias($db);
                if(!empty($categorias)):
                while($categoria = mysqli_fetch_assoc($categorias)):
            ?>
                <option value="<?=$categoria['id'] ?>">
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
        ></textarea><br><br>

        <input class="boton" type="submit" value="Crear Entrada">
    </form>
    <?php borrarError()?>
</div>

<!-- PIE DE PÁGINA -->
<?php require_once './includes/footer.php';?>