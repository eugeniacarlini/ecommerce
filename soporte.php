<?php
require_once('clases/auth.php');
require_once('clases/validar.php');
require_once('clases/jsonRepository.php');
require_once('clases/mySQLRepository.php');
require_once('clases/usuario.php');
require_once('clases/producto.php');
require_once('clases/AuthProduct.php');

$tipoRepositorio = "mysql";
$repositorio = null;

if ($tipoRepositorio == "json")
{
	$repositorio = new JSONRepository();
}
else if ($tipoRepositorio == "mysql") {
	$repositorio = new MySQLRepository();
}

$auth = Auth::getInstance($repositorio->getUserRepository());
$authP = Authproduct::getInstance($repositorio->getProductRepository());
$validar = Validar::getInstance($repositorio->getUserRepository());
// $validarProducto = Validar::getInstance($repositorio->getProductRepository());

function usuarioValido($mail, $pass)
{
	$usuario = getUsuarioByMail($mail);

	if ($usuario) {
		if (password_verify($pass, $usuario["password"])) {
			return true;
		}
	}

	return false;
}

	function getUsuarioByMail($mail)
	{
		$usuariosArray = getAllUsers();

		foreach ($usuariosArray as $key => $usuario) {
			$usuarioArray = json_decode($usuario, true);

			if ($mail == $usuarioArray["mail"])
			{
				return $usuarioArray;
			}
		}

		return null;
	}

	function getUsuarioById($id)
	{
		$usuariosArray = getAllUsers();

		foreach ($usuariosArray as $key => $usuario) {
			$usuarioArray = json_decode($usuario, true);

			if ($id == $usuarioArray["id"])
			{
				return $usuarioArray;
			}
		}

		return null;
	}

	function getUsuarioByParameter($name, $value) {
		$usuariosArray = getAllUsers();

		foreach ($usuariosArray as $key => $usuario) {
			$usuarioArray = json_decode($usuario, true);

			if ($value == $usuarioArray[$name])
			{
				return $usuarioArray;
			}
		}

		return null;
	}

	function getAllUsers()
	{
		$usuarios = file_get_contents("usuarios.json");

		$usuariosArray = explode(PHP_EOL, $usuarios);

		array_pop($usuariosArray);

		return $usuariosArray;
	}

	function loguear($usuario)
	{
		session_start();
		unset($usuario["password"]);
		$_SESSION["usuarioLogueado"] = $usuario;
	}

	function logout()
	{
		session_destroy();
		unsetCookie("usuarioLogueado");
	}

	function unsetCookie($cookie)
	{
		setcookie($cookie, "", -1);
	}

	function estaLogueado()
	{
		return isset($_SESSION["usuarioLogueado"]);
	}

	function getUsuarioLogueado()
	{
		return $_SESSION["usuarioLogueado"];
	}
?>
