<?php
require_once("soporte.php");
//$usuarioActivo = getUsuarioLogueado();

$dirname = "uploads/avatars/";
$products = glob($dirname . "*.*");

// if (!$auth->estaLogueado())
// {
// header("location:index.php");exit;
// }
// if (!isset($_GET["idUser"]))
// {
// header("location:index.php");exit;
//}
//$usuarioAVer = $repositorio->getUserRepository()->getUsuarioById($usuarioActivo->getId());

$imagen = glob($dirname . "*.*");

// $usuarioLogueado = getUsuarioLogueado();
//
// $pNombre = $usuarioLogueado["nombre"];
// $pApellido = $usuarioLogueado["apellido"];
// $pMail = $usuarioLogueado["mail"];

// if ($usuarioLogueado["id"] != $_GET["idUser"]) {
// 	enviarAFelicidad();
// }

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
								<label for="sexo">Sexo</label>
								<select class="form-control" name="sexo" id="sexo">
									<option value="<?php echo $usuarioAVer->getSexo() ?>"><?php echo $usuarioAVer->getSexo() ?></option>
								</select>
							</div>
							<div class="form-group">
								<a href="verPerfil.php" title="Volver" class="btn btn-default">Volver</a>
								<button type="button" name="button" class="btn btn-success">Guardar cambios</button>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<img class="img-rounded center-block" src="<?php echo $imagen[0] ?>" alt="" />
								<input type="file" id="imagen" name="imagen" class="center-block" />
							</div>
						</div>
					</div>
        </form>
      </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>
