<?php

namespace Utils;

class Parameters
{
	private static array|bool $_parameters;

	/**
	 * Load the parameters from the .env file and store them in an array
	 */
	public static function load(): void
	{
		SELF::$_parameters = yaml_parse_file('../.env');
	}

	/**
	 * Get a parameter or a group of parameters
	 * 
	 * @param string ...$keys
	 * @return mixed
	 */
	public static function get(string ...$keys): string|array|null
	{
		$content = SELF::$_parameters;
		foreach ($keys as $key) {
			if(isset($content[$key])){
				$content = $content[$key];
			}
			else return null;
		}
		return $content;
	}
}
