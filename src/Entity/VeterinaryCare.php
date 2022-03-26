<?php

namespace App\Entity;

use App\Models\AbstractModel;
use DateTime;

class VeterinarianCare extends AbstractEntity
{
	public function __construct(
		protected ?int $_id = null,
		protected ?string $_name = null,
		protected ?string $_animalId = null,
		protected ?string $_veterinarianId = null,
		protected ?int $_roomId = null,
		protected ?DateTime $_startDate = null,
		protected ?DateTime $_endDate = null,
		protected ?int $_price = null,
		protected ?bool $_isPaid = false,
		protected ?string $_informations = null
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
	 * Get the value of _animalId
	 *
	 * @return  string|null
	 */
	public function getAnimalId(): ?string
	{
		return $this->_animalId;
	}

	/**
	 * Set the value of _animalId
	 *
	 * @param  string $animalId
	 * @return  self
	 */
	public function setAnimalId(string $animalId): self
	{
		$this->_animalId = $animalId;

		return $this;
	}

	/**
	 * Get the value of _veterinarianId
	 *
	 * @return  string|null
	 */
	public function getVeterinarianId(): ?string
	{
		return $this->_veterinarianId;
	}

	/**
	 * Set the value of _veterinarianId
	 *
	 * @param  string $veterinarianId
	 * @return  self
	 */
	public function setVeterinarianId(string $veterinarianId): self
	{
		$this->_veterinarianId = $veterinarianId;

		return $this;
	}

	/**
	 * Get the value of _roomId
	 *
	 * @return  int|null
	 */
	public function getRoomId(): ?int
	{
		return $this->_roomId;
	}

	/**
	 * Set the value of _roomId
	 *
	 * @param  int $roomId
	 * @return  self
	 */
	public function setRoomId(int $roomId): self
	{
		$this->_roomId = $roomId;

		return $this;
	}

	/**
	 * Get the value of _startDate
	 *
	 * @return  DateTime|null
	 */
	public function getStartDate(): ?DateTime
	{
		return $this->_startDate;
	}

	/**
	 * Set the value of _startDate
	 *
	 * @param  DateTime $startDate
	 * @return  self
	 */
	public function setStartDate(DateTime $startDate): self
	{
		$this->_startDate = $startDate;

		return $this;
	}

	/**
	 * Get the value of _endDate
	 *
	 * @return  DateTime|null
	 */
	public function getEndDate(): ?DateTime
	{
		return $this->_endDate;
	}

	/**
	 * Set the value of _endDate
	 *
	 * @param  DateTime $endDate
	 * @return  self
	 */
	public function setEndDate(DateTime $endDate): self
	{
		$this->_endDate = $endDate;

		return $this;
	}

	/**
	 * Get the value of _price
	 *
	 * @return  int|null
	 */
	public function getPrice(): ?int
	{
		return $this->_price;
	}

	/**
	 * Set the value of _price
	 *
	 * @param  int $price
	 * @return  self
	 */
	public function setPrice(int $price): self
	{
		$this->_price = $price;

		return $this;
	}

	/**
	 * Get the value of _isPaid
	 *
	 * @return  bool|null
	 */
	public function getIsPaid(): ?bool
	{
		return $this->_isPaid;
	}

	/**
	 * Set the value of _isPaid
	 *
	 * @param  bool $isPaid
	 * @return  self
	 */
	public function setIsPaid(bool $isPaid): self
	{
		$this->_isPaid = $isPaid;

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
	 * @param  string $informations
	 * @return  self
	 */
	public function setInformations(string $informations): self
	{
		$this->_informations = $informations;

		return $this;
	}
}
