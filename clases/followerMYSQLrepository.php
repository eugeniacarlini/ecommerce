<?php
require_once ("soporte.php");
require_once ("spectsProduct.php");
require_once("follower.php?>");
class FollowerMYSQLrepository {

	private $miConexion;

	public function __construct($miConexion)
	{
		$this->miConexion = $miConexion;
	}


public function guardarFollower(Follower $follower)
{
  if ($follower->getId())
  {
    if ($this->getProductoById($follower->getId()))
    {
      $stmt = $this->miConexion->prepare("UPDATE user_follow SET follower = :follower, following = :following WHERE id = :id");
    }
    else
    {
      $stmt = $this->miConexion->prepare("INSERT INTO user_follow (id, follower, following) values (:id, :follower, :following)");
    }

    $stmt->bindValue(":id", $follower->getId());

  }
  else
  {
    $stmt = $this->miConexion->prepare("INSERT INTO user_follow (id, follower, following) values (:id, :follower, :following)");
  }


  $stmt->bindValue(":follower", $follower->get());
  $stmt->bindValue(":following", $follower->());
  $stmt->execute();
}
