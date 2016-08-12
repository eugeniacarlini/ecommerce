<?php

require_once("userRepository.php");

class Validar {

  private $userRepository;
	private static $instance = null;

	public static function getInstance(UserRepository $userRepository)
    {
        if (Validar::$instance === null) {
            Validar::$instance = new Validar();
            Validar::$instance->setUserRepository($userRepository);
        }

        return Validar::$instance;
    }

    private function setUserRepository(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

	private function __construct() {

	}

    public function validarUsuario($miUsuario)
    {
        $errores = [];

        if (trim($miUsuario["nombre"]) == "")
        {
            $errores[] = "Por favor complete el nombre";
        }
        if (trim($miUsuario["apellido"]) == "")
        {
            $errores[] = "Por favor complete el apellido";
        }
        if ($miUsuario["mail"] == "" )
        {
            $errores[] = "Por favor complete el email";
        }
        elseif (!filter_var($miUsuario["mail"], FILTER_VALIDATE_EMAIL))
        {
            $errores[] = "Por favor introduzca un email válido";
        }
        if (trim($miUsuario["password"]) == "")
        {
            $errores[] = "Por favor complete la contraseña";
        }
        if (trim($miUsuario["cpass"]) == "")
        {
            $errores[] = "Por favor confirme la contraseña";
        }
        if ($miUsuario["password"] != $miUsuario["cpass"])
        {
            $errores[] = "Las contraseñas son distintas";
        }
        if (in_array($miUsuario["sexo"], array("", "Femenino", "Masculino")) == "")
        {
            $errores[] = "Por favor elija un sexo";
        }
        if ($this->userRepository->existeElMail($miUsuario["mail"]))
        {
            $errores[] = "Usuario ya registrado";
        }
        return $errores;
    }

    public function validarEditarUsuario($miUsuario)
    {
      $errores = [];

      if (trim($miUsuario["nombre"]) == "")
      {
          $errores[] = "Por favor complete el nombre";
      }
      if (trim($miUsuario["apellido"]) == "")
      {
          $errores[] = "Por favor complete el apellido";
      }
      if ($miUsuario["mail"] == "" )
      {
          $errores[] = "Por favor complete el email";
      } elseif (!filter_var($miUsuario["mail"], FILTER_VALIDATE_EMAIL))
      {
          $errores[] = "Por favor introduzca un email válido";
      }
      if (in_array($miUsuario["sexo"], array("", "Femenino", "Masculino")) == "")
      {
          $errores[] = "Por favor elija un sexo";
      }
      // if ($this->userRepository->existeElMail($miUsuario["mail"]))
      // {
      //     $errores[] = "Usuario ya registrado";
      // }
      return $errores;
    }

    public function validarLogin()
    {
      $errores = [];

      if (trim($_POST["mail"]) == "") {
          $errores[] = "No pusiste email";
      } else if (!$this->userRepository->existeElMail($_POST["mail"])) {
          $errores[] = "El mail no existe";
      } else if (!$this->userRepository->usuarioValido($_POST["mail"], $_POST["password"])) {
          $errores [] = "El usuario no es valido";
      }

      if (trim($_POST["password"]) == "") {
          $errores[] = "No pusiste contrase&ntilde;a";
      }

      return $errores;
    }


    public function validarProducto($miProducto)
    {
      $erroresProduct = [];

      if (trim($miProducto["titulo"]) == "")
      {
          $errores[] = "Por favor ingrese el título";
      }
      if (trim($miProducto["descripcion"]) == "")
      {
          $errores[] = "Por favor ingrese la descripción";
      }
      if (trim($miProducto["price"]) == "")
      {
          $errores[] = "Por favor ingrese el precio";
      }
      if ($miProducto["category"] == "")
      {
          $errores[] = "Por favor seleccione alguna categoría";
      }

      return $errores;
    }
}
