<?php
	require_once("soporte.php");

	$usuario = getUsuarioLogueado();

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
			  <li>
					<p>nombre:<?php echo $usuario->getNombre() ?>

				</li>

		</ul>
	<?php } ?>
	<?php if (!empty($files)) { ?>
		<img src="<?php 	var_dump($files[0]);exit;  ?>" />
	<?php } ?>
</body>
</html>
