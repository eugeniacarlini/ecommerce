<?php
	require_once('soporte.php');
  require_once("clases/producto.php");
  require_once("clases/productMySQLRepository.php");
	require_once('clases/followerMYSQLrepository.php');
	require_once('clases/follower.php');

	$usuarioActivo = getUsuarioLogueado();
	$usuarioAVer = $repositorio->getUserRepository()->getUsuarioById($usuarioActivo->getId());

	// $miProducto = $repositorio->getProductRepository()->getProductoById($_GET["id"]);
	// var_dump($miProducto);exit;

	$productoAFollowing = $repositorio->getFollowRepository()->getId_Follower($usuarioActivo->getId());
	var_dump($productoAFollowing);exit;
	// $productoAFollowing = $repositorio->getFollowRepository()->getId_Follower($follower);

	if ($_POST) {
		// $follower = new Follower($_POST);

		$productoAFollowing->setId_Follower($_POST);
		$productoAFollowing->setId_Following($_POST);

		$repositorio->getFollowRepository()->guardarFollower($usuarioAVer);
		var_dump($repositorio);exit;
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

<div class="container">
  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="row product-row padding-row">
        <div class="col-md-5">
					<div class="product-image">
						<img src="uploads/products/<?php echo $_GET['id'] . '.jpg' ?>" />
					</div>
        </div>
        <div class="col-md-7">
					<div class="product-description">
            <h1 class="title">
							<?php echo $miProducto->getTitulo().'!!' ?>
							Great Outdoors
						</h1>
						<h3 class="description">Diseñado por
							<a href="#perfil-usuario"><?php echo $miProducto->getIdUsuario() ?></a>
						</h3>
            <h5 class="price">
            	<?php echo $miProducto->getPrecio() ?>
            </h5>

            <button type="button" class="btn btn-success btn-lg">Comprar</button>

						<form action="" method="post">
							<input type="text" class="form-control" id="id_usuario" name="id_follower" value="<?php echo $usuarioActivo->getId()?>" />
							<input type="text" name="id_following" value="<?php echo $miProducto->getIdUsuario()?>">
							<input type="submit" name="name" value="Follow">
						</form>
												</div>
        </div>
      </div>
    </div>
  </div>

	<div id="perfil-usuario">
		<div class="row product-row">
			<div class="col-md-12">

				<div class="row padding-row">
					<div class="col-md-3 text-center">
						<div class="user-data-profile">
							<img class="img-rounded" src="img/euge.jpg" alt="Euge" />
							<h3><?php echo $miProducto ?></h3>
							<button type="button" class="btn btn-success btn-block">Seguir</button>
							<ul id="following">
								<li><a href="#"><h3>40</h3>Seguidores</a></li>
								<li><a href="#"><h3>53</h3>Siguiendo</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-9">
						<div class="user-products">
							<h1>Productos</h1>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

</div>

<?php include("includes/footer.php"); ?>
