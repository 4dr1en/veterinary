<?php

namespace App\Entity;

class VeterinarianPractice extends AbstractEntity
{
	public function __construct(
		protected ?string $_id = null,
		protected ?string $_name = null,
		protected ?string $_address = null,
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
	 * @param  string $name
	 * @return  self
	 */
	public function setName(string $name): self
	{
		$this->_name = $name;

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
	 * @param  string $address
	 * @return  self
	 */
	public function setAddress(string $address): self
	{
		$this->_address = $address;

		return $this;
	}
}
