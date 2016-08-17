<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sticky - Comprá, publicá y vendé tu remera</title>

  <link rel="stylesheet" href="libs/bootstrap.min.css">
  <link rel="stylesheet" href="libs/bootstrap-select.min.css">
  <link rel="stylesheet" href="libs/font-awesome.min.css">
  <link rel="stylesheet" href="libs/owl.carousel.css">
	<link rel="stylesheet" href="libs/owl.theme.css">
  <link rel="stylesheet" href="css/styles.css">

  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"/>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<header>
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php" title="Sticky">
              Sticky
            </a>
        </div>
      </div>
      <div class="col-xs-10 col-sm-10 col-md-2 col-lg-2">
        <div class="navbar-headert">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
        </div>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <div class="visible-md visible-lg col-md-10 col-lg-10 hidden-xs visible-sm">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="register.php" title="Registrate">Registrate</a></li>
            <li>
              <a
                tabindex="0"
                data-toggle="popover"
                data-trigger="click"
                data-placement="bottom"
                data-popover-content="#login">
                <i class="fa fa-user" aria-hidden="true"></i>
                Ingresar</a>
            </li>
          </ul>
        </div>
        <div class="visible-xs hidden-sm col-xs-10 col-sm-10 hidden-md hidden-lg">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="register.php" title="Registrate">Registrate</a></li>
            <li><a href="login.php" title="Registrate">Ingresar</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>

<div id="login" class="hidden">
    <div class="popover-heading text-center">
      <h5 class="text-center">Iniciar sesión</h5>
    </div>

    <div class="popover-body">
      <?php
        require_once("soporte.php");

        if ($auth->estaLogueado())
        {
          header("location:index.php");exit;
        }

        if ($_POST) {
          $errores = $validar->validarLogin();

          if (empty($errores))
          {
            // Loguearlo
            $usuario = $repositorio->getUserRepository()->getUsuarioByMail($_POST["mail"]);

            $auth->loguear($usuario);
            // Si me puso que lo recuerde, recordarlo
            if (isset($_POST["recordame"])) {
              //recordarlo
              setcookie("usuarioLogueado", $usuario->getId(), time() + 60 * 60 * 24 * 3);
            }

            // Redirigirlo
            header("location:index.php");exit;
          }
        }
      ?>

      <div class="row">
        <div class="col-md-12">
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
</div>
