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
		<form>
			<label for="">Falta el formulario</label>
		</form>
	<?php } ?>
	<?php if (!empty($files)) { ?>
		<img src="<?php echo $files[0] ?>"/>
	<?php } ?>
</body>
</html>
