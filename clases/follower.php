<?php
require_once 'auth.php';


class Follower
{
  private $id;
  private $id_follower;
  private $id_following;

  function __construct(Array $miFollower)
  {
    $auth = Auth::getInstance();
    $usuarioLogueado = $auth->getUsuarioLogueado();
    $this->id_follower = $usuarioLogueado->getId();
    $this->id_following = $miproducto["id_Usuario"];
  }

  public function getId_Follower()
  {
    return $this->id_follower;
  }

  public function getId_following()
  {
    return $this->id_following;
  }

  public function setId_Follower()
  {
    return $this->id_follower = $id_follower;
  }

  public function setId_Following()
  {
    return $this->id_following = $id_following;
  }

}
