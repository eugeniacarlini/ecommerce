<?php

class Usuario {

	private $id;
	private $nombre;
	private $apellido;
	private $sexo;
	private $password;
	private $mail;

	public function __construct(Array $miUsuario)
	{
		$this->id = array_key_exists("id", $miUsuario) ? $miUsuario["id"] : null;
		$this->nombre = $miUsuario["nombre"];
		$this->apellido = $miUsuario["apellido"];
		$this->password = $miUsuario["password"];
		$this->mail = $miUsuario["mail"];
		$this->sexo = $miUsuario["sexo"];
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function getApellido() {
		return $this->apellido;
	}

	public function getId() {
		return $this->id;
	}

	public function getMail() {
		return $this->mail;
	}

	public function getSexo() {
		return $this->sexo;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	public function setApellido($apellido)
	{
		$this->apellido = $apellido;
	}

	public function setMail($mail)
	{
		$this->mail = $mail;
	}

	public function setPassword($password)
	{
		$this->password = password_hash($password, PASSWORD_DEFAULT);
	}

	public function setSexo($sexo)
	{
		$this->sexo = $sexo;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function guardarImagen()
	{
		if ($_FILES["imagen"]["error"] == UPLOAD_ERR_OK)
		{
			$tmp_name = $_FILES["imagen"]["tmp_name"];
			$path = $_FILES['imagen']['name'];

			$ext = pathinfo($path, PATHINFO_EXTENSION);

			$miArchivo = dirname(__FILE__) . '/../uploads/avatars/';
			$miArchivo = $miArchivo . $this->getId() . "." . $ext;

			move_uploaded_file($tmp_name, $miArchivo);
		}
	}

	public function getExtension()
	{
		$name = $this->getId();
		$matching = glob("uploads/avatars/" . $name . ".*");

		$info = pathinfo($matching[0]);
		$ext = $info['extension'];
		return $ext;
	}

	public function getURLImagen()
	{
		return "uploads/avatars/" . $this->getId() . "." . $this->getExtension();
	}

}
