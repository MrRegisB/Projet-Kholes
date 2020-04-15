-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 18 Juillet 2019 à 22:02
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `exomaths`
--
CREATE DATABASE IF NOT EXISTS `exomaths` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `exomaths`;

-- --------------------------------------------------------

--
-- Structure de la table `concerne`
--

CREATE TABLE IF NOT EXISTS `concerne` (
  `idExercice` int(4) NOT NULL,
  `idNivEtude` varchar(2) NOT NULL,
  PRIMARY KEY (`idExercice`,`idNivEtude`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `concerne`
--

INSERT INTO `concerne` (`idExercice`, `idNivEtude`) VALUES
(33, '1A'),
(33, '2A'),
(35, '1A'),
(35, '2A'),
(36, '1A'),
(37, '2A'),
(38, '1A'),
(38, '2A');

-- --------------------------------------------------------

--
-- Structure de la table `difficulte`
--

CREATE TABLE IF NOT EXISTS `difficulte` (
  `idDifficulte` int(2) NOT NULL AUTO_INCREMENT,
  `nomDifficulte` varchar(15) NOT NULL,
  PRIMARY KEY (`idDifficulte`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `difficulte`
--

INSERT INTO `difficulte` (`idDifficulte`, `nomDifficulte`) VALUES
(1, 'Faible'),
(2, 'Moyenne'),
(3, 'Forte');

-- --------------------------------------------------------

--
-- Structure de la table `exercice`
--

CREATE TABLE IF NOT EXISTS `exercice` (
  `idExercice` int(4) NOT NULL AUTO_INCREMENT,
  `titreExercice` varchar(100) NOT NULL,
  `dateAjoutExercice` date NOT NULL,
  `idUtilisateur` int(2) NOT NULL,
  `idDifficulte` int(2) NOT NULL,
  PRIMARY KEY (`idExercice`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Contenu de la table `exercice`
--

INSERT INTO `exercice` (`idExercice`, `titreExercice`, `dateAjoutExercice`, `idUtilisateur`, `idDifficulte`) VALUES
(33, 'Exercice', '2019-06-21', 2, 2),
(35, 'Exercice86743', '2019-06-21', 2, 3),
(36, 'Micel', '2019-06-21', 2, 1),
(37, 'Exo', '2019-06-21', 2, 3),
(38, 'azeazea', '2019-06-21', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `nivetude`
--

CREATE TABLE IF NOT EXISTS `nivetude` (
  `idNivEtude` varchar(2) NOT NULL,
  `nomNivEtude` varchar(15) NOT NULL,
  PRIMARY KEY (`idNivEtude`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `nivetude`
--

INSERT INTO `nivetude` (`idNivEtude`, `nomNivEtude`) VALUES
('1A', '1ère année'),
('2A', '2ème année');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(2) NOT NULL AUTO_INCREMENT,
  `loginUtilisateur` varchar(40) NOT NULL,
  `mdpUtilisateur` varchar(30) NOT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `loginUtilisateur`, `mdpUtilisateur`) VALUES
(1, 'arthur', 'ar'),
(2, 'admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
