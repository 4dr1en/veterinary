<?php

namespace App\Models;

use App\Entity\Veterinarian;
use App\Models\AbstractModel;
use PDO;

class VeterinarianModel extends AbstractModel
{
	/**
	 * Get all veterinarians
	 * 
	 * @return array
	 */
	public function getAll(): array
	{
		$query = $this->_pdo->prepare('SELECT * FROM Veterinarian');
		$query->execute();
		$veterinariansData = $query->fetchAll();
		$veterinarians = [];

		foreach ($veterinariansData as $veterinarianData) {
			$veterinarians[] = $this->populate($veterinarianData);
		}

		return $veterinarians;
	}

	/**
	 * Get all active veterinarian
	 * 
	 * @return array
	 */
	public function getAllActive(): array
	{
		$query = $this->_pdo->prepare("
			SELECT * FROM Veterinarian
			WHERE exit_date IS NULL;
		");
		$query->execute();
		$veterinariansData = $query->fetchAll();
		$veterinarians = [];

		foreach ($veterinariansData as $veterinarianData) {
			$veterinarians[] = $this->populate($veterinarianData);
		}

		return $veterinarians;
	}

	/**
	 * Get a veterinarian by id
	 *
	 * @param string $id
	 * @return Veterinarian|null
	 */
	public function getOne(string $id): ?Veterinarian
	{
		$query = $this->_pdo->prepare('SELECT * FROM Veterinarian WHERE id = :id');
		$query->bindValue(':id', $id, PDO::PARAM_STR);
		$query->execute();

		$veterinarian = $this->populate($query->fetch());

		return $veterinarian;
	}

	/**
	 * Create a new veterinarian in the database
	 *
	 * @param Veterinarian $veterinarian
	 * @return bool
	 */
	public function create(Veterinarian $veterinarian): bool
	{
		$query = $this->_pdo->prepare('
			INSERT INTO Veterinarian (
				id, 
				firstname,
				lastname,
				address,
				gender,
				entry_date,
				phone_number,
				email,
				image_path,
				speciality,
				veterinary_practice_id,
				upper_hierarchy_id,
				exit_date,
				care_per_day,
				informations
			) VALUES (
				:id,
				:firstname,
				:lastname,
				:address,
				:gender,
				:entry_date,
				:phone_number,
				:email,
				:image_path,
				:speciality,
				:veterinary_practice_id,
				:upper_hierarchy_id,
				:exit_date,
				:care_per_day,
				:informations
			);
		');

		$query->bindValue(':id', $veterinarian->getId(), PDO::PARAM_STR);
		$query->bindValue(':firstname', $veterinarian->getFirstname(), PDO::PARAM_STR);
		$query->bindValue(':lastname', $veterinarian->getLastname(), PDO::PARAM_STR);
		$query->bindValue(':address', $veterinarian->getAddress(), PDO::PARAM_STR);
		$query->bindValue(':gender', $veterinarian->getGender(), PDO::PARAM_BOOL);
		$query->bindValue(':entry_date', $veterinarian->getEntryDate()?->format( 'Y-m-d H:i:s') ?: null);
		$query->bindValue(':phone_number', $veterinarian->getPhoneNumber(), PDO::PARAM_STR);
		$query->bindValue(':email', $veterinarian->getEmail(), PDO::PARAM_STR);
		$query->bindValue(':image_path', $veterinarian->getImagePath(), PDO::PARAM_STR);
		$query->bindValue(':speciality', $veterinarian->getSpeciality(), PDO::PARAM_STR);
		$query->bindValue(':veterinary_practice_id', $veterinarian->getVeterinaryPracticeId(), PDO::PARAM_STR);
		$query->bindValue(':upper_hierarchy_id', $veterinarian->getUpperHierarchyId(), PDO::PARAM_STR);
		$query->bindValue(':exit_date', $veterinarian->getExitDate()?->format( 'Y-m-d H:i:s') ?: null, PDO::PARAM_STR);
		$query->bindValue(':care_per_day', $veterinarian->getCarePerDay(), PDO::PARAM_STR);
		$query->bindValue(':informations', $veterinarian->getInformations(), PDO::PARAM_STR);

		return $query->execute();
	}

	/**
	 * Create a new veterinarian object from a database row
	 * 
	 * @param array $data
	 * @return Veterinarian|null
	 */
	protected function populate($data): ?Veterinarian
	{
		if (empty($data)) {
			return null;
		}

		$veterinarian = new Veterinarian(
			$data['id'],
			$data['firstname'],
			$data['lastname'],
			$data['address'],
			$data['phone_number'],
			$data['email'],
			$data['informations'],
			$data['gender'],
			$data['image_path'],
			$data['speciality'],
			$data['veterinary_practice_id'],
			$data['upper_hierarchy_id'],
			$data['entry_date'] ? new \DateTime($data['entry_date']) : null,
			$data['exit_date'] ? new \DateTime($data['exit_date']) : null,
			$data['care_per_day']
		);

		return $veterinarian;
	}
}
