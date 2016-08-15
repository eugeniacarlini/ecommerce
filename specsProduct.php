<?php
	require_once('soporte.php');
  // require_once("clases/producto.php");
  // require_once("clases/productMySQLRepository.php");
	// require_once('clases/followerMYSQLrepository.php');
	// require_once('clases/follower.php');


	if (isset($_POST["follow"])) {
		$follower = new Follower($_POST);
		$repositorio->getFollowRepository()->guardarFollower($follower);
	}
  if(isset($_POST["unfollow"])) {
		$idFollowing = $miProducto->getIdUsuario();
		$repositorio->getFollowRepository()->removeFriend($idFollowing);

	}
	$miProducto= $repositorio->getProductRepository()->getProductoById($_GET["id"]);

	$idFollowing = $miProducto->getIdUsuario();
	$seguidores= $repositorio->getFollowRepository()->mostrarFollower($idFollowing);

	$diseñado = $repositorio->getUserRepository()->getUsuarioById($miProducto->getIdUsuario());


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
        <div class="col-xs-12 col-sm-6 col-md-6">
					<div class="product-image">
						<img src="<?php echo $miProducto->getURLImagen() ?>" />
					</div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
					<div class="product-description">
            <h1 class="title">
							<?php echo $miProducto->getTitulo() ?>
						</h1>
						<h3 class="description">Diseñado por
							<a href="#perfil-usuario"><?php echo '@' . $diseñado->getNombre() ?></a>
						</h3>
            <h5 class="price">
            	<?php echo '$' . $miProducto->getPrecio() . ',00' ?>
            </h5>

            <button type="button" class="btn btn-success btn-lg">Comprar</button>

						<form action="" method="post">
							<input type="hidden" class="form-control" id="id_usuario" name="id_follower" value="<?php echo $usuarioActivo->getId()?>" />
							<input type="hidden" name="id_following" value="<?php echo $miProducto->getIdUsuario()?>">
							<input type="submit" name="follow" value="Follow">

						</form>
						<form class="" action="#" method="post">
							<input type="hidden" name="unfollow" value="<?php echo $idFollowing  ?>">
							<button type="submit" name="unfollow">dejar de seguir</button>
						</form>
					</div>
        </div>
      </div>
    </div>
  </div>

	<div id="perfil-usuario">
		<div class="product-row">
			<div class="col-md-12">

				<div class="row padding-row">
					<div class="col-md-3 text-center">
						<div class="user-data-profile">
							<img class="img-rounded" src="<?php echo $usuarioAVer->getURLImagen() ?>" alt="" />
							<?php
							$diseñado=$repositorio->getUserRepository()->getUsuarioById($miProducto->getIdUsuario());
 							?>
							<h3>@<?php echo $diseñado->getNombre() ?></h3>
							<button type="button" class="btn btn-success btn-block">Seguir</button>
							<ul id="following">
								<li><a href="#"><h3><?php echo $seguidores["total"]; ?></h3>Seguidores</a></li>
								<li><a href="#"><h3>53</h3>Siguiendo</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-9">
						<div class="user-products">
							<h1>Productos del usuario</h1>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

</div>

<?php include('includes/footer.php'); ?>
