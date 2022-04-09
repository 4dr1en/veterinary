<?php

namespace App\Controllers;

use Utils\ContainerManager;
use Ramsey\Uuid\Uuid;

abstract class AbstractController
{
	protected $_templatesPath = '/src/views/';
	protected \DI\Container $_container;
	private \Twig\Environment $_twig;

	public function __construct(\Twig\Environment $environment, \Utils\Router $router) {
		$this->_container = ContainerManager::getContainer();
		$this->_twig = $environment;
		$this->_router = $router;
	}

	/**
	 * Render a template
	 *
	 * @param  string $template
	 * @param  array  $data
	 * @return void
	 */
	protected function render(string $template, array $data = []): void
	{
		echo $this->_twig->render($template, $data);
	}

	/**
	 * Generate uuid
	 *
	 * @return string
	 */
	protected function generateUuid(): string
	{
		return Uuid::uuid4()->toString();
	}
}
