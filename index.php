<?php
	require_once("soporte.php");
	require_once("clases/producto.php");

 	$dirname = "uploads/products/*";
	$products = glob("$dirname" . ".{jpg,png}", GLOB_BRACE);

	$todosLosProductos = $repositorio->getProductRepository()->getAllProducts();

	// $extensionRemera = $producto->getExtension();


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
      <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
        <aside class="navbar-categories">
          <ul>
            <?php foreach ($catArray as $categoria) { ?>
      				<li>
                <a class="category" href="categoryProduct.php?id=<?php echo $categoria['title'] ?>" title="<?php echo $categoria['title'] ?>">
									<span class='glyphicon glyphicon-<?php echo $categoria['icon'] ?>' aria-hidden="true"></span>
									<?php echo $categoria['title'] ?>
								</a>
      				</li>
      			<?php } ?>
          </ul>
        </aside>
      </div>

      <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
        <div class="row">
          <div class="col-md-12">
						<div id="demo">
		          <div class="row">
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
			      </div>
          </div>
        </div>

        <div class="row">
          <h1>Productos destacados</h1>
        </div>

				<!-- OWL CAROUSEL -->
				<!-- <div id="product-hightlights" class="owl-carousel">
				  <div class="item"><img class="lazyOwl" data-src="assets/owl1.jpg" alt="Lazy Owl Image"></div>
				  <div class="item"><img class="lazyOwl" data-src="assets/owl2.jpg" alt="Lazy Owl Image"></div>
				  <div class="item"><img class="lazyOwl" data-src="assets/owl3.jpg" alt="Lazy Owl Image"></div>
				  <div class="item"><img class="lazyOwl" data-src="assets/owl4.jpg" alt="Lazy Owl Image"></div>
				  <div class="item"><img class="lazyOwl" data-src="assets/owl5.jpg" alt="Lazy Owl Image"></div>
				  <div class="item"><img class="lazyOwl" data-src="assets/owl6.jpg" alt="Lazy Owl Image"></div>
				  <div class="item"><img class="lazyOwl" data-src="assets/owl7.jpg" alt="Lazy Owl Image"></div>
				  <div class="item"><img class="lazyOwl" data-src="assets/owl8.jpg" alt="Lazy Owl Image"></div>
				  <div class="item"><img class="lazyOwl" data-src="assets/owl1.jpg" alt="Lazy Owl Image"></div>
				  <div class="item"><img class="lazyOwl" data-src="assets/owl2.jpg" alt="Lazy Owl Image"></div>
				  <div class="item"><img class="lazyOwl" data-src="assets/owl3.jpg" alt="Lazy Owl Image"></div>
				  <div class="item"><img class="lazyOwl" data-src="assets/owl4.jpg" alt="Lazy Owl Image"></div>
				  <div class="item"><img class="lazyOwl" data-src="assets/owl5.jpg" alt="Lazy Owl Image"></div>
				  <div class="item"><img class="lazyOwl" data-src="assets/owl6.jpg" alt="Lazy Owl Image"></div>
				  <div class="item"><img class="lazyOwl" data-src="assets/owl7.jpg" alt="Lazy Owl Image"></div>
				  <div class="item"><img class="lazyOwl" data-src="assets/owl8.jpg" alt="Lazy Owl Image"></div>
				</div> -->

				<div class="product-row padding-row row">
					<div class="col-md-12">
							<div id="product-hightlights" class="owl-carousel">
								<?php foreach ($todosLosProductos as $producto) { ?>
									<article class="item thumbnail text-center">
										<a href="specsProduct.php">
											<img class="lazyOwl" data-src="img/tshirt.png" alt="Lazy Owl Image">
											<div class="caption">
												<h3><?php echo 'Titulo' ?></h3>
												<h4><?php //echo $producto->getAutor() ?></h4>
												<h5>$<?php echo '250' ?></h5>
											</div>
										</a>
									</article>
								<?php } ?>
								<!-- <article class="item thumbnail text-center">
									<a href="specsProduct.php">
										<img class="lazyOwl" data-src="img/tshirt.png" alt="Lazy Owl Image">
										<div class="caption">
											<h3><?php echo 'Titulo' ?></h3>
											<h4><?php //echo $producto->getAutor() ?></h4>
											<h5>$<?php echo '250' ?></h5>
										</div>
									</a>
								</article>
								<article class="item thumbnail text-center">
									<a href="specsProduct.php">
										<img class="lazyOwl" data-src="img/tshirt.png" alt="Lazy Owl Image">
										<div class="caption">
											<h3><?php echo 'Titulo' ?></h3>
											<h4><?php //echo $producto->getAutor() ?></h4>
											<h5>$<?php echo '250' ?></h5>
										</div>
									</a>
								</article>
								<article class="item thumbnail text-center">
									<a href="specsProduct.php">
										<img class="lazyOwl" data-src="img/tshirt.png" alt="Lazy Owl Image">
										<div class="caption">
											<h3><?php echo 'Titulo' ?></h3>
											<h4><?php //echo $producto->getAutor() ?></h4>
											<h5>$<?php echo '250' ?></h5>
										</div>
									</a>
								</article>
								<article class="item thumbnail text-center">
									<a href="specsProduct.php">
										<img class="lazyOwl" data-src="img/tshirt.png" alt="Lazy Owl Image">
										<div class="caption">
											<h3><?php echo 'Titulo' ?></h3>
											<h4><?php //echo $producto->getAutor() ?></h4>
											<h5>$<?php echo '250' ?></h5>
										</div>
									</a>
								</article>
								<article class="item thumbnail text-center">
									<a href="specsProduct.php">
										<img class="lazyOwl" data-src="img/tshirt.png" alt="Lazy Owl Image">
										<div class="caption">
											<h3><?php echo 'Titulo' ?></h3>
											<h4><?php //echo $producto->getAutor() ?></h4>
											<h5>$<?php echo '250' ?></h5>
										</div>
									</a>
								</article> -->
							</div>
					</div>
				</div>





				<!-- FUNCIONA -->
        <div class="product-row padding-row row">
					<?php foreach ($todosLosProductos as $producto) { ?>
	          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
	            <article class="thumbnail text-center">
                <li>
                  <a href="specsProduct.php?id=<?php echo $producto->getID() ?>">
										<img src="uploads/products/<?php echo $producto->getID() . '.jpg' ?>" />
                    <div class="caption">
                      <h3><?php echo $producto->getTitulo() ?></h3>
                      <h4><?php //echo $producto->getAutor() ?></h4>
                      <h5>$<?php echo $producto->getPrecio() ?></h5>
                    </div>
                  </a>
                </li>
	            </article>
	          </div>
					<?php } ?>
        </div>




      </div>
    </div>
  </div>

	<script src="libs/jquery-1.9.1.min.js"></script>
	<script src="libs/owl.carousel.js"></script>
	<script src="js/main.js"></script>

  <?php include("includes/footer.php"); ?>
