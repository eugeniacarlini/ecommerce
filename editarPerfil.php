<?php
require_once("soporte.php");
$usuarioActivo = getUsuarioLogueado();

$dirname = "uploads/avatars/";
$products = glob($dirname . "*.*");

// if (!$auth->estaLogueado())
// {
// header("location:index.php");exit;
// }
// if (!isset($_GET["idUser"]))
// {
// header("location:index.php");exit;
//}
$usuarioAVer = $repositorio->getUserRepository()->getUsuarioById($usuarioActivo->getId());

$imagen = glob($dirname . "*.*");
?>

<?php
	// $usuarioLogueado = getUsuarioLogueado();
	//
	// $pNombre = $usuarioLogueado["nombre"];
	// $pApellido = $usuarioLogueado["apellido"];
	// $pMail = $usuarioLogueado["mail"];

	// if ($usuarioLogueado["id"] != $_GET["idUser"]) {
	// 	enviarAFelicidad();
	// }
?>

<html>
<head>
	<title>Perfil</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<?php include("includes/headerLogueado.php"); ?>
  <h1>Editar mi perfil</h1>
	<?php if (is_null($usuario)) { ?>
		El usuario no existe
	<?php } else { ?>
    <form action="" method="POST" enctype="multipart/form-data">
			<?php if (!empty($errores)) { ?>
				<div style="width:300px;background-color:red">
					<ul>
						<?php foreach ($errores as $error) { ?>
							<li>
								<?php echo $error ?>
							</li>
						<?php } ?>
					</ul>
				</div>
			<?php } ?>
			<div>
				<p>
					Avatar
				</p>
				<img class="img-rounded" src="<?php echo $imagen[0] ?>" alt="" />
				<input type="file" id="imagen" name="imagen" />
				<button type="button" name="button" class="btn btn-success">Cargar</button>
			</div>
			<div>
				<label for="nombre">Nombre:</label>
				<input id="nombre" type="text" name="nombre" value="<?php echo $usuarioAVer->getNombre() ?>" />
			</div>
			<div>
				<label for="apellido">Apellido:</label>
				<input id="apellido" type="text" name="apellido" value="<?php echo $usuarioAVer->getApellido() ?>" />
			</div>
			<div>
				<label for="mail">Mail:</label>
				<input id="mail" type="text" name="mail" value="<?php echo $usuarioAVer->getMail() ?>" />
			</div>
			<!-- <div>
				<label for="pass">Contrase&ntilde;a:</label>
				<input id="pass" type="password" name="pass" />
			</div>
			<div>
				<label for="cpass">Confirmar Contrase&ntilde;a:</label>
				<input id="cpass" type="password" name="cpass" />
			</div> -->
			<div>
				<label for="sexo">Sexo:</label>
				<select name="sexo" id="sexo">
					<option value="<?php echo $usuarioAVer->getSexo() ?>"><?php echo $usuarioAVer->getSexo(); ?></option>
				</select>
			</div>
			<div class="form-group">
				<button type="button" name="button" class="btn btn-success">Guardar</button>
				<input id="submit-product" type="submit" name="submit-product" value="Guardar cambios" />
			</div>
		</form>
	<?php } ?>
	<?php if (!empty($files)) { ?>
		<img src="<?php echo $files[0] ?>"/>
	<?php } ?>
</body>
</html>
