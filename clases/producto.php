<?php


class Producto {
    private $id;
    private $titulo;
    private $precio;
    private $imagen;
    private $categoria;
    private $descripcion;
    private $idUsuario;

    public function __construct(Array $miproducto)
    {
      //revisar
      $this->id = array_key_exists("id", $miproducto) ? $miproducto["id"] : null;
      $this->titulo = $miproducto["titulo"];
      $this->precio = $miproducto["precio"];
      $this->imagen = $miproducto["imagen"];
      $this->categoria = $miproducto["categoria"];
      $this->descripcion = $miproducto["descripcion"];
      //revisar
      //$this->idUsuario = $auth->usuarioLogueado->getID();
    }

    public function getID()
    {
      return $this->id;
    }

    public function getTitulo()
    {
      return $this->titulo;
    }

    public function getPrecio()
    {
      return $this->precio;
    }

    public function getImagen()
    {
      return $this->imagen;
    }

    public function getCategoria()
    {
      return $this->categoria;
    }

    public function getDescripcion()
    {
      return $this->descripcion;
    }

    public function getIdUsuario()
    {
      return $this->idUsuario;
    }

    public function setID($id)
    {
      return $this->id = $id;
    }

    public function setTitulo($titulo)
    {
      return $this->titulo = $titulo;
    }

    public function setPrecio($precio)
    {
      return $this->precio = $precio;
    }

    public function setImagen($imagen)
    {
      return $this->imagen = $imagen;
    }

    public function setCategoria($categoria)
    {
      return $this->categoria = $categoria;
    }

    public function setDescripcion($descripcion)
    {
      return $this->descripcion = $descripcion;
    }

    // public function setIDUsuario($idUsuario);
    // {
    //   return $this->idUsuario = $idUsuario;
    // }

    function guardarProducto($miUsuario)
    {
    	if ($_FILES["uploaded-product"]["error"] == UPLOAD_ERR_OK)
    	{
    		$tmp_name = $_FILES['uploaded-product']['tmp_name'];
    		$path = $_FILES['uploaded-product']['name'];
    		$extention = pathinfo($path, PATHINFO_EXTENSION);

    		$miArchivo = dirname(__FILE__);
    		$miArchivo = $miArchivo . "/uploads/products/";
    		$miArchivo = $miArchivo . $path . "." . $extention;

    		move_uploaded_file($tmp_name, $miArchivo);
    	}
    }

    public function guardarImagen()
    {
      if ($_FILES["imagen"]["error"] == UPLOAD_ERR_OK)
      {
        // No hubo errores :slightly_smiling_face:
        $path = $_FILES['imagen']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);

        $miArchivo = dirname(__FILE__);
        $miArchivo = $miArchivo . "/uploads/avatars/";
        $miArchivo = $miArchivo . $this->getId() . "." . $ext;

        move_uploaded_file($_FILES["imagen"]["tmp_name"], $miArchivo);
      }
    }
}
