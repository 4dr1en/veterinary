-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 11 avr. 2022 à 00:42
-- Version du serveur :  10.5.15-MariaDB-0ubuntu0.21.10.1
-- Version de PHP : 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `veterinary`
--
CREATE DATABASE IF NOT EXISTS `veterinary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `veterinary`;

-- --------------------------------------------------------

--
-- Structure de la table `Animal`
--

CREATE TABLE `Animal` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `species` varchar(255) DEFAULT NULL,
  `first_visit` datetime DEFAULT NULL,
  `gender` tinyint(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `treatment` text DEFAULT NULL,
  `favorite_veterinarian_id` varchar(255) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `death_date` datetime DEFAULT NULL,
  `informations` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Animal`
--

INSERT INTO `Animal` (`id`, `name`, `birth_date`, `species`, `first_visit`, `gender`, `image_path`, `treatment`, `favorite_veterinarian_id`, `owner_id`, `death_date`, `informations`) VALUES
('1bd71751-21b2-45e1-abbc-ef5d5898cc18', 'Snowball', '2022-04-04', 'parot', '2022-04-07 00:00:00', 0, 'ad847bc6-303d-41c7-9441-444d238cb60e.jpg', 'No treatment needed', '31386d9f-f382-4343-a12a-c013952d7133', 33, '2022-04-11 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Customer`
--

CREATE TABLE `Customer` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `registration_date` datetime DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `informations` text DEFAULT NULL,
  `veterinary_practice_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Customer`
--

INSERT INTO `Customer` (`id`, `firstname`, `lastname`, `registration_date`, `address`, `phone_number`, `email`, `informations`, `veterinary_practice_id`) VALUES
(33, 'Donald', 'Duck', '2022-04-01 00:00:00', '69100 Lyon', '0799999999', 'donald@dunck.com', 'He is a duck but he is a customer', '150eaaf8-9243-4788-ab7e-0a78f63f1a7e'),
(34, 'Sylvester', 'Stallone', '2022-01-03 00:00:00', 'Hell\'s Kitchen, NY', '0666666666', 'Sylvester@Stallone.us', 'He is an actor', '8d0cad46-b9b5-4099-99b3-94a75724582a');

-- --------------------------------------------------------

--
-- Structure de la table `Room`
--

CREATE TABLE `Room` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `veterinary_practice_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Room`
--

INSERT INTO `Room` (`id`, `name`, `speciality`, `veterinary_practice_id`) VALUES
(1, 'Observatory room', 'Observation', '8d0cad46-b9b5-4099-99b3-94a75724582a');

-- --------------------------------------------------------

--
-- Structure de la table `Veterinarian`
--

CREATE TABLE `Veterinarian` (
  `id` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `speciality` varchar(255) DEFAULT NULL,
  `veterinary_practice_id` varchar(255) DEFAULT NULL,
  `upper_hierarchy_id` varchar(255) DEFAULT NULL,
  `exit_date` datetime DEFAULT NULL,
  `care_per_day` int(11) DEFAULT NULL,
  `informations` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Veterinarian`
--

INSERT INTO `Veterinarian` (`id`, `firstname`, `lastname`, `address`, `gender`, `entry_date`, `phone_number`, `email`, `image_path`, `speciality`, `veterinary_practice_id`, `upper_hierarchy_id`, `exit_date`, `care_per_day`, `informations`) VALUES
('31386d9f-f382-4343-a12a-c013952d7133', 'docteur', 'maboulle', '75000 paris', 0, '2022-04-01 00:00:00', '0600000000', 'docteru@maboulle.com', '6a2057b4-5a23-4679-a4f3-05f852d10b8c.jpg', 'Surgeon', NULL, NULL, NULL, 4, ''),
('7c7c442e-4471-4f4e-88d7-4639050c1897', 'Gregory', 'House', 'Princeton, New Jersey', 1, '2008-11-01 00:00:00', '0842424242', 'Gregory@House.com', '9fdcb980-8515-4b9a-9b92-3912d4f11274.jpg', 'doctor', NULL, NULL, NULL, 1, 'HE look terrible but he\'s good');

-- --------------------------------------------------------

--
-- Structure de la table `Veterinary_care`
--

CREATE TABLE `Veterinary_care` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `animal_id` varchar(255) DEFAULT NULL,
  `veterinarian_id` varchar(255) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `is_paid` tinyint(1) DEFAULT NULL,
  `informations` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Veterinary_care`
--

INSERT INTO `Veterinary_care` (`id`, `name`, `animal_id`, `veterinarian_id`, `room_id`, `start_date`, `end_date`, `price`, `is_paid`, `informations`) VALUES
(8, 'Vaccination', '1bd71751-21b2-45e1-abbc-ef5d5898cc18', '7c7c442e-4471-4f4e-88d7-4639050c1897', 1, '2022-04-06 15:00:00', '2022-04-06 15:30:00', 5000, 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `Veterinary_practice`
--

CREATE TABLE `Veterinary_practice` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Veterinary_practice`
--

INSERT INTO `Veterinary_practice` (`id`, `name`, `address`) VALUES
('150eaaf8-9243-4788-ab7e-0a78f63f1a7e', 'Veterinary Hospital', '1538 Innisfil Beach Rd, Innisfil ON L9S 4B8, Canada'),
('8d0cad46-b9b5-4099-99b3-94a75724582a', 'West Chelsea Veterinary', '248 W 26th St, New York, NY 10001, United States');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Animal`
--
ALTER TABLE `Animal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Animal_ibfk_1` (`favorite_veterinarian_id`),
  ADD KEY `Animal_ibfk_2` (`owner_id`);

--
-- Index pour la table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `veterinary_practice_id` (`veterinary_practice_id`);

--
-- Index pour la table `Room`
--
ALTER TABLE `Room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `veterinary_pratice_id` (`veterinary_practice_id`);

--
-- Index pour la table `Veterinarian`
--
ALTER TABLE `Veterinarian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `veterinary_pratice_id` (`veterinary_practice_id`),
  ADD KEY `Veterinarian_ibfk_2` (`upper_hierarchy_id`);

--
-- Index pour la table `Veterinary_care`
--
ALTER TABLE `Veterinary_care`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_id` (`animal_id`),
  ADD KEY `veterinarian_id` (`veterinarian_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Index pour la table `Veterinary_practice`
--
ALTER TABLE `Veterinary_practice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `Room`
--
ALTER TABLE `Room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Veterinary_care`
--
ALTER TABLE `Veterinary_care`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Animal`
--
ALTER TABLE `Animal`
  ADD CONSTRAINT `Animal_ibfk_1` FOREIGN KEY (`favorite_veterinarian_id`) REFERENCES `Veterinarian` (`id`),
  ADD CONSTRAINT `Animal_ibfk_2` FOREIGN KEY (`owner_id`) REFERENCES `Customer` (`id`);

--
-- Contraintes pour la table `Customer`
--
ALTER TABLE `Customer`
  ADD CONSTRAINT `Customer_ibfk_1` FOREIGN KEY (`veterinary_practice_id`) REFERENCES `Veterinary_practice` (`id`) ON UPDATE SET NULL;

--
-- Contraintes pour la table `Room`
--
ALTER TABLE `Room`
  ADD CONSTRAINT `Room_ibfk_1` FOREIGN KEY (`veterinary_practice_id`) REFERENCES `Veterinary_practice` (`id`);

--
-- Contraintes pour la table `Veterinarian`
--
ALTER TABLE `Veterinarian`
  ADD CONSTRAINT `Veterinarian_ibfk_1` FOREIGN KEY (`veterinary_practice_id`) REFERENCES `Veterinary_practice` (`id`) ON UPDATE SET NULL,
  ADD CONSTRAINT `Veterinarian_ibfk_2` FOREIGN KEY (`upper_hierarchy_id`) REFERENCES `Veterinarian` (`id`) ON UPDATE SET NULL;

--
-- Contraintes pour la table `Veterinary_care`
--
ALTER TABLE `Veterinary_care`
  ADD CONSTRAINT `Veterinary_care_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `Animal` (`id`),
  ADD CONSTRAINT `Veterinary_care_ibfk_2` FOREIGN KEY (`veterinarian_id`) REFERENCES `Veterinarian` (`id`),
  ADD CONSTRAINT `Veterinary_care_ibfk_3` FOREIGN KEY (`room_id`) REFERENCES `Room` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
