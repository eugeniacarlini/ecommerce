<?php
	require_once('soporte.php');
  require_once("clases/producto.php");

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

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 product-row">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-5">
							<div class="product-image">
								<img src="img/tshirt2.jpg" alt="" />
							</div>
              <?php //echo '<img class="product" src="img/products/' . $product->getId() . '. ' . $product->getExtension() . '" />' ?>
            </div>
            <div class="col-md-7">
							<div class="product-description">
	              <h1 class="title">
									<?php //$producto->getTitulo() ?>
									Great Outdoors
								</h1>
								<h3 class="description">Diseñado por Eugenia Carlini</h3>
	              <h5 class="price">$250</h5>
	              <button type="button" class="btn btn-success">Comprar</button>
							</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

	<div class="perfil-usuario">
		<div class="row product-row">
			<div class="col-md-12">

				<div class="row">
					<div class="col-md-3 text-center">
						<div class="user-box">
							<img src="img/euge.jpg" alt="Euge" />
							<h3>@eugeniacarlini</h3>
						</div>
						<div class="follow-user">
							<button type="button" class="btn btn-success">Seguir</button>
							<ul id="following">
								<li><a href="#"><p>40</p>Seguidores</a></li>
								<li><a href="#"><p>53</p>Siguiendo</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-9">
						<h1>Productos</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<?php include("includes/footer.php"); ?>
