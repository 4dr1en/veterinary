<?php

namespace App\Entity;

class Customer extends AbstractEntity
{
	use TraitPersonalInformation;

	public function __construct(
		private ?string $_id = null,
		private ?string $_firstname = null,
		private ?string $_lastname = null,
		private ?string $_address = null,
		private ?string $_phoneNumber = null,
		private ?string $_email = null,
		private ?string $_informations = null,
		private ?\DateTime $_registrationDate = null,
		private ?string $_veterinaryPracticeId = null
	) {
	}


	/**
	 * Get the value of _id
	 *
	 * @return  int|null
	 */
	public function getId(): ?int
	{
		return $this->_id;
	}

	/**
	 * Set the value of _id
	 *
	 * @param  int $id
	 * @return  self
	 */
	public function setId(int $id): self
	{
		$this->_id = $id;

		return $this;
	}

	/**
	 * Get the value of _registrationDate
	 *
	 * @return  \DateTime|null
	 */
	public function getRegistrationDate(): ?\DateTime
	{
		return $this->_registrationDate;
	}

	/**
	 * Set the value of _registrationDate
	 *
	 * @return  self
	 */
	public function setRegistrationDate(\DateTime $registrationDate): self
	{
		$this->_registrationDate = $registrationDate;

		return $this;
	}

	/**
	 * Get the value of _veterinaryPracticeId
	 *
	 * @return  string|null
	 */
	public function getVeterinaryPracticeId(): ?string
	{
		return $this->_veterinaryPracticeId;
	}

	/**
	 * Set the value of _veterinaryPracticeId
	 *
	 * @return  self
	 */
	public function setVeterinaryPracticeId(string $veterinaryPracticeId): self
	{
		$this->_veterinaryPracticeId = $veterinaryPracticeId;

		return $this;
	}
}