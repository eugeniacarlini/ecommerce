<?php
require_once ("soporte.php");

class FollowerMYSQLrepository {

	private $miConexion;

	public function __construct($miConexion)
	{
		$this->miConexion = $miConexion;
	}


	 public function removeFriend($idFollowing)
	 {

		 $stmt = $this->miConexion->prepare("DELETE FROM Followers WHERE idFollowing ='$idFollowing'");

			$stmt->bindValue(":idFollowing", $idFollowing);

			$stmt->execute();
	 }

	public function mostrarFollower($idFollowing)
	{
		$stmt = $this->miConexion->prepare("SELECT count(*) as total from Followers where idFollowing = idFollowing");

		$stmt->bindValue(":idFollowing", $idFollowing);

		$stmt->execute();

		$seguidores = $stmt->fetch();

		return $seguidores;
	}

	public function guardarFollower(Follower $follower)
	{
		if ($follower->getId())
		{
			if ($this->getUsuarioById($follower->getId_Follower()))
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
