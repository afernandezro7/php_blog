<?php
    require_once 'includes/redireccion.php';
    require_once 'includes/cabecera.php';
    require_once 'includes/lateral.php';
?>


<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1>Crear categorías</h1><br>
    <p>Añade nuevas categorías al blog para que los usuarios puedan 
        usarlas al crear sus entradas.
    </p><br>
    <!-- MOSTRAR ERRORES -->
    <?php 
            
        if(isset($_SESSION['errores']['categoria'])){
            echo "<div class='alerta alerta-error'>";
            echo $_SESSION['errores']['categoria']['nombre'];
            echo "</div>";  
        }; 
    ?>
    <form action="guardar-categoria.php" method="POST">
        <label for="nombre">Nombre de la Categoría:</label>
        <input type="text" name="nombre">
        <input class="boton" type="submit" value="Crear Categoria">
    </form>
    <?php borrarError()?>
</div>

<!-- PIE DE PÁGINA -->
<?php require_once './includes/footer.php';?>

