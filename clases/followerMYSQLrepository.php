<?php
require_once ("soporte.php");

class FollowerMYSQLrepository {

	private $miConexion;

	public function __construct($miConexion)
	{
		$this->miConexion = $miConexion;
	}

	public function mostrarFollower($idfollowing)
	{
		$stmt = $this->miConexion->prepare("SELECT COUNT(*), idFollowing FROM Followers WHERE `idfollower` = $idfollowing group by idFollowing ");

		var_dump($stm);exit;
		$stmt->bindValue(":idFollowing", $idfollowing);
		$stmt->bindValue(":idFollower", $idfollower);

		$stmt->execute();

		$seguidores = $stmt->fetch();
		return $seguidores;
	}

	public function guardarFollower(Follower $follower)
	{
		if ($follower->getId())
		{
			if ($this->getUsuarioById($follower->getId()))
			{
				$stmt = $this->miConexion->prepare("UPDATE Followers SET idFollower = :idFollower, idFollowing = :idFollowing WHERE id = :id");
			}else{

				$stmt = $this->miConexion->prepare("INSERT INTO Followers (idFollower, idFollowing) values (:idFollower, :idFollowing)");
			}

			$stmt->bindValue(":id", $follower->getId());

		}
		else
		{
			$stmt = $this->miConexion->prepare("INSERT INTO Followers (idFollower, idFollowing) values (:idFollower, :idFollowing)");
		}


		$stmt->bindValue(":idFollower", $follower->getId_Follower());
		$stmt->bindValue(":idFollowing", $follower->getId_following());

		$stmt->execute();


	}
}
