<?php
require_once 'auth.php';

class Follower
{
  private $id;
  private $id_follower;
  private $id_following;


  public function __construct(Array $follower)
  {
    $this->id = array_key_exists("id", $follower) ? $follower["id"] : null;
    $auth = Auth::getInstance();
    $usuarioLogueado = $auth->getUsuarioLogueado();
    $this->id_follower = $usuarioLogueado->getId();
    $this->id_following = $follower['id_following'];
    // $this->id_following = array_key_exists("id_following", $follower) ? $follower["id_following"] : null;
  }

  public function getId(){

    return $this->id;
  }

  public function getId_Follower()
  {
    return $this->id_follower;
  }

  public function getId_following()
  {
    return $this->id_following;
  }

  public function setId($id){
    return $this->id;
  }

  public function setId_Follower($follower)
  {
    $this->id_follower = $id_follower;
  }

  public function setId_Following($following)
  {
    $this->id_following = $id_following;
  }

}
