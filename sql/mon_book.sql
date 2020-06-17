-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 17 juin 2020 à 10:29
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mon_book`
--

-- --------------------------------------------------------

--
-- Structure de la table `general`
--

DROP TABLE IF EXISTS `general`;
CREATE TABLE IF NOT EXISTS `general` (
  `id_general` int(11) NOT NULL AUTO_INCREMENT,
  `iduni` varchar(150) NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id_general`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `general`
--

INSERT INTO `general` (`id_general`, `iduni`, `contenu`) VALUES
(1, 'TEXTE_ACCUEIL', 'Voici un site repertoriant les projets réalisés au cours de ma formation. Blabla'),
(2, 'TITRE_ACCUEIL', 'Le book de Cekcek'),
(3, 'TITRE_CONTACT', 'Contact'),
(4, 'TEXTE_CONTACT', 'Silvia Cecutti, Paris XX, 06 10 23 55 38, silviacecutti@yahoo.fr');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

DROP TABLE IF EXISTS `projet`;
CREATE TABLE IF NOT EXISTS `projet` (
  `id_projet` int(11) NOT NULL AUTO_INCREMENT,
  `nom_projet` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `url_image` varchar(150) NOT NULL,
  `annee` year(4) NOT NULL,
  `client` varchar(150) NOT NULL,
  `lien` varchar(150) NOT NULL,
  `online` tinyint(1) DEFAULT NULL,
  `ordre` int(11) NOT NULL,
  PRIMARY KEY (`id_projet`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `nom_projet`, `description`, `url_image`, `annee`, `client`, `lien`, `online`, `ordre`) VALUES
(1, 'Syl', 'site une page', 'template/img/Syl.png', 2020, 'Descodeuses', 'github cekcek', 0, 1),
(2, 'Adalib', 'Le site pour un hôpital online', 'template/img/adalib.png', 2020, 'Descodeuses', 'github cekcek', 0, 3),
(3, 'ADA Hôtel', 'Le site d\'un hôtel', 'template/img/ada_hotel.png', 2020, 'Descodeuses', 'github cekcek', 0, 2),
(4, 'Codevores', 'Site de vente de service de développement informatique', 'template/img/codevores.png', 2020, 'Descodeuses', 'github cekcek', 0, 4),
(5, 'Blog', 'Blog sans sujet', 'template/img/blog.png', 2020, 'Django Girls', 'http://cekcek.pythonanywhere.com/', 1, 5),
(6, 'Le petit musée', 'Site d\'un musée avec base de données', 'template/img/musee.png', 2020, 'Descodeuses', 'github cekcek', 0, 6);

-- --------------------------------------------------------

--
-- Structure de la table `projet_techno`
--

DROP TABLE IF EXISTS `projet_techno`;
CREATE TABLE IF NOT EXISTS `projet_techno` (
  `projet_id` int(11) NOT NULL,
  `techno_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `projet_techno`
--

INSERT INTO `projet_techno` (`projet_id`, `techno_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 2),
(5, 5),
(6, 1),
(6, 2),
(6, 4);

-- --------------------------------------------------------

--
-- Structure de la table `techno`
--

DROP TABLE IF EXISTS `techno`;
CREATE TABLE IF NOT EXISTS `techno` (
  `id_techno` int(11) NOT NULL AUTO_INCREMENT,
  `nom_techno` varchar(150) NOT NULL,
  PRIMARY KEY (`id_techno`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `techno`
--

INSERT INTO `techno` (`id_techno`, `nom_techno`) VALUES
(1, 'Html'),
(2, 'CSS'),
(3, 'JavaScript'),
(4, 'PHP'),
(5, 'Python'),
(6, 'SQL');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(150) NOT NULL,
  `mdp` varchar(150) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `identifiant`, `mdp`) VALUES
(1, 'cek', 'cek');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
