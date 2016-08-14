<?php
	require_once("soporte.php");
	require_once("clases/producto.php");

 	$dirname = "uploads/products/*";
	$products = glob("$dirname" . ".{jpg,png}", GLOB_BRACE);

	$todosLosProductos = $repositorio->getProductRepository()->getAllProducts();
	//$imgProducto = $repositorio->getProductRepository()->getURLImagen();

	include('includes/categories.php');

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

			<?php include('includes/menu-categorias.php'); ?>

      <div class="col-xs-12 col-sm-12 col-md-10">
				<div id="demo">
          <div class="span12">
            <div id="owl-demo" class="owl-carousel">
              <div class="item">
								<img src="img/1.jpg" alt="The Last of us">
							</div>
              <div class="item">
								<img src="img/2.jpg" alt="GTA V">
							</div>
              <div class="item">
								<img src="img/3.jpg" alt="Mirror Edge">
							</div>
            </div>
          </div>
        </div>

				<div class="row">
	        <div class="col-xs-12 col-sm-10 col-md-10">
	          <h1>Productos destacados</h1>
	        </div>
				</div>

				<div class="product-row">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
								<div id="products-highlights" class="owl-carousel owl-theme">
									<?php foreach ($todosLosProductos as $producto) { ?>
										<article class="item thumbnail text-center">
											<a href="specsProduct.php?id=<?php echo $producto->getID() ?>	">
												<img class="product-item lazyOwl" data-src="<?php echo $producto->getURLimagen() ?>" alt="<?php echo $producto->getID() ?>">
												<div class="caption">
													<h3><?php echo $producto->getTitulo() ?></h3>
													<h4><?php //echo $producto->getAutor() ?></h4>
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
  </div>

	<script src="libs/jquery-1.9.1.min.js"></script>
	<script src="libs/bootstrap-select.min.js"></script>
	<script src="libs/owl.carousel.js"></script>
	<script src="js/main.js"></script>

  <?php include("includes/footer.php"); ?>
