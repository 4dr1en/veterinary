<?php

Namespace Utils;

use Psr\Container\ContainerInterface;
use Twig\Extra\Intl\IntlExtension;
use Twig\Extension\DebugExtension;

class ContainerManager {

	private static $_container;

	/**
	 * Get the container and create it if it doesn't exist yet
	 */
	public static function getContainer(): \DI\Container
	{
		if(SELF::$_container) {
			return SELF::$_container;
		}

		$dbParameters = Parameters::get('App', 'Database');
		$twigParameters = Parameters::get('App', 'Twig');

		$containerBuilder = new \DI\ContainerBuilder();
		$containerBuilder->addDefinitions([
			\PDO::class => \DI\create()->constructor(
				'mysql:host=' . $dbParameters['Host'] . ';dbname=' . $dbParameters['Name'] . ';port=' . $dbParameters['Port'] . ';charset=utf8',
				$dbParameters['Username'],
				$dbParameters['Password'],
				null
			),
			\App\Models\abstractModel::class => \DI\create()->constructor(\DI\get(PDO::class)),
			\Twig\Loader\FilesystemLoader::class => \DI\create()->constructor(
				[
					$_SERVER['DOCUMENT_ROOT'] . $twigParameters['TemplateDir'],
				]
			),
			\Twig\Environment::class => function (ContainerInterface $c) use ($twigParameters){
				$twig = new \Twig\Environment(
					$c->get( \Twig\Loader\FilesystemLoader::class ),
					[
						'cache' => $twigParameters['CacheDir'] ? $_SERVER['DOCUMENT_ROOT'] . $twigParameters['CacheDir'] : false,
						'debug' => $twigParameters['Debug'],
					]
				);
				$twig->addExtension(new IntlExtension());
				$twig->addExtension(new DebugExtension());
				return $twig;
			},

			\App\Controllers\AbstractController::class => \DI\create()->constructor(\DI\get(Twig\Environment::class)),
		]);

		SELF::$_container = $containerBuilder->build();
		return SELF::$_container;
	}
}
