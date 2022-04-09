<?php
namespace App\Controllers;

use App\Entity\Veterinarian;
use App\Models\VeterinarianModel;
use App\Controllers\SaveImageTrait;
use App\Controllers\AbstractController;
use App\Models\VeterinaryPracticeModel;

class VeterinarianController extends AbstractController
{
	use SaveImageTrait;

	public function index(): void
	{
		$veterinarianModel = $this->_container->get(VeterinarianModel::class);
		$veterinarians = $veterinarianModel->getAll();
		$this->render('veterinarian/listVeterinarian.twig', ['veterinarians' => $veterinarians]);
	}

	public function show(array $request): void
	{
		$veterinarianModel = $this->_container->get(VeterinarianModel::class);
		$veterinarian = $veterinarianModel->getOne($request['id']);
		$this->render('veterinarian/singleVeterinarian.twig', ['veterinarian' => $veterinarian]);
	}

	public function new(array $request): void
	{
		$veterinarianModel = $this->_container->get(VeterinarianModel::class);

		if (!empty($request)){

			if(($_FILES['image']) && $_FILES['image']['error'] == 0) {
				$imgPath = $this->saveImage($_FILES['image'], 'veterinarians/');
			}

			$veterinarian = new Veterinarian(
				_id: $this->generateUuid(),
				_firstname: $request['firstname'] ?? '',
				_lastname: $request['lastname'] ?? '',
				_address: $request['address'] ?? '',
				_phoneNumber: $request['phoneNumber'] ?? '',
				_email: $request['email'] ?? '',
				_informations: $request['informations'] ?? '',
				_gender: $request['gender'] ?? null,
				_imagePath: $imgPath ?? '',
				_speciality: $request['speciality'] ?? null,
				_veterinaryPracticeId: $request['veterinaryPracticeId'] ?? null,
				_upperHierarchyId: $request['upperHierarchyId'] ?? null,
				_entryDate: new \DateTime($request['entryDate']) ?? null,
				_exitDate: new \DateTime($request['exitDate']) ?? null,
				_carePerDay: (int) $request['carePerDay'] ?? null,
			);
	
			$r = $veterinarianModel->create($veterinarian);
			if($r) {
				$this->_router->CallRoute('veterinarian', [
					'id' => $veterinarian->getId()
				]);
				return;
			}
		}

		$veterinaryPracticeModel = $this->_container->get(VeterinaryPracticeModel::class);
		$veterinaryPractices = $veterinaryPracticeModel->getAll();

		$veterinarians = $veterinarianModel->getAllActive();

		$this->render('veterinarian/newVeterinarian.twig', [
			'veterinaryPractices' => $veterinaryPractices,
			'veterinarians' => $veterinarians,
		]);
	}
}
