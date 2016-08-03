<?php
	require_once("soporte.php");

	$dirname = "uploads/products/";
	$products = glob($dirname . "*.*");

	$catArray = [
		array(
			'title' => 'Abstracto',
			'icon' => 'asterisk'
		),
		array(
			'title' => 'Animales',
			'icon' => 'cloud'
		),
		array(
			'title' => 'Bicicletas',
			'icon' => 'pencil'
		),
		array(
			'title' => 'Comics',
			'icon' => 'glass'
		),
		array(
			'title' => 'Creatividad',
			'icon' => 'music'
		),
		array(
			'title' => 'Fantasía',
			'icon' => 'search'
		),
		array(
			'title' => 'Películas',
			'icon' => 'heart'
		),
		array(
			'title' => 'Comidas',
			'icon' => 'star'
		),
		array(
			'title' => 'Diversión',
			'icon' => 'user'
		),
		array(
			'title' => 'Juegos',
			'icon' => 'off'
		),
		array(
			'title' => 'Música',
			'icon' => 'signal'
		),
		array(
			'title' => 'Naturaleza',
			'icon' => 'cog'
		),
		array(
			'title' => 'Patrones',
			'icon' => 'home'
		),
		array(
			'title' => 'Deportes',
			'icon' => 'flag'
		),
		array(
			'title' => 'Tipografía',
			'icon' => 'headphones'
		)
	];

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
                <a class="category" href="#" title="<?php echo $categoria['title'] ?>">
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
          <div class="col-md-12 row">
            <h3>Productos destacados</h3>
          </div>
        </div>

        <div class="product-row padding-row row">
					<?php foreach ($products as $product) { ?>
	          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
	            <article class="thumbnail text-center">
                <li>
                  <a href="specsProduct.php" title="">
                    <?php echo '<img src="' . $product . '" />' ?>
                    <div class="caption">
                      <h3>Great Outdoors</h3>
                      <h3><?php echo $ver ?></h3>
                      <h4>Diseñada por Eugenia Carlini</h4>
                      <h5>$250</h5>
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
