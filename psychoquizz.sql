-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 03 mars 2023 à 20:08
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `psychoquizz`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `IDAVIS` smallint(6) NOT NULL AUTO_INCREMENT,
  `TITRE` char(62) NOT NULL,
  `PARAG1` varchar(2400) NOT NULL,
  `PARAG2` varchar(2400) NOT NULL,
  `PARAG3` varchar(2400) NOT NULL,
  `BORNEDEV` int(11) DEFAULT '0',
  `BORNERES` int(11) DEFAULT '2000',
  PRIMARY KEY (`IDAVIS`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`IDAVIS`, `TITRE`, `PARAG1`, `PARAG2`, `PARAG3`, `BORNEDEV`, `BORNERES`) VALUES
(1, 'Totally dév', 'Une vrai SLAMiste. \r\nInventez votre petit monde en c#, tout en étant, attirer par le Python qui sommeille au fond de votre disque dur. \r\n', 'Vous danseriez tout aussi bien sur un air de Java pour développer votre site web. Vous pourriez passer des nuits à coder et ne compter pas vos heures pour débusquer le bug, le moindre indice et le temps glisse sur vous.\r\n En équipe, c’est toujours plus agile. \r\n', 'Votre patience est légendaire derrière votre écran, difficile de vous en extraire. Bon, quelquefois, votre code est sur un autre domaine que l’informatique : le commerce, la gestion des emplois du temps,… \r\nFace à des utilisateurs un peu hackers ou pas dégourdis, vous pouvez être perfectionniste pour éviter les bugs de saisie. Et avec, tout cela, vous avez encore le temps de voir les nouveautés qui pourraient améliorer votre pratique.\r\n', 20, 100),
(2, 'Mi dev mi réseau', 'Vous bricolez un peu de code pour des bots de jeu ou dépanner la famille.  Vous êtes essayé.e à HTML et CSS parce que c’est marrant de voir rapidement le résultat de son code mais, pour vos jeux préférés, vous pouvez réfléchir à la meilleure manière d’exploiter votre PC.\r\n', 'Un vrai technophile : vous avalez toutes les innovations techniques. Un peu branleur, try Hardeur, vous pouvez vous énerver facilement et vous aimez bien mener votre monde par le bout du nez. Votre idée : c’est aussi de choisir l’option où on bosse le moins tout en étant les rois du monde.\r\n', 'Le choix sera dur en décembre !!', 20, 20),
(3, 'Full réseau', 'Vous vous penchez non pas vers le côté obscur, mais bien vers l’option SISR !\r\n\r\nNe supportant pas de perdre votre temps et étant plutôt impatient votre désir de compléter tous vos services avec directement les bonnes commandes, c’est cela votre atout.\r\n', 'Être à l’aise avec différents systèmes d’exploitation et savoir dépanner vos proches quand ils sont au bout de leurs vies lorsque le WIFI est désactivé.\r\n\r\n', 'Voulant non pas rester toute votre journée derrière votre écran à taper sur votre clavier, vous aimez divaguer un peu partout et surveiller le bon fonctionnement de vos créations.', 20, 100);

-- --------------------------------------------------------

--
-- Structure de la table `origine`
--

