-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 09 fév. 2023 à 21:47
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

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
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `IDAVIS` smallint NOT NULL,
  `TITRE` char(62) NOT NULL,
  `SPE` char(1) DEFAULT '0',
  `PARAG1` varchar(2400) NOT NULL,
  `PARAG2` varchar(2400) NOT NULL,
  `PARAG3` varchar(2400) NOT NULL,
  `MINRES` int DEFAULT '0',
  `MINDEV` int DEFAULT '2000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`IDAVIS`, `TITRE`, `SPE`, `PARAG1`, `PARAG2`, `PARAG3`, `MINRES`, `MINDEV`) VALUES
(1, 'Totally d?v', '1', 'Un.e vrai SLAMiste. \r\nInventez votre petit monde en c#, tout en ?tant, attirer par le Python qui sommeille au fond de votre disque dur. ', 'Vous danseriez tout aussi bien sur un air de Java pour d?velopper votre site web. Vous pourriez passer des nuits ? coder et ne compter pas vos heures pour d?busquer le bug, le moindre indice et le temps glisse sur vous.\r\n En ?quipe, c?est toujours plus agile. ', 'Votre patience est l?gendaire derri?re votre ?cran, difficile de vous en extraire. Bon, quelquefois, votre code est sur un autre domaine que l?informatique : le commerce, la gestion des emplois du temps,? \r\nFace ? des utilisateurs un peu hackers ou pas d?gourdis, vous pouvez ?tre perfectionniste pour ?viter les bugs de saisie. Et avec, tout cela, vous avez encore le temps de voir les nouveaut?s qui pourraient am?liorer votre pratique.\r\n', 20, 100),
(2, 'Full réseau', '2', 'Vous vous penchez non pas vers le côté obscur, mais bien vers l’option SISR !\r\nVous aimez répondre à des demandes de dépannage et venir les résoudre pour le plaisir de l’autre.\r\nNe supportant pas de perdre votre temps et étant plutôt impatient votre désir de compléter tous vos services avec directement les bonnes commandes, c’est cela votre atout.', 'Être à l’aise avec différents systèmes d’exploitation et savoir dépanner vos proches quand ils sont au bout de leurs vies lorsque le WIFI est désactivé.', 'Voulant non pas rester toute votre journée derrière votre écran à taper sur votre clavier, vous aimez divaguer un peu partout et surveiller le bon fonctionnement de vos créations.', 100, 20),
(3, 'Mi dev mi réseau', '0', 'Vous bricolez un peu de code pour des bots de jeu ou dépanner la famille.  Vous êtes essayé.e à HTML et CSS parce que c’est marrant de voir rapidement le résultat de son code mais, pour vos jeux préférés, vous pouvez réfléchir à la meilleure manière d’exploiter votre PC.', 'Un vrai technophile : vous avalez toutes les innovations techniques. Un peu branleur, try Hardeur, vous pouvez vous énerver facilement et vous aimez bien mener votre monde par le bout du nez. Votre idée : c’est aussi de choisir l’option où on bosse le moins tout en étant les rois du monde.', 'Le choix sera dur en décembre !!', 20, 20);

-- --------------------------------------------------------

--
-- Structure de la table `origine`
--

CREATE TABLE `origine` (
  `IDORIGINE` smallint NOT NULL,
  `NOM` char(62) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
(8, 'PROSNONRISC'),
(9, 'RECURRENTIUT'),
(10, 'RECURRENTAUTRE'),
(11, 'AUTRE');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `IDQUESTION` smallint NOT NULL,
  `LIBELLE` varchar(1200) NOT NULL,
  `ENJEU` varchar(1200) NOT NULL,
  `IDTYPEQUESTION` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`IDQUESTION`, `LIBELLE`, `ENJEU`, `IDTYPEQUESTION`) VALUES
(1, 'Supportez-vous de \"perdre\" du temps à résoudre des erreurs?', 'mise en jambe', 1),
(2, 'A quel point êtes-vous à l\'aise avec les Systèmes d\'exploitation ?', 'Approche', 2),
(3, 'Dépannez-vous souvent les problèmes informatiques de votre famille ?', 'Approche', 1),
(4, 'Avez-vous déjà fouiné dans votre PC ?', 'Approche', 1),
(5, 'A quel point aimez-vous personnaliser vos projets/réalisations ?', 'entamereflexion', 2),
(6, 'A quel point êtes-vous perfectionniste ?', 'entamereflexion', 2);

-- --------------------------------------------------------

--
-- Structure de la table `reponseassociee`
--

