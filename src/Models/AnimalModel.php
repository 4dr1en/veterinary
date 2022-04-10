<?php

namespace App\Models;

use PDO;
use Utils\ContainerManager;
use App\Entity\Animal;
use App\Models\AbstractModel;

class AnimalModel extends AbstractModel
{
	/**
	 * Get all animals
	 *
	 * @return  array
	 */
	public function getAll(): array
	{
		$query = $this->_pdo->prepare(
			'SELECT Animal.*, sum(Veterinary_care.price) as turnover
			FROM Animal
			LEFT JOIN Veterinary_care ON Animal.id = Veterinary_care.animal_id
			GROUP BY Animal.id
		');
		$query->execute();
		$animalsData = $query->fetchAll();
		$animals = [];

		foreach ($animalsData as $animalData) {
			$animals[] = $this->populate($animalData);
		}

		return $animals;
	}

	/**
	 * Get all animals by customer
	 * 
	 * @param  int $customerId
	 * @return  array
	 */
	public function getAllByCustomer(int $customerId): array
	{
		$query = $this->_pdo->prepare(
			'SELECT Animal.*, sum(Veterinary_care.price) as turnover
			 FROM Animal
			 LEFT JOIN Veterinary_care ON Animal.id = Veterinary_care.animal_id
			WHERE Animal.owner_id = :customerId
			GROUP BY Animal.id
		');
		
		$query->execute([
			'customerId' => $customerId
		]);

		$animalsData = $query->fetchAll();
		$animals = [];

		foreach ($animalsData as $animalData) {
			$animals[] = $this->populate($animalData);
		}

		return $animals;
	}

	/**
	 * Get an animal by its id
	 *
	 * @param  string $id
	 * @return  Animal|null
	 */
	public function getOne(string $id): ?Animal
	{
		$query = $this->_pdo->prepare(
			'SELECT Animal.*, sum(Veterinary_care.price) as turnover
			FROM Animal
			LEFT JOIN Veterinary_care ON Animal.id = Veterinary_care.animal_id
			WHERE Animal.id = :id
		');
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->bindValue(':id', $id, \PDO::PARAM_STR);
		$query->execute();

		$animal = $this->populate($query->fetch());

		return $animal;
	}

	/**
	 * Create an animal object from a row
	 *
	 * @param  Animal $animal
	 * @return  Animal
	 */
	private function populate(array $data): Animal
	{
		if (empty($data)) {
			return null;
		}

		$favoriteVeterinarian = null;
		if (isset($data['favorite_veterinarian_id'])){
			$container = ContainerManager::getContainer();
			$veterinarianModel = $container->get(VeterinarianModel::class);
			$favoriteVeterinarian = $veterinarianModel->getOne($data['favorite_veterinarian_id']);
		}

		$owner = null;
		if(isset($data['owner_id'])){
			$container = ContainerManager::getContainer();
			$customerModel = $container->get(CustomerModel::class);
			$owner = $customerModel->getOne($data['owner_id']);
		}

		$animal = new Animal(
			_id: $data['id'],
			_name: $data['name'],
			_birthDate: $data['birth_date'] ? new \DateTime($data['birth_date']) : null,
			_species: $data['species'],
			_firstVisit: $data['first_visit'] ? new \DateTime($data['first_visit']) : null,
			_gender: $data['gender'],
			_imagePath: $data['image_path'],
			_treatment: $data['treatment'],
			_favoriteVeterinarianId: $data['favorite_veterinarian_id'],
			_ownerId: $data['owner_id'],
			_deathDate: $data['death_date'] ? new \DateTime($data['death_date']) : null,
			_informations: $data['informations'],
			_favoriteVeterinarian: $favoriteVeterinarian,
			_owner: $owner,
			_turnover: empty($data['turnover']) ? null : $data['turnover']
		);

		return $animal;
	}

	/**
	 * Set an animal in the database
	 *
	 * @param  Animal $animal
	 * @return bool
	 */
	public function create(Animal $animal): bool
	{
		$query = $this->_pdo->prepare('
			INSERT INTO Animal (
				id,
				name,
				birth_date,
				species,
				first_visit,
				gender,
				image_path,
				treatment,
				favorite_veterinarian_id,
				owner_id,
				death_date,
				informations
			) VALUES (
				:id,
				:name,
				:birth_date,
				:species,
				:first_visit,
				:gender,
				:image_path,
				:treatment,
				:favorite_veterinarian_id,
				:owner_id,
				:death_date,
				:informations
			);
		');

		$query->bindValue(':id', $animal->getId());
		$query->bindValue(':name', $animal->getName());
		$query->bindValue(':birth_date', $animal->getBirthDate()?->format( 'Y-m-d H:i:s') ?: null) ;
		$query->bindValue(':species', $animal->getSpecies());
		$query->bindValue(':first_visit', $animal->getFirstVisit()?->format( 'Y-m-d H:i:s') ?: null);
		$query->bindValue(':gender', $animal->getGender(), PDO::PARAM_BOOL);
		$query->bindValue(':image_path', $animal->getImagePath());
		$query->bindValue(':treatment', $animal->getTreatment());
		$query->bindValue(':favorite_veterinarian_id', $animal->getFavoriteVeterinarianId() ) ;
		$query->bindValue(':owner_id', $animal->getOwnerId());
		$query->bindValue(':death_date', $animal->getDeathDate()?->format( 'Y-m-d H:i:s')?: null);
		$query->bindValue(':informations', $animal->getInformations());

		return $query->execute();
	}

	/**
	 * Update an animal
	 *
	 * @param  Animal $animal
	 * @return bool
	 */
	public function update(Animal $animal): bool
	{
		$sql = '
			UPDATE Animal SET
				name = :name,
				birth_date = :birth_date,
				species = :species,
				first_visit = :first_visit,
				gender = :gender,
				treatment = :treatment,
				favorite_veterinarian_id = :favorite_veterinarian_id,
				owner_id = :owner_id,
				death_date = :death_date,
				informations = :informations,
		';
		if($animal->getImagePath()) {
			$sql .= 'image_path = :image_path,';
		}
		$sql .= '
				informations = :informations
			WHERE id = :id
		';
		$query = $this->_pdo->prepare($sql);

		$query->bindValue(':id', $animal->getId());
		$query->bindValue(':name', $animal->getName());
		$query->bindValue(':birth_date', $animal->getBirthDate()?->format( 'Y-m-d H:i:s') ?: null) ;
		$query->bindValue(':species', $animal->getSpecies());
		$query->bindValue(':first_visit', $animal->getFirstVisit()?->format( 'Y-m-d H:i:s') ?: null);
		$query->bindValue(':gender', $animal->getGender(), PDO::PARAM_BOOL);
		$query->bindValue(':treatment', $animal->getTreatment());
		$query->bindValue(':favorite_veterinarian_id', $animal->getFavoriteVeterinarianId() ) ;
		$query->bindValue(':owner_id', $animal->getOwnerId());
		$query->bindValue(':death_date', $animal->getDeathDate()?->format( 'Y-m-d H:i:s')?: null);
		$query->bindValue(':informations', $animal->getInformations());

		if($animal->getImagePath()) {
			$query->bindValue(':image_path', $animal->getImagePath());
		}

		return $query->execute();
	}
}
