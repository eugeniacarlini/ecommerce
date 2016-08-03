<?php
	require_once("soporte.php");

	if (!estaLogueado())
	{
		enviarAFelicidad();
	}
	if (!isset($_GET["idUser"]))
	{
		enviarAFelicidad();
	}
	$usuarioLogueado = getUsuarioLogueado();

	if ($usuarioLogueado["id"] != $_GET["idUser"]) {
		enviarAFelicidad();
	}
?>
<html>
<head>
	<title>Perfil</title>
</head>
<body>
	<h1>Editar Usuario</h1>
	<?php include("header.php"); ?>
	<?php if (is_null($usuarioAVer)) { ?>
		El usuario no existe
	<?php } else { ?>
		div class="container">
		  <div class="row">
		      <div class="col-md-offset-3 col-md-5">
		        <h1>Crear mi cuenta</h1>
		        <form class="register-form" action="" method="post" enctype="multipart/form-data">
		          <?php if (!empty($errores)) { ?>
		            <div class="alert alert-danger" role="alert">
		              <ul>
		                <?php foreach ($errores as $error) { ?>
		                  <li>
		                    <?php echo $error ?>
		                  </li>
		                <?php } ?>
		              </ul>
		            </div>
		          <?php } ?>
		          <div class="form-group">
		            <label for="nombre">Nombre</label>
		            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $pNombre ?>" />
		          </div>
		          <div class="form-group">
		            <label for="apellido">Apellido</label>
		            <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $pApellido ?>" />
		          </div>
		          <div class="form-group">
		            <label for="mail">Email</label>
		            <input type="email" class="form-control" id="mail" name="mail" value="<?php echo $pMail ?>" />
		          </div>
		          <div class="form-group">
		            <label for="password">Contraseña</label>
		            <input type="password" class="form-control" id="password" name="password" />
		          </div>
		          <div class="form-group">
		            <label for="cpass">Confirmar contraseña</label>
		            <input type="password" class="form-control" id="cpass" name="cpass" />
		          </div>
		          <div class="form-group">
		            <label for="sexo">Sexo</label>
		            <select class="form-control" name="sexo" id="sexo">
									<option value="Elegí un sexo"></option>
		              <?php foreach ($sexos as $sexo) { ?>
		    						<?php if (isset($_POST["sexo"]) && $sexo == $_POST["sexo"]) { ?>
		    							<option selected value="<?php echo $sexo?>"><?php echo $sexo?></option>
		    						<?php } else { ?>
		    							<option value="<?php echo $sexo?>"><?php echo $sexo?></option>
		    						<?php } ?>
		    					<?php } ?>
		            </select>
		          </div>
		          <div class="form-group">
		            <label for="imagen">Avatar</label>
		            <input type="file" id="imagen" name="imagen">
		          </div>
		          <input type="submit" class="btn btn-success btn-block" name="registrarme" value="Registrarme" />
		        </form>
		      </div>
		    </div>
		</div>
	<?php } ?>
	<?php if (!empty($files)) { ?>
		<img src="<?php echo $files[0] ?>"/>
	<?php } ?>
</body>
</html>
