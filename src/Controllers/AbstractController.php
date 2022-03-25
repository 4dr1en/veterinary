<?php

namespace App\Controllers;

use Utils\ContainerManager;

abstract class AbstractController
{
	protected $_templatesPath = '/src/views/';
	protected \DI\Container $_container;
	private \Twig\Environment $_twig;

	public function __construct(\Twig\Environment $environment) {
		$this->_container = ContainerManager::getContainer();
		$this->_twig = $environment;
	}

	/**
	 * Render a template
	 * @param  string $template
	 * @param  array  $data
	 * @return void
	 */
	protected function render(string $template, array $data = []): void
	{
		/*$loader = new \Twig\Loader\FilesystemLoader($_SERVER['DOCUMENT_ROOT'] . '/src/views');
		$twig = new \Twig\Environment($loader, [
			'cache' => $_SERVER['DOCUMENT_ROOT'] . '/cache/twig/',
			'debug' => true,
		]);

		echo $twig->render($template, $data);*/


		//$twig = $this->_container->get(\Twig\Environment::class);
		echo $this->_twig->render($template, $data);
	}
}
