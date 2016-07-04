<?php
	require_once("soporte.php");

	if (!estaLogueado())
	{
		enviarAFelicidad();
	}

	$usuario = getUsuarioLogueado();

	// if (!isset($_GET["idUser"]))
	// {
	// 	enviarAFelicidad();
	// }
	// $usuarioAVer = getUsuarioById($_GET["idUser"]);
	$files = glob("uploads/avatars/" . $usuario["id"] . ".{png,jpg,jpeg,gif,bmp,svg}", GLOB_BRACE);
	unset($usuario["password"]);
	unset($usuario["id"]);
?>
<html>
<head>
	<link rel="stylesheet" href="css/styles.css" media="screen">
</head>
<body>
	<?php include("includes/headerLogueado.php"); ?>
	<a href="editarPerfil.php" title="Editar mi perfil">Editar mi perfil</a>
	<?php if (is_null($usuario)) { ?>
		El usuario no existe
	<?php } else { ?>
		<ul>
			<?php foreach ($usuario as $key => $value) { ?>
				<li>
				<?php echo $key ?>: <?php echo $value ?><br />
				</li>
			<?php } ?>
		</ul>
	<?php } ?>
	<?php if (!empty($files)) { ?>
		<img src="<?php echo $files[0] ?>"/>
	<?php } ?>
</body>
</html>
