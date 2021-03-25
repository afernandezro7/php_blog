<?php
    require_once 'includes/redireccion.php';
    require_once 'includes/cabecera.php';
    require_once 'includes/lateral.php';
?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1>Mis Datos</h1>

    <!-- MOSTRAR ERRORES -->
    <?php 
            
        if(isset($_SESSION['completado_misdatos'])){
            echo "<div class='alerta alerta-exito'>";
            echo $_SESSION['completado_misdatos'];
            echo "</div>";          
        }elseif(isset($_SESSION['errores_misdatos']['error_actualizacion'])){
            echo "<div class='alerta alerta-error'>";
            echo $_SESSION['errores_misdatos']['error_actualizacion'];
            echo "</div>";  
        }; 
    ?>

    <form action="actualizar-usuario.php" method="POST">
        <label for="nombre">Nombre</label>
        <?php echo isset($_SESSION['errores_misdatos']) ? mostrarError($_SESSION['errores_misdatos'],'nombre') : '';?>
        <input type="text" name="nombre" value="<?=$_SESSION['usuario']['nombre'] ;?>" >
        
        <label for="apellidos">Apellidos</label>
        <?php echo isset($_SESSION['errores_misdatos']) ? mostrarError($_SESSION['errores_misdatos'],'apellidos') : '';?>
        <input type="text" name="apellidos" value="<?=$_SESSION['usuario']['apellidos'] ;?>" >
        
        <label for="email">Email</label>
        <?php echo isset($_SESSION['errores_misdatos']) ? mostrarError($_SESSION['errores_misdatos'],'email') : '';?>
        <input type="text" name="email" value="<?=$_SESSION['usuario']['email'] ;?>" >
        
        <input type="submit" name="submit" value="Actualizar">
    </form>
    <?php borrarError()?>
</div>

<!-- PIE DE PÁGINA -->
<?php require_once './includes/footer.php';?>