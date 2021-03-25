<?php require_once 'conexion.php';?>
<?php require_once 'includes/helpers.php';?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRS-Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css"/>

</head>
<body>
    
    <!-- CABECERA -->
    <header id="cabecera">
        <!-- LOGO -->
        <div id="logo">
            <a href="index.php">
                <h1>Blog de Excelencias</h1>
            </a>
        </div>
        

        <!-- MENU -->
        <nav id="menu">
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>

                <?php 
                    $categorias= conseguirCategorias($db);
                    if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):
                ?>
                    <li>
                        <a href="categoria.php?id=<?=$categoria['id'] ?>">
                            <?=$categoria['nombre'] ?>
                        </a>
                    </li>
                <?php 
                    endwhile;
                    endif;
                ?>
                
                <li>
                    <a href="index.php">Sobre mi</a>
                </li>
                <li>
                    <a href="index.php">Contacto</a>
                </li>

            </ul>
        </nav>

        <div class="clearfix"></div>
    </header>
    <div id="contenedor">





