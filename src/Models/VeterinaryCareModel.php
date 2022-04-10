<?php
namespace App\Models;

use PDO;
use \DateTime;
use Utils\ContainerManager;
use App\Models\RoomModel;
use App\Models\AnimalModel;
use App\Models\AbstractModel;
use App\Entity\VeterinaryCare;
use App\Models\VeterinarianModel;

class VeterinaryCareModel extends AbstractModel
{
	/**
	 * Get all veterinary cares
	 */
	public function getAll(): ?array
	{
		$query = $this->_pdo->prepare('SELECT * FROM Veterinary_care');
		$query->execute();
		$veterinaryCaresData = $query->fetchAll();
		$veterinaryCares = [];

		foreach ($veterinaryCaresData as $veterinaryCareData) {
			$veterinaryCares[] = $this->populate($veterinaryCareData);
		}

		return $veterinaryCares;
	}

	/**
	 * Get a veterinary care by id
	 *
	 * @param string $id
	 * @return VeterinaryCare|null
	 */
	public function getOne(string $id): ?VeterinaryCare
	{
		$query = $this->_pdo->prepare('SELECT * FROM Veterinary_care WHERE id = :id');
		$query->bindValue(':id', $id, PDO::PARAM_STR);
		$query->execute();

		$veterinaryCare = $this->populate($query->fetch());

		return $veterinaryCare;
	}

	/**
	 * Get all veterinary cares by animal id
	 * 
	 * @param string $id
	 * @return array
	 */
	public function getAllByAnimal(string $id): ?array
	{
		$query = $this->_pdo->prepare('SELECT * FROM Veterinary_care WHERE animal_id = :id');
		$query->bindValue(':id', $id, PDO::PARAM_STR);
		$query->execute();
		$veterinaryCaresData = $query->fetchAll();
		$veterinaryCares = [];

		foreach ($veterinaryCaresData as $veterinaryCareData) {
			$veterinaryCares[] = $this->populate($veterinaryCareData);
		}

		return $veterinaryCares;
	}

	/**
	 * Get the last veterinary care
	 * 
	 * @return VeterinaryCare|null
	 */
	public function getLast(): ?VeterinaryCare
	{
		$query = $this->_pdo->prepare('SELECT * FROM Veterinary_care ORDER BY id DESC LIMIT 1');
		$query->execute();

		$veterinaryCare = $this->populate($query->fetch());

		return $veterinaryCare;
	}

