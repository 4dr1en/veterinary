<?php

namespace App\Entity;

class Customer extends AbstractEntity
{
	use TraitPersonalInformation;

	public function __construct(
		protected ?string $_id = null,
		protected ?string $_firstname = null,
		protected ?string $_lastname = null,
		protected ?string $_address = null,
		protected ?string $_phoneNumber = null,
		protected ?string $_email = null,
		protected ?string $_informations = null,
		protected ?\DateTime $_RegistrationDate = null,
		protected ?string $_veterinarianPracticeId = null
	) {
	}

	/**
	 * Get the value of _RegistrationDate
	 *
	 * @return  \DateTime|null
	 */
	public function getRegistrationDate(): ?\DateTime
	{
		return $this->_RegistrationDate;
	}

	/**
	 * Set the value of _RegistrationDate
	 *
	 * @return  self
	 */
	public function setRegistrationDate(\DateTime $_RegistrationDate): self
	{
		$this->_RegistrationDate = $_RegistrationDate;

		return $this;
	}

	/**
	 * Get the value of _veterinarianPracticeId
	 *
	 * @return  string|null
	 */
	public function getVeterinarianPracticeId(): ?string
	{
		return $this->_veterinarianPracticeId;
	}

	/**
	 * Set the value of _veterinarianPracticeId
	 *
	 * @return  self
	 */
	public function setVeterinarianPracticeId(string $_veterinarianPracticeId): self
	{
		$this->_veterinarianPracticeId = $_veterinarianPracticeId;

		return $this;
	}
}