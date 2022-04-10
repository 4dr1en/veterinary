<?php

Namespace App\Entity;

/**
 * Trait TraitTurnover
 *
 * Provides all the properies and getters/setters to manage the turnover (money made).
 */
trait TraitTurnover
{
	private ?int $_turnover;

	/**
	 * Get the value of _turnover
	 *
	 * @return  int|null
	 */
	public function getTurnover(): ?int
	{
		return $this->_turnover;
	}

	/**
	 * Set the value of _turnover
	 *
	 * @return  self
	 */
	public function setTurnover(?int $turnover): self
	{
		$this->_turnover = $turnover;

		return $this;
	}
}