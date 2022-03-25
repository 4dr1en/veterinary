<?php
namespace App\Controllers;

use App\Models\AnimalModel;
use App\Controllers\AbstractController;

class HomeController extends AbstractController
{
	public function index($request)
	{
		$animalModel = $this->_container->get(AnimalModel::class);
		$animal = new \App\Entity\Animal(_name: 'toto');

		$this->render('single.twig', [
			'animal' => $animal
		]);
	}
}
