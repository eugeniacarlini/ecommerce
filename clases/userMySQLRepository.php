<?php
require_once("mySQLRepository.php");
require_once("userRepository.php");
require_once("usuario.php");

class UserMySQLRepository extends UserRepository {

	private $miConexion;

	public function __construct($miConexion)
	{
		$this->miConexion = $miConexion;
	}

	public function existeElMail($mail)
	{
		$stmt = $this->miConexion->prepare("SELECT * from usuario where mail = :mail");

		$stmt->bindValue(":mail", $mail);

		$stmt->execute();

		if ($stmt->rowCount() == 0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function guardarUsuario(Usuario $miUsuario)
	{
		// Existe el id del usuario? No, viene null.
		if ($miUsuario->getId())
		{
			// Si existe, quiero obtener el id y guardarlo en this. Acá modifico los datos del perfil.
			if ($this->getUsuarioById($miUsuario->getId()))
			{
				$stmt = $this->miConexion->prepare("UPDATE usuario set nombre = :nombre, apellido = :apellido, mail = :mail, sexo = :sexo, password = :password WHERE id = :id");
			}
			// Si no existe, creo un nuevo usuario
			else
			{
				$stmt = $this->miConexion->prepare("INSERT INTO usuario (id, nombre, apellido, sexo, password, mail) values (:id, :nombre, :apellido, :sexo, :password, :mail)");
			}

			$stmt->bindValue(":id", $miUsuario->getId());
		}
		else
		{
			$stmt = $this->miConexion->prepare("INSERT INTO usuario (nombre, apellido, sexo, password, mail) values (:nombre, :apellido, :sexo, :password, :mail)");
		}

		$stmt->bindValue(":nombre", $miUsuario->getNombre());
		$stmt->bindValue(":apellido", $miUsuario->getApellido());
		$stmt->bindValue(":sexo", $miUsuario->getSexo());
		$stmt->bindValue(":password", $miUsuario->getPassword());
		$stmt->bindValue(":mail", $miUsuario->getMail());

		$stmt->execute();

		if ($miUsuario->getId() == null)
		{
			$miUsuario->setId($this->miConexion->lastInsertId());
		}
	}

	private function arrayToUsuario(Array $miUsuario) {
		return new Usuario($miUsuario);
	}

	public function usuarioValido($mail, $pass)
	{
		$usuario = $this->getUsuarioByMail($mail);

		if ($usuario) {
			if (password_verify($pass, $usuario->getPassword())) {
				return true;
			}
		}

		return false;
	}

	public function getUsuarioByMail($mail)
	{
		$stmt = $this->miConexion->prepare("SELECT * from usuario where mail = :mail");

		$stmt->bindValue(":mail", $mail);

		$stmt->execute();

		$usuarioArray = $stmt->fetch();

		if ($usuarioArray == false)
		{
			return null;
		}

		return $this->arrayToUsuario($usuarioArray);
	}

	public function getUsuarioById($id)
	{
		$stmt = $this->miConexion->prepare("SELECT * from usuario where id = :id");

		$stmt->bindValue(":id", $id);

		$stmt->execute();

		$usuarioArray = $stmt->fetch();

		if ($usuarioArray == false)
		{
			return null;
		}

		return $this->arrayToUsuario($usuarioArray);
	}

	public function getAllUsers()
	{
		$stmt = $this->miConexion->prepare("SELECT * from usuario");

		$stmt->execute();

		$usuariosArray = $stmt->fetchAll();

		return $this->muchosArraysAMuchosUsuarios($usuariosArray);
	}

	private function muchosArraysAMuchosUsuarios(Array $usuariosArray)
	{
		$usuarios = [];

		foreach ($usuariosArray as $usuarioArray) {
			$usuarios[] = $this->arrayToUsuario($usuarioArray);
		}

		return $usuarios;
	}

	public function borrarUsuario($id){

		$stmt = $this->miConexion->prepare("DELETE  from usuario where id = :id");

		$stmt->bindValue(":id", $id);
		// var_dump($stmt);exit;
		$stmt->execute();

	}
	public function borrarProductosUsuario($id){

		$stmt = $this->miConexion->prepare("DELETE from producto where idUsuario = :idUsuario");

		$stmt->bindValue(":idUsuario", $id);

		$stmt->execute();

	}

}
