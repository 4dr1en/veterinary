<?php

Namespace App\Models;

use \PDO;

abstract class AbstractModel
{
	protected PDO $_pdo;

	public function __construct(PDO $pdo)
	{
		$this->_pdo = $pdo;
	}
}