<?php
	require_once("soporte.php");
	require_once("clases/producto.php");
	require_once("clases/validar.php");

	$date = date("Y-m-d H:i:s");

	$pTitulo = "";
	$pDescripcion = "";
	$pPrice = "";
	$categorias = [
		'Abstractas',
		'Animales',
		'Bicicletas',
		'Comics',
		'Comidas',
		'Creatividad',
		'Deportes',
		'Diversión',
		'Fantasía',
		'Juegos',
		'Música',
		'Naturaleza',
		'Patrones',
		'Películas',
		'Tipografía'
	];

	sort($categorias);

	if ($_POST)
	{
		$pTitulo = $_POST['titulo'];
		$pDescripcion = $_POST['descripcion'];
		$pPrice = $_POST['precio'];

		$erroresProduct = [];

		if (empty($erroresProduct))
		{
			$productoArr = $_POST;
			$producto = new Producto($_POST);
			$repositorio->getProductRepository()->guardarProducto($producto);
			$producto->guardarImagenProducto($producto);
			header("location:index.php");exit;
		}
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

<div class="col-md-12 header-hidden"></div>
<div class="container">
  <div class="row">
    <div class="col-md-offset-3 col-md-5">
      <h1>Cargar producto</h1>
      <form class="register-form" action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="fechaPublicacion" value="<?php echo $date;	?>" />
        <?php if (!empty($errores)) { ?>
          <div class="alert alert-danger" role="alert">
            <ul>
              <?php foreach ($erroresProduct as $error) { ?>
                <li>
                  <?php echo $error ?>
                </li>
              <?php } ?>
            </ul>
          </div>
        <?php } ?>
        <div class="form-group">
          <label for="titulo">Titulo</label>
          <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $pTitulo ?>" />
        </div>
        <div class="form-group">
          <label for="descripcion">Descripción</label>
					<textarea class="form-control" id="descripcion" name="descripcion" rows="4" cols="40" placeholder="Máximo 200 caracteres"></textarea>
        </div>
        <div class="form-group">
          <label for="precio">Precio</label>
          <input type="text" class="form-control" id="precio" name="precio" value="<?php echo $pPrice ?>" />
        </div>
        <div class="form-group">
          <label for="categoria">Categoría</label>
          <select class="form-control" id="categoria"name="categoria">
            <?php foreach ($categorias as $categoria) { ?>
  						<?php if (isset($_POST["categoria"]) && $categoria == $_POST["categoria"]) { ?>
  							<option selected value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
  						<?php } else { ?>
  							<option value="<?php echo $categoria ?>"><?php echo $categoria?></option>
  						<?php } ?>
  					<?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="imagen-producto">Imagen</label>
          <input type="file" id="imagen-producto" name="imagen-producto" />
        </div>
        <input type="submit" class="btn btn-success btn-block" name="subirProducto" value="Cargar" />
      </form>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>
