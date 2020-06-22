-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 22 juin 2020 à 21:39
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `general`
--

INSERT INTO `general` (`id_general`, `iduni`, `contenu`) VALUES
(1, 'TEXTE_ACCUEIL', 'Dans ce petit site vous trouverez un aperçu des projets que j\'ai réalisés pendant ma formation (2020)...et ensuite.'),
(2, 'TITRE_ACCUEIL', 'Le petit book de Silviacek'),
(3, 'TITRE_CONTACT', 'Contact'),
(4, 'NOM_CONTACT', 'Silvia Cecutti'),
(5, 'ADRESSE_CONTACT', 'Paris XX'),
(6, 'TEL_CONTACT', '06 10 23 55 38'),
(7, 'EMAIL_CONTACT', 'silviacecutti@yahoo.fr'),
(8, 'PAR_ACCUEIL', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `nom_projet`, `description`, `url_image`, `annee`, `client`, `lien`, `online`, `ordre`) VALUES
(1, 'Syl', 'Un site simple, d\'une seule page, pour l\'ouverture d\'un bar à cocktail. Mon tout premier site !', 'template/img/syl.jpg', 2020, 'Descodeuses', 'https://github.com/silviacec', NULL, 7),
(2, 'Adalib', 'Le site pour des service médicaux online.\r\nUne page d\'accueil répertoriant les différents services, une page pour chaque spécialité et un formulaire de contact.', 'template/img/adalib.jpg', 2020, 'Descodeuses', 'https://github.com/silviacec', 0, 6),
(3, 'ADA Hôtel', 'Le site d\'un charmant hôtel imaginaire, perché sur les hauteurs de Belleville, avec trois chambres dédiées à des femmes célèbres.', 'template/img/adahotel.jpg', 2022, 'Descodeuses', 'https://github.com/silviacec', 0, 2),
(4, 'Codevores', 'Site qui permet de contacter des développeuses Plusieurs pages, un peu de JS et un logo avec fourchette et couteau.', 'template/img/codevores.jpg', 2020, 'Descodeuses', 'https://github.com/silviacec', 0, 1),
(5, 'Blog', 'Blog sans sujet particulier (pour l\'instant) réalisé pendant un atelier de deux jours avec DjangoGirls.', 'template/img/blog.jpg', 2020, 'Django Girls', 'http://cekcek.pythonanywhere.com/', NULL, 4),
(6, 'Le petit musée', 'Site pour un musée de drôles d\'objets (je n\'ai pas eu le temps de le terminer, ni d\'intégrer la bdd).', 'template/img/petitmusee.jpg', 2020, 'Descodeuses', 'https://github.com/silviacec', 0, 3),
(8, 'Little JS projects', 'Dossier de plusieurs mini-sites servant d\'exercice pour des fonctions JS.', 'template/img/littlejs.jpg', 2020, 'Projet perso', 'https://github.com/silviacec', 0, 5);

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
(1, 2),
(2, 3),
(5, 5),
(5, 2),
(4, 3),
(3, 1),
(2, 2),
(9, 6),
(4, 2),
(4, 1),
(9, 4),
(10, 6),
(2, 1),
(1, 1),
(5, 1),
(6, 4),
(6, 2),
(6, 1),
(8, 3),
(8, 2),
(8, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `techno`
--

DROP TABLE IF EXISTS `techno`;
CREATE TABLE IF NOT EXISTS `techno` (
  `id_techno` int(11) NOT NULL AUTO_INCREMENT,
  `nom_techno` varchar(150) NOT NULL,
  PRIMARY KEY (`id_techno`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `techno`
--

INSERT INTO `techno` (`id_techno`, `nom_techno`) VALUES
(1, 'Html5'),
(2, 'CSS3'),
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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `identifiant`, `mdp`) VALUES
(1, 'cek', 'cek'),
(16, 'lorem', 'c925603cb903b1daf8ecee0f687ba5bd830d9178'),
(15, 'filo', 'mene'),
(7, 'jojo', 'cek'),
(13, 'bou', 'din'),
(12, 'nik', 'nolte'),
(17, 'lore', '$1$0nzBMRmu$susuAnQ1J5u41TOKQvSkR0'),
(18, 'admin', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
