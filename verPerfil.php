<?php
	require_once("soporte.php");
	$usuarioActivo = getUsuarioLogueado();
	$usuarioPerfil = $repositorio->getUserRepository()->getUsuarioById($usuarioActivo->getId());

	$dirname = "uploads/avatars/";
	$imagen = glob($dirname . "*.*");

	if (estaLogueado())
	{
		include("includes/headerLogueado.php");
	}
	else
	{
		include("includes/headerNoLogueado.php");
	}
?>

<div class="col-md-12 header-hidden"></div>

<div class="container">
  <div class="row">
    <div class="col-md-offset-4 col-md-4">
      <h1>Mi perfil</h1>
      <form class="register-form text-center" action="" method="post" enctype="multipart/form-data">
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
				<img class="img-rounded center-block" src="<?php echo $usuarioPerfil->getURLImagen() ?>" alt="" />
				<p><?php echo $usuarioPerfil->getNombre() ?></p>
				<p><?php echo $usuarioPerfil->getApellido() ?></p>
				<p><?php echo $usuarioPerfil->getMail() ?></p>
				<a href="index.php" title="Volver" class="btn btn-default">Volver</a>
				<a href="editarPerfil.php" title="Editar perfil" class="btn btn-success">Editar perfil</a>
      </form>
    </div>
  </div>
</div>

<?php include("includes/footer.php"); ?>
