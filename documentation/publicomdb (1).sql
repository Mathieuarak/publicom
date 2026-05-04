-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 04 mai 2026 à 14:36
-- Version du serveur : 10.6.23-MariaDB-0ubuntu0.22.04.1
-- Version de PHP : 8.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `publicomdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `IDENTIFIANT` char(32) DEFAULT NULL,
  `MOTDEPASSE` char(72) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`ID`, `IDENTIFIANT`, `MOTDEPASSE`) VALUES
(1, 'admin', '$2y$10$18XJN64WAhI0cnKU45b.GulGC4ggrPozqZtByfNjZqIpZQB3IlEhq');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `IDCATEGORIE` int(11) NOT NULL,
  `NOM` char(32) NOT NULL,
  `DESCRIPTION` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`IDCATEGORIE`, `NOM`, `DESCRIPTION`) VALUES
(2, 'test', 'test2');

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE `commune` (
  `ID` int(11) NOT NULL,
  `NOM` char(32) DEFAULT NULL,
  `CODEPOSTAL` bigint(20) DEFAULT NULL,
  `IMAGE` longblob DEFAULT NULL,
  `DESCRIPTION` char(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commune`
--

INSERT INTO `commune` (`ID`, `NOM`, `CODEPOSTAL`, `IMAGE`, `DESCRIPTION`) VALUES
(1, 'communetest', 81210, NULL, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `ID` int(11) NOT NULL,
  `ID_COMMUNEMESSAGE` int(11) NOT NULL,
  `TITRE` varchar(60) DEFAULT NULL,
  `CONTENU` varchar(600) DEFAULT NULL,
  `POLICETITRE` varchar(40) DEFAULT NULL,
  `POLICECONTENU` varchar(40) DEFAULT NULL,
  `ALIGNEMENT` enum('gauche','centre','droite') DEFAULT NULL,
  `FOND` char(80) DEFAULT NULL,
  `TAILLECONTENU` int(11) DEFAULT NULL,
  `TAILLETITRE` int(11) DEFAULT NULL,
  `PUBLIE` tinyint(1) DEFAULT NULL,
  `ID_CATEGORIEMESSAGE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`ID`, `ID_COMMUNEMESSAGE`, `TITRE`, `CONTENU`, `POLICETITRE`, `POLICECONTENU`, `ALIGNEMENT`, `FOND`, `TAILLECONTENU`, `TAILLETITRE`, `PUBLIE`, `ID_CATEGORIEMESSAGE`) VALUES
(1, 1, 'messageTest1', 'test du message...', 'fantasy', 'monospace', 'gauche', 'uploads/1764240934_a0d1c4c21466e24e87a1.jpg', 6, 5, 1, 2),
(2, 1, 'msg2', 'ttttttt', 'fantasy', 'cursive', 'centre', 'uploads/1764240960_05bc10cf691124496a25.webp', 30, 40, 0, 2),
(4, 1, 'quatriemme message', 'mess', 'Arial', 'Verdana', 'gauche', 'uploads/1764241206_0810c192a8b8c402a6f6.jpg', 60, 80, 0, NULL),
(8, 1, 'Test', 'test', 'arial', 'arial', 'centre', NULL, 12, 30, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `panneaux`
--

CREATE TABLE `panneaux` (
  `ID` int(11) NOT NULL,
  `ID_COMMUNEPANNEAUX` int(11) NOT NULL,
  `NUMERO` int(11) DEFAULT NULL,
  `LATITUDE` decimal(10,5) DEFAULT NULL,
  `LONGITUDE` decimal(10,5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `panneaux`
--

INSERT INTO `panneaux` (`ID`, `ID_COMMUNEPANNEAUX`, `NUMERO`, `LATITUDE`, `LONGITUDE`) VALUES
(7, 1, 1, '48.85660', '2.35220');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID` int(11) NOT NULL,
  `ID_UTILISATEURCOMMUNE` int(11) NOT NULL,
  `PRENOM` char(32) DEFAULT NULL,
  `NOM` char(32) DEFAULT NULL,
  `IDENTIFIANT` char(32) DEFAULT NULL,
  `MOTDEPASSE` char(72) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID`, `ID_UTILISATEURCOMMUNE`, `PRENOM`, `NOM`, `IDENTIFIANT`, `MOTDEPASSE`) VALUES
(16, 1, 'mathieu', 'arakelian', 'math', '$2y$10$18XJN64WAhI0cnKU45b.GulGC4ggrPozqZtByfNjZqIpZQB3IlEhq');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`IDCATEGORIE`);

--
-- Index pour la table `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `I_FK_MESSAGE_COMMUNE` (`ID_COMMUNEMESSAGE`),
  ADD KEY `I_FK_MESSAGE_CATEGORIE` (`ID_CATEGORIEMESSAGE`);

--
-- Index pour la table `panneaux`
--
ALTER TABLE `panneaux`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `I_FK_PANNEAUX_COMMUNE` (`ID_COMMUNEPANNEAUX`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `I_FK_UTILISATEUR_COMMUNE` (`ID_UTILISATEURCOMMUNE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `IDCATEGORIE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commune`
--
ALTER TABLE `commune`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `panneaux`
--
ALTER TABLE `panneaux`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_MESSAGE_CATEGORIE` FOREIGN KEY (`ID_CATEGORIEMESSAGE`) REFERENCES `categorie` (`IDCATEGORIE`),
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`ID_COMMUNEMESSAGE`) REFERENCES `commune` (`ID`);

--
-- Contraintes pour la table `panneaux`
--
ALTER TABLE `panneaux`
  ADD CONSTRAINT `panneaux_ibfk_1` FOREIGN KEY (`ID_COMMUNEPANNEAUX`) REFERENCES `commune` (`ID`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`ID_UTILISATEURCOMMUNE`) REFERENCES `commune` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
