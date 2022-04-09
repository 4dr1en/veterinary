<?php

Namespace App\Entity;

/**
 * Trait Image
 *
 * Provides the property and getters/setters to manage the image of an entity.
 */
trait TraitImagePath
{
	private ?string $_imagePath;

	/**
	 * Get the value of _imagePath
	 *
	 * @return  string|null
	 */
	public function getImagePath(): ?string
	{
		return $this->_imagePath;
	}

	/**
	 * Set the value of _imagePath
	 *
	 * @param   string $imagePath
	 * @return  self
	 */
	public function setImagePath(string $imagePath): self
	{
		$this->_imagePath = $imagePath;

		return $this;
	}
}