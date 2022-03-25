<?php

namespace App\Entity;

class Animal
{

	public function __construct(
		protected ?string $_id = null,
		protected ?string $_name = null,
		protected ?\dateTime $_birthDate = null,
		protected ?\DateTime $_entryDate = null,
		protected ?bool $_gender = null,
		protected ?string $_father = null,
		protected ?string $_mother = null,
		protected ?string $_photoPath = null,
		protected ?int $_diet = null,
		protected ?string $_treatment = null,
		protected ?string $_enclosure = null,
		protected ?\DateTime $_deathDate = null,
		protected ?string $_informations = null
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
	 * @param   string $name
	 * @return  self
	 */ 
	public function setName($name): self
	{
		$this->_name = $name;

		return $this;
	}

	/**
	 * Get the value of _birthDate
	 * 
	 * @return DateTime|null
	 */ 
	public function getBirthDate(): ?\DateTime
	{
		return $this->_birthDate;
	}

	/**
	 * Set the value of _birthDate
	 *
	 * @param   \DateTime $birthDate
	 * @return  self
	 */ 
	public function setBirthDate(\DateTime $birthDate): self
	{
		$this->_birthDate = $birthDate;

		return $this;
	}

	/**
	 * Get the value of _gender
	 * 
	 * @return boolean|null
	 */ 
	public function getGender(): ?bool
	{
		return $this->_gender;
	}

	/**
	 * Set the value of _gender
	 *
	 * @param   bool $gender
	 * @return  self
	 */ 
	public function setGender(bool $gender): self
	{
		$this->_gender = $gender;

		return $this;
	}

	/**
	 * Get the id of the father
	 * 
	 * @return string|null
	 */ 
	public function getFather(): ?string
	{
		return $this->_father;
	}

	/**
	 * Set the id of the father
	 *
	 * @param   string $father
	 * @return  self
	 */ 
	public function setFather(string $father): self
	{
		$this->_father = $father;

		return $this;
	}

	/**
	 * Get the id of the mother
	 * 
	 * @return string|null
	 */ 
	public function getMother(): ?string
	{
		return $this->_mother;
	}

	/**
	 * Set the id of the mother
	 *
	 * @param   string $mother
	 * @return  self
	 */ 
	public function setMother(string $mother): self
	{
		$this->_mother = $mother;

		return $this;
	}

	/**
	 * Get the value of _photoPath
	 * 
	 * @return  string|null
	 */ 
	public function getPhotoPath(): ?string
	{
		return $this->_photoPath;
	}

	/**
	 * Set the value of _photoPath
	 *
	 * @param   string $photoPath
	 * @return  self
	 */ 
	public function setPhotoPath(string $photoPath): self
	{
		$this->_photoPath = $photoPath;

		return $this;
	}

	/**
	 * Get the id of the diet
	 * 
	 * @return int|null
	 */ 
	public function getDiet(): ?int
	{
		return $this->_diet;
	}

	/**
	 * Set the id of the diet
	 *
	 * @param   int $diet
	 * @return  self
	 */ 
	public function setDiet(int $diet): self
	{
		$this->_diet = $diet;

		return $this;
	}

	/**
	 * Get the value of _treatment
	 * 
	 * @return  int|null
	 */ 
	public function getTreatment(): ?int
	{
		return $this->_treatment;
	}

	/**
	 * Set the value of _treatment
	 *
	 * @param   int $treatment
	 * @return  self
	 */ 
	public function setTreatment(int $treatment): self
	{
		$this->_treatment = $treatment;

		return $this;
	}

	/**
	 * Get the id of the enclosure
	 * 
	 * @return string|null
	 */ 
	public function getEnclosure(): ?string
	{
		return $this->_enclosure;
	}

	/**
	 * Set the value of _enclosure
	 *
	 * @param   string $enclosure
	 * @return  self
	 */ 
	public function setEnclosure(string $enclosure): self
	{
		$this->_enclosure = $enclosure;

		return $this;
	}

	/**
	 * Get the value of _deathDate
	 * 
	 * @return DateTime|null
	 */ 
	public function getDeathDate(): ?\DateTime
	{
		return $this->_deathDate;
	}

	/**
	 * Set the value of _deathDate
	 *
	 * @param   \DateTime $deathDate
	 * @return  self
	 */ 
	public function setDeathDate(\DateTime $deathDate): self
	{
		$this->_deathDate = $deathDate;

		return $this;
	}

	/**
	 * Get the value of _informations
	 * 
	 * @return string|null
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
	public function setInformations(string $informations): self
	{
		$this->_informations = $informations;

		return $this;
	}
}
