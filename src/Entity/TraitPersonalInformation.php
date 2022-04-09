<?php

Namespace App\Entity;

/**
 * Trait PersonalInformation
 *
 * Provides all the properies and getters/setters to manage the personal informations of an human entity.
 */
trait TraitPersonalInformation
{
	private ?string $_firstname;
	private ?string $_lastname;
	private ?string $_address;
	private ?string $_phoneNumber;
	private ?string $_email;
	private ?string $_informations;

	/**
	 * Get the value of _firstname
	 *
	 * @return  string|null
	 */
	public function getFirstname(): ?string
	{
		return $this->_firstname;
	}

	/**
	 * Set the value of _firstname
	 *
	 * @param   string $firstname
	 * @return  self
	 */
	public function setFirstname($firstname): self
	{
		$this->_firstname = $firstname;

		return $this;
	}

	/**
	 * Get the value of _lastname
	 *
	 * @return  string|null
	 */
	public function getLastname(): ?string
	{
		return $this->_lastname;
	}

	/**
	 * Set the value of _lastname
	 *
	 * @param   string $lastname
	 * @return  self
	 */
	public function setLastname($lastname): self
	{
		$this->_lastname = $lastname;

		return $this;
	}

	/**
	 * Get the value of _address
	 *
	 * @return  string|null
	 */
	public function getAddress(): ?string
	{
		return $this->_address;
	}

	/**
	 * Set the value of _address
	 *
	 * @param   string $address
	 * @return  self
	 */
	public function setAddress($address): self
	{
		$this->_address = $address;

		return $this;
	}

	/**
	 * Get the value of _phoneNumber
	 *
	 * @return  string|null
	 */
	public function getPhoneNumber(): ?string
	{
		return $this->_phoneNumber;
	}

	/**
	 * Set the value of _phoneNumber
	 *
	 * @param   string $phoneNumber
	 * @return  self
	 */
	public function setPhoneNumber($phoneNumber): self
	{
		$this->_phoneNumber = $phoneNumber;

		return $this;
	}

	/**
	 * Get the value of _email
	 *
	 * @return  string|null
	 */
	public function getEmail(): ?string
	{
		return $this->_email;
	}

	/**
	 * Set the value of _email
	 *
	 * @param   string $email
	 * @return  self
	 */
	public function setEmail($email): self
	{
		$this->_email = $email;

		return $this;
	}

	/**
	 * Get the value of _informations
	 *
	 * @return  string|null
	 */
	public function getInformations(): ?string
	{
		return $this->_informations;
	}

	/**
	 * Set the value of _informations
	 *
	 * @param   string $informations
	 * @return  self
	 */
	public function setInformations($informations): self
	{
		$this->_informations = $informations;

		return $this;
	}
}