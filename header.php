<?php
	require_once("soporte.php");

	if (estaLogueado())
	{
		include("includes/headerLogueado.php");
	}
	else
	{
		include("incudes/headerNoLogueado.php");
	}
?>
