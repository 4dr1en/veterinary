<?php

namespace App\Entity;

class Veterinarian extends AbstractEntity
{
	use TraitPersonalInformation;
	use TraitImagePath;

	public function __construct(
		protected ?string $_id = null,
		protected ?string $_firstname = null,
		protected ?string $_lastname = null,
		protected ?string $_address = null,
		protected ?string $_phoneNumber = null,
		protected ?string $_email = null,
		protected ?string $_informations = null,
		protected ?bool $_gender = null,
		protected ?string $_veterinarianPracticeId = null,
		protected ?string $_imagePath = null,
		protected ?string $_speciality = null,
		protected ?string $_veterinaryPraticeId = null,
		protected ?string $_upperHierarchyId = null,
		protected ?\DateTime $_entryDate = null,
		protected ?\DateTime $_exitDate = null,
		protected int $_carPerDay = 0,
	) {
	}

	/**
	 * Get the value of _id
	 *
	 * @return  string|null
	 */
	public function getId(): ?string
	{
		return $this->_id;
	}

	/**
	 * Set the value of _id
	 *
	 * @param  string $id
	 * @return  self
	 */
	public function setId(string $id): self
	{
		$this->_id = $id;

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
	public function setVeterinarianPracticeId(string $veterinarianPracticeId): self
	{
		$this->_veterinarianPracticeId = $veterinarianPracticeId;

		return $this;
	}

	/**
	 * Get the value of _gender
	 *
	 * @return bool|null
	 */
	public function getGender(): ?bool
	{
		return $this->_gender;
	}

	/**
	 * Set the value of _gender
	 *
	 * @return  self
	 */
	public function setGender(bool $gender): self
	{
		$this->_gender = $gender;

		return $this;
	}

	/**
	 * Get the value of _speciality
	 *
	 * @return string|null _speciality
	 */
	public function getSpeciality(): ?string
	{
		return $this->_speciality;
	}

	/**
	 * Set the value of _speciality
	 *
	 * @return  self
	 */
	public function setSpeciality(string $_speciality): self
	{
		$this->_speciality = $_speciality;

		return $this;
	}

	/**
	 * Get the value of _veterinaryPraticeId
	 *
	 * @return  string|null
	 */
	public function getVeterinaryPraticeId(): ?string
	{
		return $this->_veterinaryPraticeId;
	}

	/**
	 * Set the value of _veterinaryPraticeId
	 *
	 * @return  self
	 */
	public function setVeterinaryPraticeId(string $veterinaryPraticeId): self
	{
		$this->_veterinaryPraticeId = $veterinaryPraticeId;

		return $this;
	}

	/**
	 * Get the value of _upperHierarchy
	 *
	 * @return  string|null
	 */
	public function getUpperHierarchyId(): ?string
	{
		return $this->_upperHierarchyId;
	}

	/**
	 * Set the value of _upperHierarchy
	 *
	 * @return  self
	 */
	public function setUpperHierarchyId(string $upperHierarchyId): self
	{
		$this->_upperHierarchyId = $upperHierarchyId;

		return $this;
	}

	/**
	 * Get the value of _entryDate
	 *
	 * @return  \DateTime|null
	 */
	public function getEntryDate(): ?\DateTime
	{
		return $this->_entryDate;
	}

	/**
	 * Set the value of _entryDate
	 *
	 * @return  self
	 */
	public function setEntryDate(\DateTime $entryDate): self
	{
		$this->_entryDate = $entryDate;

		return $this;
	}

	/**
	 * Get the value of _exitDate
	 *
	 * @return  \DateTime|null
	 */
	public function getExitDate(): ?\DateTime
	{
		return $this->_exitDate;
	}

	/**
	 * Set the value of _exitDate
	 *
	 * @return  self
	 */
	public function setExitDate(\DateTime $exitDate): self
	{
		$this->_exitDate = $exitDate;

		return $this;
	}

	/**
	 * Get the value of _carPerDay
	 *
	 * @return  int
	 */
	public function getCarPerDay(): int
	{
		return $this->_carPerDay;
	}

	/**
	 * Set the value of _carPerDay
	 *
	 * @return  self
	 */
	public function setCarPerDay(int $carPerDay): self
	{
		$this->_carPerDay = $carPerDay;

		return $this;
	}
}