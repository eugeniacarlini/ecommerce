<?php
require_once("soporte.php");

if (!$auth->estaLogueado())
{
header("location:index.php");exit;
}
if (!isset($_GET["idUser"]))
{
header("location:index.php");exit;
}
$usuarioAVer = $repositorio->getUserRepository()->getUsuarioById($_GET["idUser"]);
$files = glob("img/" . $usuarioAVer["id"] . ".{png,jpg,jpeg,gif,bmp,svg}", GLOB_BRACE);
?>
<html>
<head>
<title>Perfil</title>
</head>
<body>
<?php include("header.php"); ?>
<?php if (is_null($usuarioAVer)) { ?>
El usuario no existe
<?php } else { ?>
<ul>
		<li>
			Nombre: <?php echo $usuarioAVer->getNombre(); ?>
		</li>
		<li>
			Apellido: <?php echo $usuarioAVer->getApellido(); ?>
		</li>
		<li>
			Mail: <?php echo $usuarioAVer->getMail(); ?>
		</li>
		<li>
			Sexo: <?php echo $usuarioAVer->getSexo(); ?>
		</li>
</ul>
<?php } ?>
<?php if (!empty($files)) { ?>
<img src="<?php echo $files[0] ?>"/>
<?php } ?>
</body>
</html>


	$usuarioLogueado = getUsuarioLogueado();

	$pNombre = $usuarioLogueado["nombre"];
	$pApellido = $usuarioLogueado["apellido"];
	$pMail = $usuarioLogueado["mail"];

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
				<label for="nombre">Nombre:</label>
				<input id="nombre" type="text" name="nombre" value="<?php echo $pNombre ?>" />
			</div>
			<div>
				<label for="apellido">Apellido:</label>
				<input id="apellido" type="text" name="apellido" value="<?php echo $pApellido ?>" />
			</div>
			<div>
				<label for="mail">Mail:</label>
				<input id="mail" type="text" name="mail" value="<?php echo $pMail ?>" />
			</div>
			<div>
				<label for="pass">Contrase&ntilde;a:</label>
				<input id="pass" type="password" name="pass" />
			</div>
			<div>
				<label for="cpass">Confirmar Contrase&ntilde;a:</label>
				<input id="cpass" type="password" name="cpass" />
			</div>
			<div>
				<label for="sexo">Sexo:</label>
				<select name="sexo" id="sexo">
					<?php foreach ($sexos as $key => $sexo) { ?>
						<?php if (isset($_POST["sexo"]) && $key == $_POST["sexo"]) { ?>
							<option selected value="<?php echo $key?>"><?php echo $sexo?></option>
						<?php } else { ?>
							<option value="<?php echo $key?>"><?php echo $sexo?></option>
						<?php } ?>
					<?php } ?>
				</select>
			</div>
			<div>
				<label for="imagen">Avatar:</label>
				<input type="file" id="imagen" name="imagen" />
			</div>
			<div>
				<input id="submit-product" type="submit" name="submit-product" value="Enviar" />
			</div>
		</form>
	<?php } ?>
	<?php if (!empty($files)) { ?>
		<img src="<?php echo $files[0] ?>"/>
	<?php } ?>
</body>
</html>
