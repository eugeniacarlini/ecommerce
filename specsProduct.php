<?php
	require_once('soporte.php');

	$miProducto= $repositorio->getProductRepository()->getProductoById($_GET["id"]);
	$idFollowing = $miProducto->getIdUsuario();
	$seguidores= $repositorio->getFollowRepository()->mostrarFollower($idFollowing);
	$diseñado = $repositorio->getUserRepository()->getUsuarioById($miProducto->getIdUsuario());
	$productosUsuario = $repositorio->getProductRepository()->getProductsOfUser($miProducto->getIdUsuario());

	if (isset($_POST["follow"])) {
		$follower = new Follower($_POST);
		$repositorio->getFollowRepository()->guardarFollower($follower);
	}

  if(isset($_POST["unfollow"])) {
		$idFollowing = $miProducto->getIdUsuario();
		$repositorio->getFollowRepository()->removeFriend($idFollowing);
	}

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

    <div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
      <div class="product-row">
        <div class="col-xs-12 col-sm-12 col-md-6">
					<div class="product-image text-center">
						<img src="<?php echo $miProducto->getURLImagen() ?>" />
					</div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
					<div class="product-description">
            <h1 class="title">
							<?php echo $miProducto->getTitulo() ?>
						</h1>
            <h2 class="price">
            	<?php echo '$' . $miProducto->getPrecio() . ',00' ?>
<<<<<<< Updated upstream
            </h2>
						<hr />
						<h5 class="information">Descripción:</h5>
						<p><?php echo $miProducto->getDescripcion() ?></p>
						<hr />
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="cantidad">Cantidad:</label>
									<select class="form-control" id="cantidad">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="cantidad">Talle:</label>
									<select class="form-control" id="cantidad">
										<option>S</option>
										<option>M</option>
										<option>L</option>
										<option>XL</option>
									</select>
								</div>
							</div>
						</div>
						<hr />
						<h5 class="description">Diseñado por
							<a href="#perfil-usuario" data-toggle="tooltip" data-placement="right" title="Ver perfil del vendedor"><?php echo '@' . $diseñado->getNombre() ?></a>
						</h5>
						<hr />
            <button type="button" class="btn btn-success">Comprar</button>
=======
            </h5>
						<form class="" action="" method="post">
							<input type="text" name="id" value="<?php echo $miProducto->getID()?>">

							<input type="text" name="precio" value="<?php echo $miProducto->getPrecio()?>">
            <button type="submit" name="comprar" class="btn btn-success btn-lg">Comprar</button>
					</form>

						<form action="" method="post">
							<input type="hidden" class="form-control" id="id_usuario" name="id_follower" value="<?php echo $usuarioActivo->getId()?>" />
							<input type="hidden" name="id_following" value="<?php echo $miProducto->getIdUsuario()?>">
							<input type="submit" name="follow" value="Follow">

						</form>
						<form class="" action="#" method="post">
							<input type="hidden" name="unfollow" value="<?php echo $idFollowing  ?>">
							<button type="submit" name="unfollow">dejar de seguir</button>
						</form>
>>>>>>> Stashed changes
					</div>
        </div>
      </div>
    </div>
  </div>

	<div class="row">
			<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
				<div id="perfil-usuario">
					<div class="product-row">

					<div class="col-md-3 text-center">
						<div class="user-data-profile">
							<?php
								$diseñado = $repositorio->getUserRepository()->getUsuarioById($miProducto->getIdUsuario());
							?>
							<img class="img-rounded" src="<?php echo $usuarioAVer->getURLImagen() ?>" alt="" />
							<h3>@<?php echo $diseñado->getNombre() ?></h3>
<<<<<<< Updated upstream
							<form class="follow-user" method="post">
								<input type="hidden" class="form-control" id="id_usuario" name="id_follower" value="<?php echo $usuarioActivo->getId()?>" />
								<input type="hidden" name="id_following" value="<?php echo $miProducto->getIdUsuario()?>">
								<input id="follow" type="submit" name="follow" value="Seguir" class="btn btn-block btn-default show">
							</form>
							<form class="unfollow-user" method="post">
								<input type="hidden" name="unfollow" value="<?php echo $idFollowing  ?>">
								<input id="unfollow" type="submit" name="unfollow" value="Dejar de seguir" class="btn btn-block btn-success hidden">
							</form>
							<ul id="data-followers">
								<li><h3 class="h3"><?php echo $seguidores["total"]; ?></h3>Seguidores</li>
								<li><h3 class="h3">53</h3>Siguiendo</li>
=======
							<button type="button" class="btn btn-success btn-block">Seguir</button>
							<ul id="following">
								<li><a href="#"><h3><?php  echo $seguidores[0]; ?></h3>Seguidores</a></li>
								<li><a href="#"><h3>53</h3>Siguiendo</a></li>
>>>>>>> Stashed changes
							</ul>
						</div>
					</div>
				<!-- </div> -->

					<!-- <div class="product-row"> -->
					<div class="col-md-9">
						<div class="user-products">
							<h2>Publicaciones del usuario</h2>
							<div class="row">
							<?php foreach ($productosUsuario as $publicacion): ?>
								<div class="col-md-4">
									<article class="item thumbnail text-center">
										<a href="specsProduct.php?id=<?php echo $publicacion->getID() ?>	">
											<img class="product-item lazyOwl" src="<?php echo $publicacion->getURLimagen() ?>" alt="<?php echo $publicacion->getID() ?>">
											<div class="caption">
												<h3><?php echo $publicacion->getTitulo() ?></h3>
												<h4>Diseñado por<span><?php echo '@' . $diseñado->getNombre() ?></span></h4>
												<h5>$<?php echo $publicacion->getPrecio() ?></h5>
											</div>
										</a>
									</article>
								</div>
							<?php endforeach; ?>
						</div>
						</div>
					</div>

					</div>

		</div>
	</div>
	</div>
</div>

<?php include('includes/footer.php'); ?>