CREATE TABLE `reponseassociee` (
  `IDQUESTION` smallint DEFAULT NULL,
  `IDSONDE` smallint DEFAULT NULL,
  `VALEURRES` smallint DEFAULT '0',
  `VALEURDEV` smallint DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `reponseassociee`
--

INSERT INTO `reponseassociee` (`IDQUESTION`, `IDSONDE`, `VALEURRES`, `VALEURDEV`) VALUES
(1, 1, 0, 0),
(2, 1, 1, 1),
(3, 1, 4, 0),
(4, 1, 4, 0),
(5, 1, 0, 1),
(6, 1, 3, 6);

-- --------------------------------------------------------

--
-- Structure de la table `scorech`
--

CREATE TABLE `scorech` (
  `IDSCORECH` smallint NOT NULL,
  `NBPTMULTRES` int DEFAULT '0',
  `NBPTMULTDEV` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `scorech`
--

INSERT INTO `scorech` (`IDSCORECH`, `NBPTMULTRES`, `NBPTMULTDEV`) VALUES
(1, 1, 1),
(2, 0, 1),
(3, 0, 2),
(4, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `scoreechassociee`
--

CREATE TABLE `scoreechassociee` (
  `IDQUESTION` int NOT NULL,
  `IDSCOREECH` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `scoreechassociee`
--

INSERT INTO `scoreechassociee` (`IDQUESTION`, `IDSCOREECH`) VALUES
(2, 1),
(5, 2),
(6, 4);

-- --------------------------------------------------------

--
-- Structure de la table `scorefassociee`
--

CREATE TABLE `scorefassociee` (
  `IDQUESTION` int NOT NULL,
  `IDSCOREF` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `scorefassociee`
--

INSERT INTO `scorefassociee` (`IDQUESTION`, `IDSCOREF`) VALUES
(1, 1),
(3, 2),
(4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `scorefermee`
--

CREATE TABLE `scorefermee` (
  `IDSCOREF` smallint NOT NULL,
  `REP` tinyint(1) DEFAULT NULL,
  `SCOREFRES` int DEFAULT '0',
  `SCOREFDEV` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `scorefermee`
--

INSERT INTO `scorefermee` (`IDSCOREF`, `REP`, `SCOREFRES`, `SCOREFDEV`) VALUES
(1, 1, 2, 4),
(2, 1, 4, 0),
(3, 1, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `sonde`
--

CREATE TABLE `sonde` (
  `IDSONDE` smallint NOT NULL,
  `IDORIGINE` smallint DEFAULT NULL,
  `ANNEE` int DEFAULT '2023',
  `SEXE` char(1) DEFAULT 'M'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `sonde`
--

INSERT INTO `sonde` (`IDSONDE`, `IDORIGINE`, `ANNEE`, `SEXE`) VALUES
(1, 2, 2023, 'N'),
(4, 5, 2023, 'M');

-- --------------------------------------------------------

--
-- Structure de la table `typeassociee`
--

CREATE TABLE `typeassociee` (
  `IDQUESTION` int NOT NULL,
  `IDTYPEQUESTION` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `typeassociee`
--

INSERT INTO `typeassociee` (`IDQUESTION`, `IDTYPEQUESTION`) VALUES
(1, 1),
(2, 2),
(3, 1),
(4, 1),
(5, 2),
(6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `typequestion`
--

CREATE TABLE `typequestion` (
  `ID` smallint NOT NULL,
  `NOMTYPE` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `typequestion`
--

INSERT INTO `typequestion` (`ID`, `NOMTYPE`) VALUES
(1, 'fermee'),
(2, 'echelle');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`IDAVIS`);

--
-- Index pour la table `origine`
--
ALTER TABLE `origine`
  ADD PRIMARY KEY (`IDORIGINE`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`IDQUESTION`);

--
-- Index pour la table `scorech`
--
ALTER TABLE `scorech`
  ADD PRIMARY KEY (`IDSCORECH`);

--
-- Index pour la table `scoreechassociee`
--
ALTER TABLE `scoreechassociee`
  ADD PRIMARY KEY (`IDQUESTION`);

--
-- Index pour la table `scorefassociee`
--
ALTER TABLE `scorefassociee`
  ADD PRIMARY KEY (`IDQUESTION`);

--
-- Index pour la table `scorefermee`
--
ALTER TABLE `scorefermee`
  ADD PRIMARY KEY (`IDSCOREF`);

--
-- Index pour la table `sonde`
--
ALTER TABLE `sonde`
  ADD PRIMARY KEY (`IDSONDE`);

--
-- Index pour la table `typeassociee`
--
ALTER TABLE `typeassociee`
  ADD PRIMARY KEY (`IDQUESTION`);

--
-- Index pour la table `typequestion`
--
ALTER TABLE `typequestion`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `IDAVIS` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `origine`
--
ALTER TABLE `origine`
  MODIFY `IDORIGINE` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `IDQUESTION` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `scorech`
--
ALTER TABLE `scorech`
  MODIFY `IDSCORECH` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `scorefermee`
--
ALTER TABLE `scorefermee`
  MODIFY `IDSCOREF` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `sonde`
--
ALTER TABLE `sonde`
  MODIFY `IDSONDE` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `typequestion`
--
ALTER TABLE `typequestion`
  MODIFY `ID` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
