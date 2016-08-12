<?php
require_once("soporte.php");
$usuarioActivo = getUsuarioLogueado();
$usuarioAVer = $repositorio->getUserRepository()->getUsuarioById($usuarioActivo->getId());

$imagen = glob('uploads/avatars/' . "*.*");

if ($_POST)
{
	$errores = $validar->validarEditarUsuario($_POST);

	if (empty($errores))
	{
		$miUsuario = $_POST;
		$usuario = new Usuario($_POST);
		// var_dump($usuario);exit;
		// Editar datos del perfil del usuario en la BDD
		$repositorio->getUserRepository()->editarUsuario($usuario);
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

<div class="container">
  <div class="row">
      <div class="col-md-offset-2 col-md-8">
        <h1>Editar mi perfil</h1>
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
					<div class="row">
						<div class="col-md-7">
							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuarioAVer->getNombre() ?>" />
							</div>
							<div class="form-group">
								<label for="apellido">Apellido</label>
								<input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $usuarioAVer->getApellido() ?>" />
							</div>
							<div class="form-group">
								<label for="mail">Email</label>
								<input type="email" class="form-control" id="mail" name="mail" value="<?php echo $usuarioAVer->getMail() ?>" />
							</div>
							<div class="form-group">
								<label for="password">Contraseña</label>
								<input type="password" class="form-control" id="password" name="password" />
							</div>
							<div class="form-group">
								<label for="sexo">Sexo</label>
								<select class="form-control" name="sexo" id="sexo">
									<option value="<?php echo $usuarioAVer->getSexo() ?>"><?php echo $usuarioAVer->getSexo() ?></option>
								</select>
							</div>
							<div class="form-group">
								<a href="verPerfil.php" title="Volver" class="btn btn-default">Volver</a>
								<input type="submit" name="guardar-cambios" value="Guardar cambios" class="btn btn-success">
								<input type="submit" name="borrar-perfil" value="Borrar perfil" class="btn btn-danger pull-right">
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group text-center">
								<img class="img-rounded" src="<?php echo $imagen[0] ?>" alt="" />
								<label class="btn btn-default">
									Elige una imagen<input type="file" id="imagen" name="imagen" style="display: none;">
								</label>
							</div>
						</div>
					</div>
        </form>
      </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>
