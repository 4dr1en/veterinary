<?php

namespace App\Controllers;

use App\Models\VeterinarianModel;
use App\Controllers\AbstractController;
use App\Models\VeterinaryPracticeModel;

class VeterinaryPracticeController extends AbstractController
{

	public function index()
	{
		$veterinaryPracticeModel = $this->_container->get(VeterinaryPracticeModel::class);
		$veterinaryPractices = $veterinaryPracticeModel->getAll();

		$this->render('veterinaryPractice/listVeterinaryPractice.twig', [
			'veterinaryPractices' => $veterinaryPractices
		]);
	}

	public function show(array $request)
	{
		$veterinaryPracticeModel = $this->_container->get(VeterinaryPracticeModel::class);
		$veterinaryPractice = $veterinaryPracticeModel->getOne($request['id']);

		$veterinarianModel = $this->_container->get(VeterinarianModel::class);
		$veterinarians = $veterinarianModel->getAllByVeterinaryPractice($request['id']);

		$this->render('veterinaryPractice/singleVeterinaryPractice.twig', [
			'veterinaryPractice' => $veterinaryPractice,
			'veterinarians' => $veterinarians
		]);
	}
}
