<?php
	require_once("soporte.php");
	require_once("clases/producto.php");

 	$dirname = "uploads/products/*";
	$products = glob("$dirname" . ".{jpg,png}", GLOB_BRACE);

	$todosLosProductos = $repositorio->getProductRepository()->getAllProducts();

	//$imgProducto = $repositorio->getProductRepository()->getURLImagen();

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

			<?php include('includes/menu-categorias.php'); ?>

					<div class="hidden-xs hidden-sm col-xs-12 col-sm-12 col-md-10 col-lg-10">
						<div id="demo">
							<div class="span12">
								<div id="owl-demo" class="owl-carousel">
									<div class="item">
										<img src="img/1.jpg" alt="Promoción 1">
									</div>
									<div class="item">
										<img src="img/2.jpg" alt="Promoción 2">
									</div>
									<div class="item">
										<img src="img/3.jpg" alt="Promoción 3">
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="row">
					<div class="hidden-xs hidden-sm col-md-2 col-lg-2"></div>

					<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
						<div class="col-md-12">
							<h1>Productos destacados</h1>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="hidden-xs hidden-sm col-md-2 col-lg-2"></div>

					<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
						<div class="col-md-12">
							<div class="product-row">
								<div id="products-highlights" class="owl-carousel owl-theme">
									<?php foreach ($todosLosProductos as $producto) { ?>
										<?php $diseñado = $repositorio->getUserRepository()->getUsuarioById($producto->getIdUsuario()) ?>
										<article class="item thumbnail text-center">
											<a href="specsProduct.php?id=<?php echo $producto->getID() ?>	">
												<img class="product-item lazyOwl" data-src="<?php echo $producto->getURLimagen() ?>" alt="<?php echo $producto->getID() ?>">
												<div class="caption">
													<h3><?php echo $producto->getTitulo() ?></h3>
													<h4><span><?php echo '@' . $diseñado->getNombre() ?></span></h4>
													<h5>$<?php echo $producto->getPrecio() ?></h5>
												</div>
											</a>
										</article>
										<?php } ?>
									</div>
								</div>
						</div>
					</div>

    </div>
  </div>

	<?php include("includes/footer.php"); ?>
