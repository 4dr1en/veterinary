# Validation de fin de module POO

## Thème

Le theme du projet sélèctionné est le thème numéro deux, "Vétérinaire".

## Installation et prérequis

- Le serveur doit être configuré pour renvoyer toutes les requêtes vers le fichier 'index.php' situé dans le dossier 'public'. Un exemple de configuration pour nginx est donné dans le fichier 'nginx'.

- Ce projet utilise plusieurs fonctionalitées de php non disponibles dans les versions inférieurs à php8 (properties promotion, union types et named arguments).

- Les extensions php suivantes doivent être installés :
	- php-pdo
	- php-yaml

- Ce projet utilise composer, il est necessaire de lancer la commande ```composer install``` pour installer les dépendances.

- Mariadb ou mysql est necessaire, le fichier 'veterinary.sql' à la racine du projet doit y être importé.

- Un fichier '.config' doit être créé suivant le model du fichier '.config.example' présent à la racine du projet.