DROP TABLE IF EXISTS `origine`;
CREATE TABLE IF NOT EXISTS `origine` (
  `IDORIGINE` smallint(6) NOT NULL AUTO_INCREMENT,
  `NOM` char(62) NOT NULL,
  PRIMARY KEY (`IDORIGINE`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `origine`
--

INSERT INTO `origine` (`IDORIGINE`, `NOM`) VALUES
(1, 'G NSI'),
(2, 'STI2DSIN'),
(3, 'STI2DNONSIN'),
(4, 'G MATHS'),
(5, 'STMG'),
(6, 'PROSNRISC'),
(7, 'PROSAUTRE'),
(8, 'PROSNNONRISC'),
(9, 'RECURRENTIUT'),
(10, 'RECURRENTAUTRE'),
(11, 'AUTRE');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `IDQUESTION` smallint(6) NOT NULL AUTO_INCREMENT,
  `LIBELLE` varchar(1200) NOT NULL,
  `ENJEU` varchar(1200) NOT NULL,
  `IDTYPEQUESTION` int(11) DEFAULT NULL,
  `IDSCOREFERMEE` int(11) DEFAULT NULL,
  `IDSCORECH` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDQUESTION`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`IDQUESTION`, `LIBELLE`, `ENJEU`, `IDTYPEQUESTION`, `IDSCOREFERMEE`, `IDSCORECH`) VALUES
(1, 'Supportez-vous de \"perdre\" du temps à résoudre des erreurs ?', 'mise en jambe', 1, 2, 1),
(2, 'A quel point êtes-vous à l\'aise avec les Systèmes d\'exploitation ?', 'Approche', 2, 1, 2),
(3, 'Dépannez-vous souvent les problèmes informatiques de votre famille ?', 'Approche', 1, 3, 1),
(4, 'Avez-vous déjà fouiné dans votre PC ?', 'Approche', 1, 2, NULL),
(5, 'A quel point aimez-vous personnaliser vos projets/réalisations ? échelle', 'entamereflexion', 2, 1, 3),
(6, 'A quel point êtes-vous perfectionniste ?', 'entamereflexion', 2, 1, 4),
(7, 'A quel point êtes-vous d’une nature patiente ? ', 'blabla', 2, 1, 2),
(8, 'Vous ne crachez pas sur le salaire de Dave le dev ? ', 'blabla', 1, NULL, 4),
(11, 'Au travail, vous voudriez rester derrière votre ordinateur ?', 'blabla', 1, 2, 1),
(12, 'Vous préférez l’autonomie ?  ', 'blabla', 1, 5, 1),
(13, 'Vous aimez avoir des privilèges (n\'est-ce pas ? sisi vous aimez ça) ?', 'blabla', 1, 6, 1),
(14, 'Vous aimez travailler en équipe? ', 'blabla', 1, 7, 1),
(15, 'Au travail, vous voudriez vous déplacer plutôt qu’intervenir à distance ?', 'blabla', 1, 3, 1),
(16, 'Plutôt dieu du monde que vous créez et   voyez  évoluer ?', 'blabla', 2, 1, 3),
(17, 'Vous voulez être celui à qui on demande conseil ?', 'blabla', 1, 3, 1),
(19, 'Le pouvoir vous attire ?', 'blabla', 1, 3, 1),
(20, 'Vous vous énervez facilement ? ', 'blabla', 1, 8, 1),
(21, 'Vous vous énervez facilement ? ', 'blabla', 1, 9, 1),
(22, 'Vous souhaitez marquer votre passage sur le net ?', 'blabla', 1, 4, 1),
(23, 'Vous aimez résoudre des énigmes à la recherche des indices ?', 'blabla', 1, 4, 1),
(25, 'Vous êtes maniaque ?', 'blabla', 1, 2, 1),
(26, 'Vous adorez être indispensable ?', 'blabla', 1, 10, 1),
(27, 'Gardez-vous facilement votre motivation face à l\'échec ?', 'blabla', 1, 11, 1),
(28, 'Avez-vous déjà ouvert un CMD ? ', 'blabla', 1, 10, 1),
(29, 'Vous acceptez d’avoir toujours quelque chose à apprendre ? ', 'blabla', 1, 12, 1),
(30, 'Vous n’êtes pas que curieux du numérique ? D’autres domaines peuvent vous intéresser professionnellement ?', 'blabla', 1, 13, 1),
(31, 'Vous aimez innover ', 'blabla', 1, 14, 1),
(10, 'A quel point supportez-vous d\'être dans l\'urgence ?', 'blabla', 2, 1, 5),
(9, 'Try hardeur ?', 'blabla', 1, 15, 1),
(18, 'Partisan du moindre effort ?', 'blabla', 1, 15, 1),
(24, 'Branleur ?', 'blabla', 1, 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reponseassociee`
--

DROP TABLE IF EXISTS `reponseassociee`;
CREATE TABLE IF NOT EXISTS `reponseassociee` (
  `IDQUESTION` smallint(6) DEFAULT NULL,
  `IDSONDE` smallint(6) DEFAULT NULL,
  `VALEURRES` smallint(6) DEFAULT '0',
  `VALEURRDEV` smallint(6) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponseassociee`
--

INSERT INTO `reponseassociee` (`IDQUESTION`, `IDSONDE`, `VALEURRES`, `VALEURRDEV`) VALUES
(1, 1, 0, 0),
(2, 1, 1, 1),
(3, 1, 4, 0),
(4, 1, 4, 0),
(5, 1, 0, 1),
(6, 1, 3, 6),
(7, 1, 1, 1),
(9, 1, -1, -1),
(18, 1, -1, -1),
(24, 1, -1, -1);

-- --------------------------------------------------------

--
-- Structure de la table `scorech`
--

DROP TABLE IF EXISTS `scorech`;
CREATE TABLE IF NOT EXISTS `scorech` (
  `IDSCORECH` smallint(6) NOT NULL AUTO_INCREMENT,
  `NBPTMULTRES` int(11) DEFAULT '0',
  `NBPTMULTDEV` int(11) DEFAULT '0',
  PRIMARY KEY (`IDSCORECH`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `scorech`
--

INSERT INTO `scorech` (`IDSCORECH`, `NBPTMULTRES`, `NBPTMULTDEV`) VALUES
(1, 0, 0),
(2, 1, 1),
(3, 0, 1),
(4, 0, 2),
(5, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `scorefermee`
--

DROP TABLE IF EXISTS `scorefermee`;
CREATE TABLE IF NOT EXISTS `scorefermee` (
  `IDSCOREF` smallint(6) NOT NULL AUTO_INCREMENT,
  `REP` tinyint(1) DEFAULT NULL,
  `SCOREFRES` int(11) DEFAULT '0',
  `SCOREFDEV` int(11) DEFAULT '0',
  PRIMARY KEY (`IDSCOREF`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `scorefermee`
--

INSERT INTO `scorefermee` (`IDSCOREF`, `REP`, `SCOREFRES`, `SCOREFDEV`) VALUES
(1, 1, 0, 0),
(2, 1, 2, 4),
(3, 1, 4, 0),
(4, 1, 0, 4),
(5, 1, 3, 1),
(6, 1, 5, 0),
(7, 1, 2, 3),
(8, 1, -2, -3),
(9, 1, 4, 2),
(10, 1, 3, 0),
(11, 1, 4, 4),
(12, 1, 5, 3),
(13, 1, -1, 3),
(14, 1, -1, 4),
(15, 2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sonde`
--

DROP TABLE IF EXISTS `sonde`;
CREATE TABLE IF NOT EXISTS `sonde` (
  `IDSONDE` smallint(6) NOT NULL AUTO_INCREMENT,
  `IDORIGINE` smallint(6) DEFAULT NULL,
  `ANNEE` int(11) DEFAULT '2023',
  `SEXE` char(1) DEFAULT 'M',
  PRIMARY KEY (`IDSONDE`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sonde`
--

INSERT INTO `sonde` (`IDSONDE`, `IDORIGINE`, `ANNEE`, `SEXE`) VALUES
(1, 2, 2023, 'N');

-- --------------------------------------------------------

--
-- Structure de la table `typequestion`
--

DROP TABLE IF EXISTS `typequestion`;
CREATE TABLE IF NOT EXISTS `typequestion` (
  `ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `NOMTYPE` char(32) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typequestion`
--

INSERT INTO `typequestion` (`ID`, `NOMTYPE`) VALUES
(1, 'fermee'),
(2, 'echelle');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
