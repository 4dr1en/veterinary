<?php
namespace App\Controllers;

use App\Controllers\AbstractController;
use App\Entity\Customer;
use App\Models\CustomerModel;
use App\Models\VeterinaryPracticeModel;

class CustomerController extends AbstractController
{
	public function show(array $request)
	{
		$customerModel = $this->_container->get(CustomerModel::class);
		$customer = $customerModel->getOne($request['id']);
		$this->render('customer/singleCustomer.twig', ['customer' => $customer]);
	}

	public function new(array $request)
	{
		$customerModel = $this->_container->get(CustomerModel::class);

		if (isset($request['firstname'])){

			$customer = new Customer(
				_firstname: $request['firstname'] ?? '',
				_lastname: $request['lastname'] ?? '',
				_address: $request['address'] ?? '',
				_phoneNumber: $request['phoneNumber'] ?? '',
				_email: $request['email'] ?? '',
				_informations: $request['informations'] ?? '',
				_registrationDate: new \DateTime($request['registrationDate']) ?? null,
				_veterinaryPracticeId: $request['veterinaryPractice'] ?? null
			);

			$r = $customerModel->create($customer);
			if($r) {
				$customer = $customerModel->getLast();
				$this->_router->CallRoute('customer', ['id' => $customer->getId()]);
				return;
			}
		}

		$veterinaryPracticeModel = $this->_container->get(VeterinaryPracticeModel::class);
		$veterinaryPractices = $veterinaryPracticeModel->getAll();

		$this->render('customer/newCustomer.twig', [
			'veterinaryPractices' => $veterinaryPractices
		]);
	}
}
