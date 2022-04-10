<?php
namespace App\Controllers;

use App\Entity\Animal;
use App\Models\AnimalModel;
use App\Models\CustomerModel;
use App\Models\VeterinarianModel;
use App\Models\VeterinaryCareModel;
use App\Controllers\SaveImageTrait;
use App\Controllers\AbstractController;

class AnimalController extends AbstractController
{
	use SaveImageTrait;

	public function index($request)
	{
		$animalModel = $this->_container->get(AnimalModel::class);
		$animals = $animalModel->getAll();

		$this->render('animal/listAnimal.twig', [
			'animals' => $animals
		]);
	}

	public function show($request)
	{
		$animalModel = $this->_container->get(AnimalModel::class);
		$animal = $animalModel->getOne($request['id']);

		$veterinaryCareModel = $this->_container->get(VeterinaryCareModel::class);
		$veterinaryCares = $veterinaryCareModel->getAllByAnimal($animal->getId());

		$this->render('animal/singleAnimal.twig', [
			'animal' => $animal,
			'veterinaryCares' => $veterinaryCares
		]);
	}

	public function new($request)
	{
		if(isset($request['name'])){

			if(($_FILES['image']) && $_FILES['image']['error'] == 0) {
				$imgPath = $this->saveImage($_FILES['image'], 'animals/');
			}
			
			$animal = new Animal(
				_id: $this->generateUuid(),
				_name: $request['name'] ?? '',
				_birthDate: new \DateTime($request['birthDate']) ?? null,
				_species: $request['species'] ?? '',
				_firstVisit: new \DateTime($request['firstVisit']) ?? null,
				_gender: $request['gender'] ?? null,
				_imagePath: $imgPath ?? null,
				_treatment: $request['treatment'] ?? null,
				_favoriteVeterinarianId: $request['favoriteVeterinarian'] ?: null,
				_ownerId: $request['owner'] ?: null,
				_deathDate: new \DateTime($request['deathDate']) ?? null,
				_informations: $request['informations'] ?? null
			);
	
			$animalModel = $this->_container->get(AnimalModel::class);
			$r = $animalModel->create($animal);
			if($r) {
				$this->_router->CallRoute('animal', ['id' => $animal->getId()]);
				return;
			}
		}

		$customerModel = $this->_container->get(CustomerModel::class);
		$customers = $customerModel->getAll();

		$veterinarianModel = $this->_container->get(VeterinarianModel::class);
		$veterinarians = $veterinarianModel->getAllActive();

		$this->render('animal/newAnimal.twig', [
			'customers' => $customers,
			'veterinarians' => $veterinarians
		]);
	}

	public function update($request)
	{
		$animalModel = $this->_container->get(AnimalModel::class);
		$oldAnimal = $animalModel->getOne($request['id']);

		if(isset($request['name'])){

			if(($_FILES['image']) && $_FILES['image']['error'] == 0) {
				if($oldAnimal->getImagePath()) {
					$this->removeImage( $oldAnimal->getImagePath() );
				}
				$imgPath = $this->saveImage($_FILES['image'], 'animals/');
			}
			
			$animal = new Animal(
				_id: $request['id'],
				_name: $request['name'] ?? '',
				_birthDate: new \DateTime($request['birthDate']) ?? null,
				_species: $request['species'] ?? '',
				_firstVisit: new \DateTime($request['firstVisit']) ?? null,
				_gender: $request['gender'] ?? null,
				_imagePath: $imgPath ?? null,
				_treatment: $request['treatment'] ?? null,
				_favoriteVeterinarianId: $request['favoriteVeterinarian'] ?: null,
				_ownerId: $request['owner'] ?: null,
				_deathDate: new \DateTime($request['deathDate']) ?? null,
				_informations: $request['informations'] ?? null
			);

			$r = $animalModel->update($animal);
			if($r) {
				$this->_router->CallRoute('animal', ['id' => $animal->getId()]);
				return;
			}
		}

		$customerModel = $this->_container->get(CustomerModel::class);
		$customers = $customerModel->getAll();

		$veterinarianModel = $this->_container->get(VeterinarianModel::class);
		$veterinarians = $veterinarianModel->getAllActive();

		$this->render('animal/updateAnimal.twig', [
			'oldAnimal' => $oldAnimal,
			'customers' => $customers,
			'veterinarians' => $veterinarians
		]);
	}
}
