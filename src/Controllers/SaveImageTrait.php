<?php

namespace App\Controllers;

trait SaveImageTrait
{
	abstract protected function generateUuid(): string;
	
	/**
	* Save an image
	*
	* @param  array $image
	* @param  string $path
	* @return string
	*/
	private function saveImage(array $image, string $path): string
	{
		$allowedType = ['image/jpeg', 'image/png', 'image/webp'];
		$allowedSize = 5000000;
	
		if (!in_array($image['type'], $allowedType)) {
			throw new \Exception('Wrong file type');
			return false;
		}
	
		if ($image['size'] > $allowedSize) {
			throw new \Exception('File is too big');
			return false;
		}
	
		$fileExtension = pathinfo($image['name'], PATHINFO_EXTENSION);
		$imageName = $this->generateUuid() . '.'. $fileExtension;
		$imagePath = $_SERVER['DOCUMENT_ROOT'] . '/public/uploads/' . $path . $imageName;
	
		$r = move_uploaded_file($image['tmp_name'], $imagePath);
		if(!$r) {
			return false;
		}
		return $imageName;
	}


	/**
	 * Remove the uploaded image
	 * 
	 * @param string $imageName
	 * @return bool
	 */
	private function removeImage(string $imageName): bool
	{
		return unlink($_SERVER['DOCUMENT_ROOT'] . '/public/uploads/' . $imageName);
	}
}
