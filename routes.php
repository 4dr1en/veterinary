<?php

namespace App;

use Utils\{Router, ContainerManager};
use App\Controllers\{
	AnimalController,
	VeterinarianController,
	CustomerController,
	ErrorController,
	RoomController,
	VeterinaryPracticeController,
	VeterinaryCareController
};

$container = ContainerManager::getContainer();

$router = $container->get(Router::class);
$router
	->setRoute('home', '/', AnimalController::class)

	->setRoute('animals', '/animals', AnimalController::class)
	->setRoute('animal', '/animal/{$id}', AnimalController::class, 'show')
	->setRoute('new-animal', '/new-animal', AnimalController::class, 'new')
	->setRoute('update-animal', '/animal/update/{$id}', AnimalController::class, 'update')

	->setRoute('veterinarians', '/veterinarians', VeterinarianController::class)
	->setRoute('veterinarian', '/veterinarian/{$id}', VeterinarianController::class, 'show')
	->setRoute('new-veterinarian', '/new-veterinarian', VeterinarianController::class, 'new')

	->setRoute('customer', '/customer/{$id}', CustomerController::class, 'show')
	->setRoute('new-customer', '/new-customer', CustomerController::class, 'new')

	->setRoute('rooms', '/rooms', RoomController::class)
	->setRoute('room', '/room/{$id}', RoomController::class, 'show')
	->setRoute('new-room', '/new-room', RoomController::class, 'new')

	->setRoute('veterinarian-practices', '/veterinary-practices', VeterinaryPracticeController::class)
	->setRoute('veterinary-practice', '/veterinary-practice/{$id}', VeterinaryPracticeController::class, 'show')

	->setRoute('veterinary-cares', '/veterinary-cares', VeterinaryCareController::class)
	->setRoute('veterinary-care', '/veterinary-care/{$id}', VeterinaryCareController::class, 'show')
	->setRoute('new-veterinary-care', '/new-veterinary-care', VeterinaryCareController::class, 'new')

	->setRoute('error', '/error', ErrorController::class);
