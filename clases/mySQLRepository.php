<?php
require_once("userMySQLRepository.php");
require_once("productMySQLRepository.php");

class MySQLRepository {
	private $userRepository;
	private $connection;
	private $productRepository;

	public function __construct()
	{
		$this->connection = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', 'root');
  }

	public function getUserRepository()
	{
		if ($this->userRepository == null)
		{
			$this->userRepository = new UserMySQLRepository($this->connection);
		}

		return $this->userRepository;
	}

	public function getProductRepository()
  {
    if ($this->productRepository == null)
    {
      $this->productRepository = new ProductMySQLRepository($this->connection);
    }

    return $this->productRepository;
  }

	public function startTransaction()
	{
		$this->connection->beginTransaction();
	}

	public function commitTransaction()
	{
		$this->connection->commit();
	}

	public function rollBack()
	{
		$this->connection->rollBack();
	}
}
