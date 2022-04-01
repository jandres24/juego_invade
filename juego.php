<?php
    session_start();
    
    if (!isset($_SESSION ['usuario'])) {
			
        echo '
        <script>
            alert ("Debes iniciar sesion");
            window.location = "../PRUEBA2/index.php";
        </script>
        ';    
        session_destroy();
        die();        
    }
    //session_destroy();*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>juego</title>
    <link rel="stylesheet" href="css/boton.css">
</head>
<body>
    <a href="../PRUEBA2/juego/invader.html" class="btn-neon">
        <span id="span1"></span>
        <span id="span2"></span>
        <span id="span3"></span>
        <span id="span4"></span>
        JUGAR
    </a>
    <a href="cerrar_sesion.php" class="btn-neon">
        <span id="span1"></span>
        <span id="span2"></span>
        <span id="span3"></span>
        <span id="span4"></span>
        CERRAR
    </a>
</body>
</html>