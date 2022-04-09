<?php

namespace Utils;

use Ds\Map;

class Router
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
	 *
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
			throw new \Exception('Class or methode do not existe: ' . $controller);
		}
	}

	/**
	 * Get the route by it name
	 *
	 * @param  array $name
	 */
	private function getRoute(string $name): array
	{
		return $this->_paths->get($name);
	}

	/**
	 * Get the route by the path
	 *
	 * @param  string $path
	 * @preturn array|null
	 */
	private function getRouteByPath(string $path): ?array
	{
		foreach ($this->_paths as $routeName => $value) {
			if( $this->testPath($path, $value['path']) ){
				return $this->_paths->get($routeName);
			}
		}
		return null;
	}

	/**
	 * Test if the path match the route
	 *
	 * @param  string $path
	 * @param  string $route
	 * @return bool
	 */
	private function testPath(string $path, string $route): bool
	{
		$regexp = preg_replace('/\{(\$[a-z]+)\}/', '([a-zA-Z0-9-_]+)', $route);
		$regexp = str_replace('/', '\/', $regexp);
		$regexp = '/^' . $regexp . '$/';
		return preg_match($regexp, $path);
	}


	/**
	 * Call the method of the controller for the current path
	 *
	 * @return void
	 */
	public function callCurPathController(): void
	{
		$this->callPathController($_SERVER['REQUEST_URI']);
	}

	/**
	 * Call the method of the controller for the given path
	 *
	 * @param  string $path
	 * @return void
	 */
	public function callPathController(string $path): void
	{
		if($route = $this->getRouteByPath($path)){
			$pathParams = $this->getParams($path, $route['path']);
			$this->callController($route, $pathParams);
		} else {
			$this->callErrorPage();
		}
	}

	/**
	 * Call the method of the controller for the given route name
	 *
	 * @param  string $name
	 * @return void
	 */
	public function CallRoute(string $name, array $params = []): void
	{
		if($route = $this->getRoute($name)){
			$this->callController($route, $params);
		} else {
			$this->callErrorPage();
		}
	}

	/**
	 * Get the parameters of the path
	 * 
	 * @param  string $path
	 * @param  string $route
	 */
	private function getParams(string $path, string $route): array
	{
		// Get the parameters needed for the route
		$paramsNames = [];
		$nbParameters = preg_match_all('/\{\$([a-z]+)\}/', $route, $paramsNames);
		
		if(!$nbParameters) return []; //quick exit if no parameters

		$paramsNames = $paramsNames[1];

		// Build the regexp to get the parameters values from the url
		$regexp = preg_replace('/\{(\$[a-z]+)\}/', '([a-zA-Z0-9-_]+)', $route);
		$regexp = str_replace('/', '\/', $regexp);
		$regexp = '/^' . $regexp . '$/';

		// Using the regexp, get the parameters values from the url
		$params = [];
		preg_match($regexp, $path, $params);
		array_shift($params);

		return array_combine($paramsNames, $params);
	}

	/**
	 * Call the method of the controller
	 *
	 * @param  array $route
	 * @return void
	 */
	private function callController(array $route, array $params = []): void
	{
		$container = ContainerManager::getContainer();
		$controller = $container->get($route['controller']);
		$params = array_merge($_GET ?: $_POST ?: [], $params);
		$controller->{$route['method']}($params);
	}

	/**
	 * Call the controller for displaying the error page
	 *
	 */
	public function callErrorPage(): void
	{
		http_response_code(404);
		if($this->_paths['error']){
			$this->callController($this->_paths['error']);
		}
		die();
	}
}
