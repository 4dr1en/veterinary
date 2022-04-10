<?php
namespace App\Controllers;

use App\Entity\Room;
use App\Models\RoomModel;
use App\Controllers\AbstractController;
use App\Models\VeterinaryPracticeModel;

class RoomController extends AbstractController
{
	public function index(): void
	{
		$roomModel = $this->_container->get(RoomModel::class);
		$rooms = $roomModel->getAll();
		$this->render('room/listRoom.twig', ['rooms' => $rooms]);
	}

	public function show(array $request): void
	{
		$roomModel = $this->_container->get(RoomModel::class);
		$room = $roomModel->getOne($request['id']);
		$this->render('room/singleRoom.twig', ['room' => $room]);
	}

	public function new(array $request): void
	{
		$roomModel = $this->_container->get(RoomModel::class);

		if (isset($request['name'])){

			$room = new Room(
				_name: $request['name'] ?? '',
				_speciality: $request['speciality'] ?? '',
				_veterinaryPracticeId: $request['veterinaryPractice'] ?? null
			);

			$r = $roomModel->create($room);
			if($r) {
				$room = $roomModel->getLast();
				$this->_router->CallRoute('room', ['id' => $room->getId()]);
				return;
			}
		}

		$veterinaryPracticeModel = $this->_container->get(VeterinaryPracticeModel::class);
		$veterinaryPractices = $veterinaryPracticeModel->getAll();

		$this->render('customer/newCustomer.twig', [
			'veterinaryPractices' => $veterinaryPractices
		]);
	}

	public function update(array $request)
	{
		$roomModel = $this->_container->get(RoomModel::class);
		$oldRoom = $roomModel->getOne($request['id']);

		if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($request)) {
			$room = new Room(
				_id: $oldRoom->getId(),
				_name: $request['name'] ?? '',
				_speciality: $request['speciality'] ?? '',
				_veterinaryPracticeId: $request['veterinaryPractice'] ?? null
			);

			$r = $roomModel->update($room);
			if($r) {
				$this->_router->CallRoute('room', ['id' => $room->getId()]);
				return;
			}
		}

		$veterinaryPracticeModel = $this->_container->get(VeterinaryPracticeModel::class);
		$veterinaryPractices = $veterinaryPracticeModel->getAll();

		$this->render('room/updateRoom.twig', [
			'oldRoom' => $oldRoom,
			'veterinaryPractices' => $veterinaryPractices
		]);

	}
}
