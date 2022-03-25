<?php

Namespace App\Models;

abstract class AbstractModel
{
	private \PDO $_pdo;

	public function __construct(\PDO $pdo)
	{
		$this->_pdo = $pdo;
	}
}