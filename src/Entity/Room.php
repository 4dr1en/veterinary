<?php

namespace App\Entity;

class Customer extends AbstractEntity
{
	public function __construct(
		protected ?int $_id = null,
		protected ?string $_name = null,
		protected ?string $_speciality = null,
		protected ?string $_veterinaryPracticeId = null
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
}
