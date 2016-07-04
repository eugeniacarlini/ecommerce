<?php

require_once("producto.php");

abstract class ProductRepository {

	abstract public function guardarProducto(Producto $producto);

}
