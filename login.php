<?php
	require_once("soporte.php");

	if ($auth->estaLogueado())
	{
		header("location:index.php");exit;
	}

	if ($_POST)
	{
		$errores = $validar->validarLogin();

		if (empty($errores))
		{
			$usuario = $repositorio->getUserRepository()->getUsuarioByMail($_POST["mail"]);

			$auth->loguear($usuario);
			if (isset($_POST["recordame"])) {
				setcookie("usuarioLogueado", $usuario->getId(), time() + 60 * 60 * 24 * 3);
			}

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
			<h1>Ingresar</h1>
	    <form class="register-form" action="" method="post" enctype="multipart/form-data">
				<?php if (!empty($errores)) { ?>
          <div class="alert alert-danger" role="alert">
            <ul>
              <?php foreach ($errores as $error) { ?>
                <li>
                  <?php echo $error ?>
                </li>
              <?php } ?>
            </ul>
          </div>
        <?php } ?>
        <div class="form-group">
          <label for="mail">Email</label>
          <input type="email" class="form-control" id="mail" name="mail" />
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" class="form-control" id="password" name="password" />
        </div>
				<div class="checkbox">
					<label>
						<input type="checkbox" />Recordarme
					</label>
				</div>
        <input type="submit" class="btn btn-success btn-block" name="login" value="Ingresar" />
      </form>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>
