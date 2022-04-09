<?php

namespace App\Models;

use App\Entity\VeterinaryPractice;
use App\Models\AbstractModel;
use PDO;

class VeterinaryPracticeModel extends AbstractModel
{
	public function getAll(): ?array
	{
		$query = $this->_pdo->prepare('SELECT * FROM Veterinary_practice');
		$query->execute();
		$veterinaryPracticesData = $query->fetchAll();
		$veterinaryPractices = [];

		foreach ($veterinaryPracticesData as $veterinaryPracticeData) {
			$veterinaryPractices[] = $this->populate($veterinaryPracticeData);
		}

		return $veterinaryPractices;
	}

	public function getOne(string $id): ?VeterinaryPractice
	{
		$query = $this->_pdo->prepare('SELECT * FROM Veterinary_practice WHERE id = :id');
		$query->bindValue(':id', $id, PDO::PARAM_STR);
		$query->execute();

		$veterinaryPractice = $this->populate($query->fetch());

		return $veterinaryPractice;
	}

	protected function populate($data): ?VeterinaryPractice
	{
		if (empty($data)) {
			return null;
		}

		$veterinaryPractice = new VeterinaryPractice(
			$data['id'],
			$data['name'],
			$data['address']
		);

		return $veterinaryPractice;
	}
}