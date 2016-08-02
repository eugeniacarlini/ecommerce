<?php

require_once("auth.php");

class Producto {
    private $id;
    private $titulo;
    private $precio;
    private $categoria;
    private $descripcion;
    private $idUsuario;

    public function __construct(Array $miproducto)
    {
      $auth = Auth::getInstance();
      $usuarioLogueado = $auth->getUsuarioLogueado();
      $this->id = array_key_exists("id", $miproducto) ? $miproducto["id"] : null;
      $this->titulo = $miproducto["titulo"];
      $this->precio = $miproducto["precio"];
      $this->categoria = $miproducto["categoria"];
      $this->descripcion = $miproducto["descripcion"];
      $this->idUsuario = array_key_exists("idUsuario", $miproducto) ? $miproducto["idUsuario"]: $usuarioLogueado->getId();
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


    public function setCategoria($categoria)
    {
      return $this->categoria = $categoria;
    }

    public function setDescripcion($descripcion)
    {
      return $this->descripcion = $descripcion;
    }

    public function setidUsuario($idUsuario)
    {
      return $this->idUsuario = $idUsuario;
    }


    public function guardarImagenProducto()
    {

      if ($_FILES["imagen-producto"]["error"] == UPLOAD_ERR_OK)
      {
        // No hubo errores :slightly_smiling_face:
        $path = $_FILES['imagen-producto']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);

        $miArchivo = dirname(__FILE__) . '/../uploads/products/';
        $miArchivo = $miArchivo . $this->getId() . "." . $ext;
        move_uploaded_file($_FILES["imagen-producto"]["tmp_name"], $miArchivo);
      }
    }
}
