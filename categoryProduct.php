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



		<?php if (empty($todosLosProductos)): ?>
			<div class="col-md-10">
				<div class="product-row">
					<p>No se encontró ningún producto en la categoría <?php echo $_GET['id'] ?>.</p>
				</div>
			</div>
		<?php else: ?>
			<div class="col-md-10">
				<h2>Productos de la categoría <?php echo $_GET['id'] ?></h2>
			</div>
			<?php foreach ($todosLosProductos as $producto) { ?>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<article class="thumbnail text-center">
						<li>
							<a href="specsProduct.php?id=<?php echo $producto->getID() ?>">
								<img src="<?php echo $producto->getURLimagen() ?>" />
								<div class="caption">
									<h3><?php echo $producto->getTitulo() ?></h3>
									<h4>Diseñado por <span style="color: red;"><?php echo $usuarioAVer->getNombre() ?></span></h4>
									<h5>$<?php echo $producto->getPrecio() ?></h5>
								</div>
							</a>
						</li>
					</article>
				</div>
				<?php } ?>
		<?php endif; ?>


    </div>
  </div>
</div>

<script src="libs/jquery.min.js"></script>
<script src="libs/bootstrap-select.min.js"></script>
<script src="js/main.js"></script>

<?php include("includes/footer.php"); ?>
