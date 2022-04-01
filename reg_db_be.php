<?php 

	include("con_db_be.php");

		if (isset($_POST['register'])){

			if (strlen($_POST['nombre_completo']) >= 1 && strlen($_POST['correo']) >= 1 && strlen($_POST['usuario']) >= 1 && strlen($_POST['contrasena']) >= 1) {

				$nombre_completo = trim($_POST['nombre_completo']);
				$correo = trim($_POST['correo']);
				$contrasena = trim($_POST['contrasena']);
				$usuario = trim($_POST['usuario']);
				$contrasena = hash('sha512', $contrasena);//encriptar contraseña
				$fechareg = date("d/m/y");//fecha registro
				/*$consulta = "INSERT INTO datos(nombre, email, fecha_reg) VALUES ('$name','$email','$fechareg')";*/
				$consulta = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena, fecha_reg) VALUES ('$nombre_completo','$correo', '$usuario', '$contrasena', '$fechareg')";

				//verificar ke no se repitan datos
				$verificar_correo = mysqli_query($conex,"SELECT * FROM  usuarios WHERE correo = '$correo' ");
				if (mysqli_num_rows($verificar_correo) > 0){
					echo '
						<script>
							alert ("Este correo ya existe");
							window.location = "index.php";
						</script>
					';exit();
				}

				$verificar_usuario = mysqli_query($conex,"SELECT * FROM  usuarios WHERE usuario = '$usuario' ");
				if (mysqli_num_rows($verificar_usuario) > 0){
					echo '
						<script>
						alert ("Este usuario ya existe");
						window.location = "index.php";
						</script>
					';exit();
				}
				
				$resultado = mysqli_query($conex,$consulta);
				if ($resultado) {//registro exitoso
					echo '
						<script>
							alert ("Registrado Exitosamente");
							window.location = "index.php";
						</script>
					';exit ();

				}else{
					echo '
					<script>
						alert ("Ha ocurrido un Error");
						window.location = "index.php";
					</script>
					';exit();
				}

				}else {//completar campos
					echo '
						<script>
							alert ("Completa los Campos");
							window.location = "index.php";
						</script>
					';exit();
				}
			}
	

?>