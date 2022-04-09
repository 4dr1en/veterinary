<?php
namespace App\Controllers;

use App\Controllers\AbstractController;

class ErrorController extends AbstractController
{
	public function index()
	{
		$this->render('404.twig');
	}
}
