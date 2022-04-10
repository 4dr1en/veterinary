<?php

namespace App\Models;

use App\Entity\Customer;
use App\Models\AbstractModel;
use PDO;

class CustomerModel extends AbstractModel
{
	/**
	 * Get all customers
	 */
	public function getAll(): ?array
	{
		$query = $this->_pdo->prepare('SELECT * FROM Customer');
		$query->execute();
		$customersData = $query->fetchAll();
		$customers = [];

		foreach ($customersData as $customerData) {
			$customers[] = $this->populate($customerData);
		}

		return $customers;
	}

	/**
	 * Get a customer by id
	 *
	 * @param int $id
	 * @return Customer|null
	 */
	public function getOne(int $id): ?Customer
	{
		$query = $this->_pdo->prepare('SELECT * FROM Customer WHERE id = :id');
		$query->bindValue(':id', $id, PDO::PARAM_INT);
		$query->execute();

		$customer = $this->populate($query->fetch());

		return $customer;
	}

	/**
	 * Get the last customer
	 * 
	 * @return Customer|null
	 */
	public function getLast(): ?Customer
	{
		$query = $this->_pdo->prepare('SELECT * FROM Customer ORDER BY id DESC LIMIT 1');
		$query->execute();

		$customer = $this->populate($query->fetch());

		return $customer;
	}

	/**
	 * Create a new customer in the database
	 *
	 * @param Customer $customer
	 * @return bool
	 */
	public function create(Customer $customer): bool
	{
		$query = $this->_pdo->prepare('
			INSERT INTO Customer (
				firstname,
				lastname,
				registration_date,
				address,
				phone_number,
				email,
				informations,
				veterinary_practice_id
			) VALUES (
				:firstname,
				:lastname,
				:registration_date,
				:address,
				:phone_number,
				:email,
				:informations,
				:veterinary_practice_id
			);
		');

		$query->bindValue(':firstname', $customer->getFirstname(), PDO::PARAM_STR);
		$query->bindValue(':lastname', $customer->getLastname(), PDO::PARAM_STR);
		$query->bindValue(':registration_date', $customer->getRegistrationDate()?->format('Y-m-d H:i:s') ?: null);
		$query->bindValue(':address', $customer->getAddress(), PDO::PARAM_STR);
		$query->bindValue(':phone_number', $customer->getPhoneNumber(), PDO::PARAM_STR);
		$query->bindValue(':email', $customer->getEmail(), PDO::PARAM_STR);
		$query->bindValue(':informations', $customer->getInformations(), PDO::PARAM_STR);
		$query->bindValue(':veterinary_practice_id', $customer->getVeterinaryPracticeId(), PDO::PARAM_STR);

		return $query->execute();
	}

	/**
	 * Update a customer
	 * 
	 * @param  Customer $customer
	 * @return bool
	 */
	public function update($customer): bool
	{
		$sql = '
			UPDATE Customer SET
				firstname = :firstname,
				lastname = :lastname,
				registration_date = :registrationDate,
				address = :address,
				phone_number = :phoneNumber,
				email = :email,
				informations = :informations,
				veterinary_practice_id = :veterinaryPracticeId
			WHERE id= :id;
		';

		$query = $this->_pdo->prepare($sql);

		$query->bindValue(':id', $customer->getId(), PDO::PARAM_INT);
		$query->bindValue(':firstname', $customer->getFirstname(), PDO::PARAM_STR);
		$query->bindValue(':lastname', $customer->getLastname(), PDO::PARAM_STR);
		$query->bindValue(':registrationDate', $customer->getRegistrationDate()?->format('Y-m-d H:i:s') ?: null);
		$query->bindValue(':address', $customer->getAddress(), PDO::PARAM_STR);
		$query->bindValue(':phoneNumber', $customer->getPhoneNumber(), PDO::PARAM_STR);
		$query->bindValue(':email', $customer->getEmail(), PDO::PARAM_STR);
		$query->bindValue(':informations', $customer->getInformations(), PDO::PARAM_STR);
		$query->bindValue(':veterinaryPracticeId', $customer->getVeterinaryPracticeId(), PDO::PARAM_STR);

		return $query->execute();
	}

	/**
	 * Create a new customer object from a database row
	 * 
	 * @param array $data
	 * @return Customer
	 */
	protected function populate(array $data): ?Customer
	{
		if (empty($data)) {
			return null;
		}

		$customer = new Customer(
			$data['id'],
			$data['firstname'],
			$data['lastname'],
			$data['address'],
			$data['phone_number'],
			$data['email'],
			$data['informations'],
			$data['registration_date'] ? new \DateTime($data['registration_date']) : null,
			$data['veterinary_practice_id']
		);

		return $customer;
	}
}