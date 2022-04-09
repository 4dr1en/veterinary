<?php

namespace App\Models;

use PDO;
use App\Entity\Room;
use Utils\ContainerManager;
use App\Models\AbstractModel;

class RoomModel extends AbstractModel
{
	/**
	 * Get all rooms
	 *
	 * @return  array
	 */
	public function getAll(): array
	{
		$query = $this->_pdo->prepare('SELECT * FROM Room');
		$query->execute();
		$roomsData = $query->fetchAll();
		$rooms = [];

		foreach ($roomsData as $roomData) {
			$rooms[] = $this->populate($roomData);
		}

		return $rooms;
	}

	/**
	 * Get a room by its id
	 *
	 * @param  string $id
	 * @return  Room|null
	 */
	public function getOne(string $id): ?Room
	{
		$query = $this->_pdo->prepare('
			SELECT * FROM Room
			WHERE id = :id
		');
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->bindValue(':id', $id, \PDO::PARAM_STR);
		$query->execute();

		$room = $this->populate($query->fetch());

		return $room;
	}

	/**
	 * Create a room object from a row
	 *
	 * @param  Room $room
	 * @return  Room
	 */
	private function populate(array $data): Room
	{
		if (empty($data)) {
			return null;
		}

		$veterinaryPractice = null;
		if(isset($data['veterinary_practice_id'])){
			$container = ContainerManager::getContainer();
			$veterinaryPracticeModel = $container->get(VeterinaryPracticeModel::class);
			$veterinaryPractice = $veterinaryPracticeModel->getOne($data['veterinary_practice_id']);
		}

		$room = new Room(
			_id: $data['id'],
			_name: $data['name'],
			_speciality: $data['speciality'],
			_veterinaryPracticeId: $data['veterinary_practice_id'],
			_veterinaryPractice: $veterinaryPractice
		);

		return $room;
	}

	/**
	 * Set an room in the database
	 *
	 * @param  Room $room
	 * @return bool
	 */
	public function create(Room $animal): bool
	{
		$query = $this->_pdo->prepare('
			INSERT INTO Room(
				name,
				speciality,
				veterinary_practices_id
			) VALUES (
				:name,
				:speciality,
				:veterinaryPracticesId
			);
		');

		$query->bindValue(':name', $animal->getName());
		$query->bindValue(':speciality', $animal->getSpeciality());
		$query->bindValue(':veterinaryPracticesId', $animal->getVeterinaryPracticeId());

		return $query->execute();
	}

	/**
	 * Update an room
	 *
	 * @param  Room $room
	 * @return bool
	 */
	public function update(Room $room): bool
	{
		$query = $this->_pdo->prepare('
			UPDATE room SET
				name = :name,
				speciality = :speciality,
				veterinary_practices_id = :veterinaryPracticesId
			WHERE id = :id
		');

		$query->bindValue(':name', $room->getName());
		$query->bindValue(':speciality', $room->getSpeciality());
		$query->bindValue(':veterinaryPracticesId', $room->getVeterinaryPracticeId());

		return $query->execute();
	}
}
