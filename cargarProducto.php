<?php
	require_once("soporte.php");
	require_once("clases/producto.php");
	require_once("clases/validar.php");

// 	if(isset($_FILES['uploaded_file'])) {
//     $errors     = array();
//     $maxsize    = 11;
//     $acceptable = array(
//         'image/jpeg',
//         'image/jpg',
//         'image/gif',
//         'image/png'
//     );
//
//     if(($_FILES['uploaded_file']['size'] >= $maxsize) || ($_FILES["uploaded_file"]["size"] == 0)) {
//         $errors[] = 'File too large. File must be less than 2 megabytes.';
//     }
//
//     if(!in_array($_FILES['uploaded_file']['type'], $acceptable)) && (!empty($_FILES["uploaded_file"]["type"])) {
//         $errors[] = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
//     }
//
//     if(count($errors) === 0) {
//         move_uploaded_file($_FILES['uploaded_file']['tmpname'], '/store/to/location.file');
//     } else {
//         foreach($errors as $error) {
//             echo '<script>alert("'.$error.'");</script>';
//         }
//
//         die(); //Ensure no more processing is done
//     }
// }

	$pTitulo = "";
	$pDescripcion = "";
	$pPrice = "";
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

	if ($_POST)
	{
		$pTitulo = $_POST['titulo'];
		$pDescripcion = $_POST['descripcion'];
		$pPrice = $_POST['precio'];
		//Acá vengo si me enviaron el form

		// Validar
		//$erroresProduct = $validarProducto->validarProducto($_POST);
		$erroresProduct = [];

		// Si no hay errores....
		if (empty($erroresProduct))
				{
					$productoArr = $_POST;
					$producto = new Producto($_POST);


					$repositorio->getProductRepository()->guardarProducto($producto);
					$producto->guardarImagen($producto);
					//redir
					header("location:index.php");exit;
				}
		}
?>

<?php if (estaLogueado())
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
      <div class="col-md-offset-3 col-md-5">
        <h1>Cargar producto</h1>
        <form class="register-form" action="" method="post" enctype="multipart/form-data">
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
            <!-- <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $pDescripcion ?>" /> -->
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
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" />
          </div>
          <input type="submit" class="btn btn-success btn-block" name="subirProducto" value="Cargar" />
        </form>
      </div>
    </div>
  </div>

<?php include('includes/footer.php'); ?>
