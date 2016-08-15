<?php
	$usuarioActivo = getUsuarioLogueado();
	$usuarioAVer = $repositorio->getUserRepository()->getUsuarioById($usuarioActivo->getId());
	$imagen = glob('uploads/avatars/' . "*.*");
?>

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
	<?php
 // $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
 // 	foreach($crumbs as $crumbs){
 //    echo ucfirst(str_replace(array(".php","_","?id=","0","1","2","3","4","5","6","7","8","9"),array(""," ","","","","","","","","",""),$crumbs) . '//');
 // }



 	$path = $_SERVER["PHP_SELF"];
 	$parts = explode('/',$path);
 	if (count($parts) < 2)
 	{
 	echo("home");
 	}
 	else
 	{
 	echo ("<a href=\"/\">home</a> &raquo; ");
 	for ($i = 1; $i < count($parts); $i++)
     	{
     	if (!strstr($parts[$i],"."))
         	{
         	echo("<a href=\"");
         	for ($j = 0; $j <= $i; $j++) {echo $parts[$j]."/";};
         	echo("\">". str_replace('-', ' ', $parts[$i])."</a> » ");
         	}
     	else
         	{
        	 	$str = $parts[$i];
         	$pos = strrpos($str,".");
         	$parts[$i] = substr($str, 0, $pos);
         	echo str_replace('-', ' ', $parts[$i]);
         	};
     	};
 	};
 ?>




<ol class="breadcrumb">
<li><a href="#">Home</a></li>
<li><a href="#">Library</a></li>
<li class="active">Data</li>
</ol>
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="col-md-2">
        <div class="navbar-header">
					<ul class="navbar-toggle">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle line-height" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<img class="avatar img-circle" src="<?php echo $usuarioAVer->getURLImagen() ?>" alt="Avatar" />
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu margin">
								<li><a href="verPerfil.php" title="Mi perfil">Mi perfil</a></li>
								<li><a href="cargarProducto.php" title="Subir producto">Subir producto</a></li>
								<li><a href="logout.php" title="Cerrar sesión">Cerrar sesión</a></li>
							</ul>
						</li>
					</ul>
          <a class="navbar-brand" href="index.php" title="Sticky">
						Sticky
					</a>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <div class="col-md-10">
          <ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
		          <a href="#" class="dropdown-toggle line-height" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<img class="avatar img-circle" src="<?php echo $usuarioAVer->getURLImagen() ?>" alt="Avatar" />
								<?php echo $usuarioAVer->getNombre() ?> <span class="caret"></span>
							</a>
		          <ul class="dropdown-menu">
		            <li><a href="verPerfil.php" title="Mi perfil">Mi perfil</a></li>
		            <li><a href="cargarProducto.php" title="Subir producto">Subir producto</a></li>
		            <li><a href="logout.php" title="Cerrar sesión">Cerrar sesión</a></li>
		          </ul>
		        </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>
