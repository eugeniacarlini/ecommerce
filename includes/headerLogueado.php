<?php
	$usuario = getUsuarioLogueado();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sticky - Comprá, publicá y vendé tu remera</title>
  <link rel="stylesheet" href="libs/bootstrap.min.css" >
  <link rel="stylesheet" href="css/styles.css">
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"/>

	<link href="libs/owl.carousel.css" rel="stylesheet">
	<link href="libs/owl.theme.css" rel="stylesheet">

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
      <div class="col-md-2">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php" title="Sticky">
						Sticky
					</a>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <div class="col-md-7">
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Buscar...">
              <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
              </button>
            </div>
          </form>
        </div>
        <div class="col-md-3">
          <ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								Hola, <?php echo $usuario->getNombre() ?> <span class="caret"></span>
							</a>
		          <ul class="dropdown-menu">
		            <li><a href="ver.php">Mi perfil</a></li>
		            <li><a href="cargarProducto.php">Subir producto</a></li>
		            <li><a href="logout.php">Cerrar sesión</a></li>
		          </ul>
		        </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>
