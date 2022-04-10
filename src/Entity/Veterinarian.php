<?php

namespace App\Entity;

class Veterinarian extends AbstractEntity
{
	use TraitPersonalInformation;
	use TraitImagePath;

	public function __construct(
		private ?string $_id = null,
		private ?string $_firstname = null,
		private ?string $_lastname = null,
		private ?string $_address = null,
		private ?string $_phoneNumber = null,
		private ?string $_email = null,
		private ?string $_informations = null,
		private ?bool $_gender = null,
		private ?string $_imagePath = null,
		private ?string $_speciality = null,
		private ?string $_veterinaryPracticeId = null,
		private ?string $_upperHierarchyId = null,
		private ?\DateTime $_entryDate = null,
		private ?\DateTime $_exitDate = null,
		private ?int $_carePerDay = null,
		private ?Veterinarian $_upperHierarchy = null,
		private ?VeterinaryPractice $_veterinaryPractice = null,
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
	 * Get the value of _carePerDay
	 *
	 * @return  int|null
	 */
	public function getCarePerDay(): ?int
	{
		return $this->_carePerDay;
	}

	/**
	 * Set the value of _carePerDay
	 *
	 * @return  self
	 */
	public function setCarePerDay(int $carePerDay): self
	{
		$this->_carePerDay = $carePerDay;

		return $this;
	}

	/**
	 * get the main informations about the veterinarian
	 * 
	 * @return  string
	*/
	public function __toString(): string
	{
		$return = $this->_firstname . ' ' . $this->_lastname;
		if($this->_speciality){
			$return .= ' | ' . $this->_speciality;
		}
		return $return;
	}

	/**
	 * Get the value of _upperHierarchy
	 * 
	 * @return  Veterinarian|null
	 */ 
	public function getUpperHierarchy(): ?Veterinarian
	{
		return $this->_upperHierarchy;
	}

	/**
	 * Set the value of _upperHierarchy
	 *
	 * @return  self
	 */ 
	public function setUpperHierarchy($_upperHierarchy): self
	{
		$this->_upperHierarchy = $_upperHierarchy;

		return $this;
	}

	/**
	 * Get the value of _veterinaryPractice
	 * 
	 * @return  veterinaryPractice|null
	 */
	public function getVeterinaryPractice(): ?veterinaryPractice
	{
		return $this->_veterinaryPractice;
	}

	/**
	 * Set the value of _veterinaryPractice
	 *
	 * @return  self
	 */
	public function setVeterinaryPractice($_veterinaryPractice): self
	{
		$this->_veterinaryPractice = $_veterinaryPractice;

		return $this;
	}
}