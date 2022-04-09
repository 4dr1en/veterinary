<?php
namespace App\Controllers;

use App\Models\RoomModel;
use App\Models\AnimalModel;
use App\Entity\VeterinaryCare;
use App\Models\VeterinarianModel;
use App\Models\VeterinaryCareModel;
use App\Controllers\AbstractController;


class VeterinaryCareController extends AbstractController
{
	public function index(): void
	{
		$veterinaryCaresModel = $this->_container->get(VeterinaryCareModel::class);
		$veterinaryCares = $veterinaryCaresModel->getAll();

		$this->render('veterinaryCare/listVeterinaryCare.twig', [
			'veterinaryCares' => $veterinaryCares,
		]);
	}

	public function show(array $request): void
	{
		$veterinaryCareModel = $this->_container->get(VeterinaryCareModel::class);
		$veterinaryCare = $veterinaryCareModel->getOne($request['id']);

		$this->render('veterinaryCare/singleVeterinaryCare.twig', [
			'veterinaryCare' => $veterinaryCare,
		]);
	}

	public function new(array $request): void
	{
		$veterinaryCareModel = $this->_container->get(VeterinaryCareModel::class);

		if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($request)) {
			$veterinaryCare = new VeterinaryCare(
				_name: $request['name'] ?? null,
				_animalId: $request['animal'] ?? null,
				_veterinarianId: $request['veterinarian'] ?? null,
				_roomId: $request['room'] ?? null,
				_startDate: new \DateTime($request['startDate']) ?? null,
				_endDate: new \DateTime($request['endDate']) ?? null,
				_price: $request['price'] ? $request['price'] * 100 : null,
				_isPaid: $request['isPaid'] ?? false,
				_informations: $request['informations'] ?? null,
			);

			$r = $veterinaryCareModel->create($veterinaryCare);
			if($r) {
				$veterinaryCare = $veterinaryCareModel->getLast();
				$this->_router->CallRoute('veterinary-care', [
					'id' => $veterinaryCare->getId()
				]);
				return;
			}
		}

		$animalModel = $this->_container->get(AnimalModel::class);
		$animals = $animalModel->getAll();

		$veterinarianModel = $this->_container->get(VeterinarianModel::class);
		$veterinarians = $veterinarianModel->getAll();

		$roomModel = $this->_container->get(RoomModel::class);
		$rooms = $roomModel->getAll();

		$this->render('veterinaryCare/newVeterinaryCare.twig', [
			'animals' => $animals,
			'veterinarians' => $veterinarians,
			'rooms' => $rooms,
		]);
	}
}
