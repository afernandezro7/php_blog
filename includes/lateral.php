<aside id="sidebar">
    <div id="buscador" class="bloque">
        <h3>Buscar</h3>
        
        <form action="buscar.php" method="POST">
            <input type="search" name="busqueda">      
            <button class="buscador" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
   
    <?php if(isset($_SESSION['usuario'])): ?>
        <div id="usuario-logueado" class="bloque">
            <h3>Bienvenido, 
                <!-- BOTONES -->
                <br>
                <?php echo "<h4>" . $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidos'] . "</h4>"?>
                <a href="crear-entrada.php" class="boton boton-verde boton-icon"><i class="fas fa-newspaper"></i></a>
                <a href="crear-categoria.php" class="boton boton-icon"><i class="fas fa-bars"></i></a>
                <a href="mis-datos.php" class="boton boton-naranja boton-icon"><i class="fas fa-user-edit"></i></a>
                <a href="cerrar.php" class="boton boton-rojo boton-icon"><i class="fas fa-sign-out-alt"></i></a>
            </h3>

            
        </div>  
    <?php else: ?>
        <div id="login" class="bloque">
            <h3>Identificate</h3>
            <?php if(isset($_SESSION['error_login'])): ?>
                <div class="alerta alerta-error">
                    <?php echo $_SESSION['error_login']?>
                </div>
            <?php endif;?>
    
            <form action="login.php" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email">
                <label for="password">Contraseña</label>
                <input type="password" name="password">          
                <input type="submit" value="Entrar">
            </form>
        </div>
        <div id="register" class="bloque">
    
            <!-- <?php if(isset($_SESSION['errores'])){
                var_dump($_SESSION['errores']);
            }?> -->
    
            <!-- MOSTRAR ERRORES -->
            <?php 
            
                if(isset($_SESSION['completado'])){
                    echo "<div class='alerta alerta-exito'>";
                    echo $_SESSION['completado'];
                    echo "</div>";          
                }elseif(isset($_SESSION['errores']['general'])){
                    echo "<div class='alerta alerta-error'>";
                    echo $_SESSION['errores']['general'];
                    echo "</div>";  
                }; 
            ?>
            
    
            <h3>Registrate</h3>
            <form action="registro.php" method="POST">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'nombre') : '';?>
                
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'apellidos') : '';?>
                
                <label for="email">Email</label>
                <input type="text" name="email">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'email') : '';?>
    
                <label for="password">Contraseña</label>
                <input type="password" name="password">  
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'password') : '';?>
    
                <input type="submit" name="submit" value="Registrar">
            </form>
            <?php borrarError()?>
        </div>
    <?php endif;?>

</aside>