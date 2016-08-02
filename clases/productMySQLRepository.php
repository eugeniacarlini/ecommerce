<?php

require_once("mySQLRepository.php");
require_once("producto.php");
require_once("productRepository.php");

class ProductMySQLRepository extends ProductRepository {

	private $miConexion;

	public function __construct($miConexion)
	{
		$this->miConexion = $miConexion;
	}

	public function guardarProducto(Producto $miProducto)
	{
		if ($miProducto->getId())
		{
			if ($this->getProductoById($miProducto->getId()))
			{
				$stmt = $this->miConexion->prepare("UPDATE producto SET titulo = :titulo, precio = :precio, categoria = :categoria, descripcion = :descripcion, idUsuario = :idUsuario WHERE id = :id");
			}
			else
			{
				$stmt = $this->miConexion->prepare("INSERT INTO producto (id, titulo, precio, categoria, descripcion) values , idUsuario(:id, :titulo, :precio, :categoria, :descripcion, idUsuario = :idUsuario)");
			}

			$stmt->bindValue(":id", $miProducto->getId());

		}
		else
		{
			$stmt = $this->miConexion->prepare("INSERT INTO producto (titulo, precio, categoria, descripcion, idUsuario) values (:titulo, :precio, :categoria, :descripcion, :idUsuario)");
		}

		$stmt->bindValue(":titulo", $miProducto->getTitulo());
		$stmt->bindValue(":precio", $miProducto->getPrecio());
		$stmt->bindValue(":categoria", $miProducto->getCategoria());
		$stmt->bindValue(":descripcion", $miProducto->getDescripcion());
		$stmt->bindValue(":idUsuario", $miProducto->getIdUsuario());

		$stmt->execute();

		if ($miProducto->getId() == null)
		{
			$miProducto->setId($this->miConexion->lastInsertId());
		}
	}


	private function arrayToProducto(Array $miProducto) {
		return new Producto($miProducto);
	}


  public function getProductoById($id)
	{
		$stmt = $this->miConexion->prepare("SELECT * from producto where id = :id");

		$stmt->bindValue(":id", $id);

		$stmt->execute();

		$productoArray = $stmt->fetch();

		if ($productoArray == false)
		{
			return null;
		}

		return $this->arrayToProduct($productoArray);
	}

	public function getAllproducts()
	{
		$stmt = $this->miConexion->prepare("SELECT * from producto");

		$stmt->execute();

		$usuariosArray = $stmt->fetchAll();

		return $this->muchosArraysAMuchosProductos($productosArray);
	}

	private function muchosArraysAMuchosProductos(Array $productoArray)
	{
		$productos = [];

		foreach ($productosArray as $productoArray) {
			$productos[] = $this->arrayToProducto($productoArray);
		}

		return $productos;
	}

}
