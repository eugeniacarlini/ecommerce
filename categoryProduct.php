<?php
	require_once("soporte.php");
 	$dirname = "uploads/products/";
	$products = glob($dirname . "*.*");
  $todosLosProductos = $repositorio->getProductRepository()->mostrarCategoria($_GET['id']);

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

		<div class="col-md-12">
			<h1>Productos destacados</h1>
		</div>

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

<script src="libs/jquery.min.js"></script>
<script src="libs/bootstrap-select.min.js"></script>
<script src="js/main.js"></script>

<?php include("includes/footer.php"); ?>
