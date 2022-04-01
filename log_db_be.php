<?php
    
    session_start();

    include("con_db_be.php");

    if (isset($_POST['inicio'])) {
			
        if (strlen($_POST['usuario']) >= 1 && strlen($_POST['contrasena']) >= 1) {
			
            $usuario = trim($_POST['usuario']);
			$contrasena = trim($_POST['contrasena']);
            $contrasena = hash('sha512', $contrasena);
				
            $validar_login = mysqli_query($conex,"SELECT * FROM  usuarios WHERE usuario = '$usuario' and contrasena= '$contrasena'");

            if (mysqli_num_rows($validar_login) > 0){
                $_SESSION ['usuario'] = $usuario;

                header ("location: ../PRUEBA2/juego.php");
                exit ();
            }else{        
                echo '
                    <script>
                    alert ("Este usuario no existe, por favor verifica los datos");
                    window.location = "index.php";
                    </script>
                ';exit ();    
            }
	    }
    }   
?>