	/**
	 * Create a new veterinary care in the database
	 *
	 * @param VeterinaryCare $veterinaryCare
	 * @return bool
	 */
	public function create(VeterinaryCare $veterinaryCare): bool
	{
		$query = $this->_pdo->prepare('
			INSERT INTO Veterinary_care (
				id, 
				name,
				animal_id,
				veterinarian_id,
				room_id,
				start_date,
				end_date,
				price,
				is_paid,
				informations
			) VALUES (
				:id, 
				:name,
				:animal_id,
				:veterinarian_id,
				:room_id,
				:start_date,
				:end_date,
				:price,
				:is_paid,
				:informations
			)
		');
		$query->bindValue(':id', $veterinaryCare->getId(), PDO::PARAM_STR);
		$query->bindValue(':name', $veterinaryCare->getName(), PDO::PARAM_STR);
		$query->bindValue(':animal_id', $veterinaryCare->getAnimalId(), PDO::PARAM_STR);
		$query->bindValue(':veterinarian_id', $veterinaryCare->getVeterinarianId(), PDO::PARAM_STR);
		$query->bindValue(':room_id', $veterinaryCare->getRoomId(), PDO::PARAM_INT);
		$query->bindValue(':start_date', $veterinaryCare->getStartDate()?->format( 'Y-m-d H:i:s')?: null);
		$query->bindValue(':end_date', $veterinaryCare->getEndDate()?->format( 'Y-m-d H:i:s')?: null);
		$query->bindValue(':price', $veterinaryCare->getPrice(), PDO::PARAM_STR);
		$query->bindValue(':is_paid', $veterinaryCare->getIsPaid(), PDO::PARAM_BOOL);
		$query->bindValue(':informations', $veterinaryCare->getInformations(), PDO::PARAM_STR);

		return $query->execute();
	}

	/**
	 * Update a veterinary care in the database
	 *
	 * @param VeterinaryCare $veterinaryCare
	 * @return bool
	 */
	public function update(VeterinaryCare $veterinaryCare): bool
	{
		$query = $this->_pdo->prepare('
			UPDATE Veterinary_care SET
				name = :name,
				animal_id = :animal_id,
				veterinarian_id = :veterinarian_id,
				room_id = :room_id,
				start_date = :start_date,
				end_date = :end_date,
				price = :price,
				is_paid = :is_paid,
				informations = :informations
			WHERE id = :id
		');
		$query->bindValue(':id', $veterinaryCare->getId(), PDO::PARAM_STR);
		$query->bindValue(':name', $veterinaryCare->getName(), PDO::PARAM_STR);
		$query->bindValue(':animal_id', $veterinaryCare->getAnimalId(), PDO::PARAM_STR);
		$query->bindValue(':veterinarian_id', $veterinaryCare->getVeterinarianId(), PDO::PARAM_STR);
		$query->bindValue(':room_id', $veterinaryCare->getRoomId(), PDO::PARAM_INT);
		$query->bindValue(':start_date', $veterinaryCare->getStartDate()?->format( 'Y-m-d H:i:s')?: null);
		$query->bindValue(':end_date', $veterinaryCare->getEndDate()?->format( 'Y-m-d H:i:s')?: null);
		$query->bindValue(':price', $veterinaryCare->getPrice(), PDO::PARAM_STR);
		$query->bindValue(':is_paid', $veterinaryCare->getIsPaid(), PDO::PARAM_BOOL);
		$query->bindValue(':informations', $veterinaryCare->getInformations(), PDO::PARAM_STR);

		return $query->execute();
	}

	/**
	 * Populate a veterinary care object with data from the database
	 * 
	 * @param array $veterinaryCareData
	 * @return VeterinaryCare
	 */

	private function populate(array $veterinaryCareData): VeterinaryCare
	{

		$animal = null;
		if(isset($veterinaryCareData['animal_id'])) {
			$container = ContainerManager::getContainer();
			$animalModel = $container->get(AnimalModel::class);
			$animal = $animalModel->getOne($veterinaryCareData['animal_id']);
		}

		$veterinarian = null;
		if(isset($veterinaryCareData['veterinarian_id'])) {
			$container = ContainerManager::getContainer();
			$veterinarianModel = $container->get(VeterinarianModel::class);
			$veterinarian = $veterinarianModel->getOne($veterinaryCareData['veterinarian_id']);
		}

		$room = null;
		if(isset($veterinaryCareData['room_id'])) {
			$container = ContainerManager::getContainer();
			$roomModel = $container->get(RoomModel::class);
			$room = $roomModel->getOne($veterinaryCareData['room_id']);
		}

		$veterinaryCare = new VeterinaryCare(
			_id: $veterinaryCareData['id'],
			_name: $veterinaryCareData['name'],
			_animalId: $veterinaryCareData['animal_id'],
			_veterinarianId: $veterinaryCareData['veterinarian_id'],
			_roomId: $veterinaryCareData['room_id'],
			_startDate: $veterinaryCareData['start_date'] ? new DateTime($veterinaryCareData['start_date']) : null,
			_endDate: $veterinaryCareData['end_date'] ? new DateTime($veterinaryCareData['end_date']) : null,
			_price: $veterinaryCareData['price'],
			_isPaid: $veterinaryCareData['is_paid'],
			_informations: $veterinaryCareData['informations'],
			_animal: $animal,
			_veterinarian: $veterinarian,
			_room: $room
		);

		return $veterinaryCare;
	}
}