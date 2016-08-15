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

<div class="col-md-12 header-hidden"></div>

<div class="container">
  <div class="row">

		<div class="col-md-3">
			<ul class="nav nav-pills nav-stacked">
				<li class="active"><a data-toggle="pill" href="#perfil">Perfil</a></li>
				<li><a data-toggle="pill" href="#publicaciones">Publicaciones</a></li>
			</ul>
		</div>

		<div class="col-md-9">
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
						<p><?php echo $usuarioPerfil->getNombre() ?></p>
						<p><?php echo $usuarioPerfil->getApellido() ?></p>
						<p><?php echo $usuarioPerfil->getMail() ?></p>
						<a href="index.php" title="Volver" class="btn btn-default">Volver</a>
						<a href="editarPerfil.php" title="Editar perfil" class="btn btn-success">Editar perfil</a>
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

			</div>
		</div>
	</div>

  </div>
</div>


<?php include("includes/footer.php"); ?>
