<?php
require_once ("soporte.php");

class FollowerMYSQLrepository {

	private $miConexion;

	public function __construct($miConexion)
	{
		$this->miConexion = $miConexion;
	}


	public function guardarFollower(Follower $follower)
	{
		// var_dump($follower);exit;
		if ($follower->getId())
		{
			if ($this->getUsuarioById($follower->getId()))
			{
				$stmt = $this->miConexion->prepare("UPDATE Followers SET id_follower = :id_follower, id_following = :id_following WHERE id = :id");
			}else{

				$stmt = $this->miConexion->prepare("INSERT INTO Followers (id_follower, id_following) values (:id_follower, :id_following)");
			}

			$stmt->bindValue(":id", $follower->getId());

		}
		else
		{
			$stmt = $this->miConexion->prepare("INSERT INTO Followers (id_follower, id_following) values (:id_follower, :id_following)");
		}


		$stmt->bindValue(":id_follower", $follower->getId_Follower());
		$stmt->bindValue(":id_following", $follower->getId_following());

		$stmt->execute();

	}
}
