<?php
	require_once("soporte.php");

	$dirname = "uploads/products/";
	$products = glob($dirname . "*.*");

	$categorias = [
    'Abstractas',
    'Animales',
    'Bicicletas',
    'Comics',
    'Creatividad',
    'Fantasía',
    'Películas',
    'Comida',
    'Diversión',
    'Juegos',
    'Monstruos',
    'Música',
    'Naturaleza',
    'Patrones',
    'Política',
    'Cultura',
    'Robots',
    'Eslogans',
    'Espacio',
    'Deportes',
    'Tipografía'
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
      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
        <aside>
          <ul>
            <?php foreach ($categorias as $categoria) { ?>
      				<li>
                <a href="#" title="<?php echo $categoria ?>"><?php echo $categoria ?></a>
      				</li>
      			<?php } ?>
          </ul>
        </aside>
      </div>
      <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
        <div class="row">
          <div class="col-md-12">

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>

              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img class="thumbnail img-responsive" src="img/1.jpg">
                </div>
                <div class="item">
                  <img class="thumbnail img-responsive" src="img/1.jpg">
                </div>
              </div>

              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
              </a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <h1>Productos destacados</h1>
          </div>
        </div>

        <div class="row">
					<?php foreach ($products as $product) { ?>
	          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
	            <article class="thumbnail text-center">
                <li>
                  <a href="#" title="">
                    <?php echo '<img src="' . $product . '" />' ?>
                    <div class="caption">
                      <h1>Title</h1>
                      <h2>Description</h2>
                      <p>Price</p>
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

  <?php include("includes/footer.php"); ?>
