<?php
require_once "soporte.php"


class FollowerMYSQLrepository extends {

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

  $stmt->bindValue(":id", $follower->());
  $stmt->bindValue(":follower", $follower->());
  $stmt->bindValue(":following", $follower->());


  $stmt->execute();
}
