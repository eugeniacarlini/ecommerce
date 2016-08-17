<?php
require_once 'soporte.php';
  $usuarioActivo = getUsuarioLogueado();
	$repositorio->getUserRepository()->borrarUsuario($usuarioActivo->getId());
	$repositorio->getUserRepository()->borrarProductosUsuario($usuarioActivo->getId());

  $auth->logout();

  header("location:index.php");exit;



 ?>
