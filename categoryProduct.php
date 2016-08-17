<?php
	require_once("soporte.php");
 	$dirname = "uploads/products/";
	$products = glob($dirname . "*.*");
  $todosLosProductos = $repositorio->getProductRepository()->mostrarCategoria($_GET['id']);

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
		<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<ol class="breadcrumb">
					<li>
						<a href="/" title="Inicio">Inicio</a>
					</li>
					<li>
						<a href="#" title="Categoría">Categoría</a>
					</li>
					<li class="active"><?php echo $_GET['id']; ?></li>
				</ol>
			</div>
			<?php if (empty($todosLosProductos)): ?>
				<div class="product-wrapper">
					<p>No se encontró ningún producto en la categoría <?php echo $_GET['id'] ?>.</p>
				</div>
			<?php else: ?>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<h2>Productos de la categoría <?php echo $_GET['id'] ?></h2>
				</div>
			<?php foreach ($todosLosProductos as $producto) { ?>
				<?php
					$diseñado =  $repositorio->getUserRepository()->getUsuarioById($producto->getIdUsuario());
				?>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<article class="thumbnail text-center">
						<li>
							<a href="specsProduct.php?id=<?php echo $producto->getID() ?>" title="Producto">
								<img src="<?php echo $producto->getURLimagen() ?>" />
								<div class="caption">
									<h3><?php echo $producto->getTitulo() ?></h3>
									<h4>Diseñado por<span><?php echo '@' . $diseñado->getNombre() ?></span></h4>
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
</div>

<?php include("includes/footer.php"); ?>
