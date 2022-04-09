<?php

namespace App\Entity;

class Room extends AbstractEntity
{
	public function __construct(
		private ?int $_id = null,
		private ?string $_name = null,
		private ?string $_speciality = null,
		private ?string $_veterinaryPracticeId = null,
		private ?VeterinaryPractice $_veterinaryPractice = null
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
	 * Get the value of _name
	 *
	 * @return  string|null
	 */
	public function getName(): ?string
	{
		return $this->_name;
	}

	/**
	 * Set the value of _name
	 *
	 * @param  string $name
	 * @return  self
	 */
	public function setName(string $name): self
	{
		$this->_name = $name;

		return $this;
	}

	/**
	 * Get the value of _speciality
	 *
	 * @return  string|null
	 */
	public function getSpeciality(): ?string
	{
		return $this->_speciality;
	}

	/**
	 * Set the value of _speciality
	 *
	 * @param  string $speciality
	 * @return  self
	 */
	public function setSpeciality(string $speciality): self
	{
		$this->_speciality = $speciality;

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
	 * @param  string $veterinaryPracticeId
	 * @return  self
	 */
	public function setVeterinaryPracticeId(string $veterinaryPracticeId): self
	{
		$this->_veterinaryPracticeId = $veterinaryPracticeId;

		return $this;
	}

	/**
	 * Get the value of _veterinaryPractice
	 * 
	 * @return  VeterinaryPractice|null
	 */
	public function getVeterinaryPractice(): ?VeterinaryPractice
	{
		return $this->_veterinaryPractice;
	}

	/**
	 * Set the value of _veterinaryPractice
	 *
	 * @return  self
	 */
	public function setVeterinaryPractice($veterinaryPractice): self
	{
		$this->_veterinaryPractice = $veterinaryPractice;

		return $this;
	}
}
