<?php

namespace App\Entity;

class Animal extends AbstractEntity
{
	use TraitImagePath;

	public function __construct(
		protected ?string $_id = null,
		protected ?string $_name = null,
		protected ?\dateTime $_birthDate = null,
		protected ?string $_species = null,
		protected ?\DateTime $_firstVisit = null,
		protected ?bool $_gender = null,
		protected ?string $_imagePath = null,
		protected ?int $_treatment = null,
		protected ?string $_favoriteVeterinarianId = null,
		protected ?string $_ownerId = null,
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
	 * Get the value of _species
	 *
	 * @return string|null
	 */
	public function getSpecies(): ?string
	{
		return $this->_species;
	}

	/**
	 * Set the value of _species
	 *
	 * @param   \string $species
	 * @return  self
	 */
	public function setSpecies(string $species): self
	{
		$this->_species = $species;

		return $this;
	}

		/**
	 * Get the value of _firstVisit
	 *
	 * @return DateTime|null
	 */
	public function getFirstVisit(): ?\DateTime
	{
		return $this->_firstVisit;
	}

	/**
	 * Set the value of _firstVisit
	 *
	 * @param   \DateTime $firstVisit
	 * @return  self
	 */
	public function setFirstVisit(\DateTime $firstVisit): self
	{
		$this->_firstVisit = $firstVisit;

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
	 * Get the id of the favoriteVeterinarianId
	 *
	 * @return string|null
	 */
	public function getFavoriteVeterinarianId(): ?string
	{
		return $this->_favoriteVeterinarianId;
	}

	/**
	 * Set the value of _favoriteVeterinarianId
	 *
	 * @param   string $favoriteVeterinarianId
	 * @return  self
	 */
	public function setFavoriteVeterinarianId(string $favoriteVeterinarianId): self
	{
		$this->_favoriteVeterinarianId = $favoriteVeterinarianId;

		return $this;
	}


	/**
	 * Get the id of the ownerId
	 *
	 * @return string|null
	 */
	public function getOwnerId(): ?string
	{
		return $this->_ownerId;
	}

	/**
	 * Set the value of _ownerId
	 *
	 * @param   string $ownerId
	 * @return  self
	 */
	public function setOwnerId(string $ownerId): self
	{
		$this->_ownerId = $ownerId;

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
