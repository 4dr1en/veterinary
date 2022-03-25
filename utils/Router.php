<?php

namespace Utils;

use Ds\Map;

final class Router
{
	/**
	 * List of routes
	 */
	private Map $_paths;

	public function __construct()
	{
		$this->_paths = new Map();
	}

	/**
	 * Set a route
	 * @param string $name
	 * @param string $path
	 * @param string $controller
	 * @param string $method
	 * @return self
	 */
	public function setRoute(string $name, string $path, string $controller, string $method= 'index'): self
	{
		if(class_exists($controller) && method_exists($controller, $method))
		{
			$this->_paths->put($name, [
				'path' => $path,
				'controller' => $controller,
				'method' => $method
			]);
			return $this;

		} else {
			trigger_error('Class or methode do not existe: ' . $controller, E_USER_ERROR);
		}
	}

	/**
	 * Get the route by it name
	 * @param  array $name
	 */
	private function getRoute(string $name): array
	{
		return $this->_paths->get($name);
	}

	/**
	 * Get the route by the path
	 * @param  string $path
	 * @preturn array|null
	 */
	private function getRouteByPath(string $path): ?array
	{
		foreach ($this->_paths as $routeName => $value) {
			if($value['path'] === $path)
			{
				return $this->_paths->get($routeName);
			}
		}
		return null;
	}

	/**
	 * Call the method of the controller for the current path
	 * @return void
	 */
	public function callCurPathController(): void
	{
		$this->callPathController($_SERVER['REQUEST_URI']);
	}

	/**
	 * Call the method of the controller for the given path
	 * @param  string $path
	 * @return void
	 */
	public function callPathController(string $path): void
	{
		if($route = $this->getRouteByPath($path)){
			$this->callController($route);
		} else {
			http_response_code(404);
			die();
		}
	}

	/**
	 * Call the method of the controller for the given route name
	 * @param  string $name
	 * @return void
	 */
	public function CallRoute(string $name): void
	{
		if($route = $this->getRoute($name)){
			$this->callController($route);
		} else {
			http_response_code(404);
			die();
		}
	}

	/**
	 * Call the method of the controller
	 * @param  array $route
	 * @return void
	 */
	private function callController(array $route): void
	{
		$container = ContainerManager::getContainer();
		$controller = $container->get($route['controller']);
		$controller->{$route['method']}(
			$_GET ?? $_POST ?? []
		);
	}
}
