-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 01 fév. 2023 à 18:51
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ShipCruiseTourMVCdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `cruise`
--

CREATE TABLE `cruise` (
  `idcruise` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `departuredate` date DEFAULT NULL,
  `itinerary` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `idport` int(11) DEFAULT NULL,
  `idship` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cruise`
--

INSERT INTO `cruise` (`idcruise`, `title`, `duration`, `departuredate`, `itinerary`, `destination`, `idport`, `idship`, `image`) VALUES
(24, 'werawef', '23 days', '2023-04-23', 'Tanger Port | Morocco,Madrid Port | Spain,Casablanca Port | Morocco', 'Tanger Port | Morocco', 1, 1, '5de4d0bd4d0172cf97967959f4811cec.jpg'),
(25, 'fasdf', 'asdf', '2023-02-23', 'Tanger Port | Morocco,Madrid Port | Spain,Casablanca Port | Morocco,safi Port | Morocco,porto port | portugal', 'Tanger Port | Morocco', 1, 4, 'istockphoto-482693361-612x612.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `port`
--

CREATE TABLE `port` (
  `idport` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `port`
--

INSERT INTO `port` (`idport`, `name`, `country`) VALUES
(1, 'Tanger Port', 'Morocco'),
(3, 'Madrid Port', 'Spain'),
(4, 'Casablanca Port', 'Morocco'),
(5, 'safi Port', 'Morocco'),
(6, 'porto port', 'portugal');

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE `room` (
  `idroom` int(11) NOT NULL,
  `roomNumber` int(11) DEFAULT NULL,
  `idship` int(11) DEFAULT NULL,
  `idtype` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`idroom`, `roomNumber`, `idship`, `idtype`) VALUES
(2, 23, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `roomtype`
--

CREATE TABLE `roomtype` (
  `idtype` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `roomtype`
--

INSERT INTO `roomtype` (`idtype`, `type`, `capacity`, `price`) VALUES
(3, 'Family Room', 6, 1000),
(4, 'Indiviual', 1, 400),
(5, 'Two persons', 2, 800);

-- --------------------------------------------------------

--
-- Structure de la table `ship`
--

CREATE TABLE `ship` (
  `idship` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rooms` int(11) DEFAULT NULL,
  `places` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ship`
--

INSERT INTO `ship` (`idship`, `name`, `rooms`, `places`) VALUES
(1, 'the Great Ship', 23, 100),
(2, 'A wonderful ship', 30, 140),
(3, 'THE SHARK TANK', 12, 60),
(4, 'ljadid SHIP', 23, 46);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idusers`, `firstName`, `lastName`, `email`, `password`, `role`) VALUES
(1, 'Haytam', 'Beniazza', 'admin0@gmail.com', '$2y$10$z97b0xs4lOQZLBkNBcNlm.anwWRi3JgRZaaYf5WgSdnjV0qCu8ikm', 0),
(2, 'user1', 'user', 'user0@gmail.com', '$2y$10$iPRmDmQ9SLOXTajL4yI7Uebnox577WIIiQF07/7MElqLzSw3YQIt6', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cruise`
--
ALTER TABLE `cruise`
  ADD PRIMARY KEY (`idcruise`),
  ADD KEY `idport` (`idport`),
  ADD KEY `idship` (`idship`);

--
-- Index pour la table `port`
--
ALTER TABLE `port`
  ADD PRIMARY KEY (`idport`);

--
-- Index pour la table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`idroom`),
  ADD KEY `idship` (`idship`),
  ADD KEY `idtype` (`idtype`);

--
-- Index pour la table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`idtype`);

--
-- Index pour la table `ship`
--
ALTER TABLE `ship`
  ADD PRIMARY KEY (`idship`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cruise`
--
ALTER TABLE `cruise`
  MODIFY `idcruise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `port`
--
ALTER TABLE `port`
  MODIFY `idport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `idroom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `idtype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `ship`
--
ALTER TABLE `ship`
  MODIFY `idship` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cruise`
--
ALTER TABLE `cruise`
  ADD CONSTRAINT `cruise_ibfk_1` FOREIGN KEY (`idport`) REFERENCES `port` (`idport`),
  ADD CONSTRAINT `cruise_ibfk_2` FOREIGN KEY (`idship`) REFERENCES `ship` (`idship`);

--
-- Contraintes pour la table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`idship`) REFERENCES `ship` (`idship`),
  ADD CONSTRAINT `room_ibfk_2` FOREIGN KEY (`idtype`) REFERENCES `roomtype` (`idtype`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
