<?php
	require_once("soporte.php");
	$usuarioActivo = getUsuarioLogueado();
	$usuarioPerfil = $repositorio->getUserRepository()->getUsuarioById($usuarioActivo->getId());
	$productosUsuario = $repositorio->getProductRepository()->getProductsOfUser($usuarioActivo->getId());

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

<?php

if ($_POST)
{
	$errores = $validar->validarEditarUsuario($_POST);

	if (empty($errores))
	{
		// Aca estoy recuperando el usuario pero desde la base de datos, no como objeto de tipo usuario.
		//$usuario = $repositorio->getUserRepository()->getUsuarioById($usuarioActivo->getId());

		$usuarioAVer->setNombre($_POST['nombre']);
		$usuarioAVer->setApellido($_POST['apellido']);
		$usuarioAVer->setSexo($_POST['sexo']);
		$usuarioAVer->setMail($_POST['mail']);

		// Editar datos del perfil del usuario en la BDD
		$repositorio->getUserRepository()->guardarUsuario($usuarioAVer);
		$usuarioAVer->guardarImagen($usuarioAVer);
	}
}

?>

<div class="col-md-12 header-hidden"></div>

<div class="container">
  <div class="row">

		<div class="col-xs-12 col-sm-3 col-md-3">
			<ul class="nav nav-pills nav-stacked">
				<li class="active">
					<a data-toggle="pill" href="#perfil">
						<i class="fa fa-user fa-lg" aria-hidden="true"></i>
						Perfil</a>
				</li>
				<li>
					<a data-toggle="pill" href="#publicaciones">
						<i class="fa fa-eye fa-lg" aria-hidden="true"></i>
						Mis publicaciones</a>
				</li>
				<li>
					<a data-toggle="pill" href="#editar-perfil">
						<i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
						Editar perfil</a>
				</li>
			</ul>
		</div>

		<div class="col-xs-12 col-sm-9 col-md-9">
			<div class="tab-content">
				<div id="perfil" class="tab-pane fade in active">
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
						<h1 class="name-user"><?php echo $usuarioPerfil->getNombre() ?></h1>
						<h3><?php echo $usuarioPerfil->getMail() ?></h3>
		      </form>
				</div>

				<div id="publicaciones" class="tab-pane fade">
					<?php if (empty($productosUsuario)): ?>
							<div class="product-row">
								<p>No se encontró ningún producto en la categoría <?php echo $_GET['id'] ?>.</p>
							</div>
						<?php else: ?>
						<?php foreach ($productosUsuario as $producto) { ?>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<article class="thumbnail text-center">
									<li>
										<a href="specsProduct.php?id=<?php echo $producto->getID() ?>">
											<img src="<?php echo $producto->getURLimagen() ?>" />
											<div class="caption">
												<h2><?php echo $producto->getTitulo() ?></h2>
												<h4>Diseñado por<span><?php echo '@' . $usuarioAVer->getNombre() ?></span></h4>
												<h5>$<?php echo $producto->getPrecio() ?></h5>
											</div>
										</a>
									</li>
								</article>
							</div>
						<?php } ?>
					<?php endif; ?>
				</div>

				<div id="editar-perfil" class="tab-pane fade">

						<form class="register-form" action="" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id-usuario-hidden" value="<?php echo $usuarioAVer->getId() ?>">
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
							<div class="row">
								<div class="col-xs-12 col-sm-7 col-md-7 col-sm-pull-0">
									<div class="form-group">
										<label for="nombre">Nombre</label>
										<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuarioAVer->getNombre() ?>" />
									</div>
									<div class="form-group">
										<label for="apellido">Apellido</label>
										<input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $usuarioAVer->getApellido() ?>" />
									</div>
									<div class="form-group">
										<label for="mail">Email</label>
										<input type="email" class="form-control" id="mail" name="mail" value="<?php echo $usuarioAVer->getMail() ?>" />
									</div>
									<div class="form-group">
										<label for="password">Contraseña</label>
										<input type="password" class="form-control" id="password" name="password" />
									</div>
									<div class="form-group">
										<label for="sexo">Sexo</label>
										<select class="form-control" name="sexo" id="sexo">
											<option value="<?php echo $usuarioAVer->getSexo() ?>"><?php echo $usuarioAVer->getSexo() ?></option>
										</select>
									</div>
									<div class="form-group">
										<input type="submit" name="guardar-cambios" value="Guardar cambios" class="btn btn-success">
										<!-- <input type="submit" name="borrar-perfil" value="Borrar cuenta" class="btn btn-danger pull-right"> -->
									</div>
								</div>
								<div class="col-xs-12 col-sm-5 col-md-5">
									<div class="form-group text-center">
										<img class="img-rounded" src="<?php echo $usuarioAVer->getURLImagen() ?>" alt="" />
										<label class="btn btn-default">
											Elige una imagen<input type="file" id="imagen" name="imagen" style="display: none;">
										</label>
									</div>
								</div>
							</div>
						</form>
				</div>

			</div>
		</div>
	</div>
  </div>
</div>

<?php include("includes/footer.php"); ?>
