-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 08 juin 2021 à 22:20
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `edb`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `idAdministrateur` int(11) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `userName` varchar(250) NOT NULL,
  `passWord` varchar(250) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `numTel` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `statut` varchar(50) NOT NULL,
  `idSuperAdministrateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`idAdministrateur`, `grade`, `userName`, `passWord`, `nom`, `prenom`, `numTel`, `email`, `statut`, `idSuperAdministrateur`) VALUES
(4, 'admin', 'cdinfo', '123', 'CDINFO', 'CDINFO', '0698066896', 'saliemmanuel3@gmail.com', 'online', 1),
(5, 'admin', 'cdmaths', '123', 'CDMATHS', 'CDMATHS', '0698066896', 'saliemmanuel3@gmail.com', 'offline', 1);

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE `etablissement` (
  `idEtablissement` int(11) NOT NULL,
  `domaineEtablissement` varchar(250) NOT NULL,
  `mention` varchar(250) NOT NULL,
  `parcours` varchar(50) NOT NULL,
  `cycles` varchar(50) NOT NULL,
  `idSuperAdministrateur` int(11) NOT NULL,
  `idAdministrateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etablissement`
--

INSERT INTO `etablissement` (`idEtablissement`, `domaineEtablissement`, `mention`, `parcours`, `cycles`, `idSuperAdministrateur`, `idAdministrateur`) VALUES
(4, 'SCIENCE ET TECHNOLOGIE', 'INFORMATIQUE (IN)', 'INFORMATIQUE (IN)', 'LICENCE', 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `idEtudiant` int(11) NOT NULL,
  `matricule` varchar(250) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `niveau` varchar(250) DEFAULT NULL,
  `dateNaiss` varchar(10) NOT NULL,
  `lieuNaiss` varchar(250) NOT NULL,
  `userName` varchar(250) NOT NULL,
  `passWord` varchar(250) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `numTel` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `statut` varchar(50) NOT NULL,
  `idEtablissement` int(11) NOT NULL,
  `idAdministrateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`idEtudiant`, `matricule`, `grade`, `niveau`, `dateNaiss`, `lieuNaiss`, `userName`, `passWord`, `nom`, `prenom`, `numTel`, `email`, `statut`, `idEtablissement`, `idAdministrateur`) VALUES
(1, '20A0657FS', 'etudiant', 'III', '00-00-1997', 'MAROUA', 'ABBA SARE ', '123', 'ABBA SARE ', 'HAMADJAM', '690002323', 'email@gmail.com', 'online', 4, 4),
(2, '17A0611FS', 'etudiant', 'III', '00-00-1998', 'MAROUA', 'ABDOULAYE', '123', 'ABDOULAYE', ' AHMAT', '690002323', 'email@gmail.com', 'offline', 4, 4),
(3, '18A1087FS', 'etudiant', 'III', '00-00-1999', 'MAROUA', 'ABDOUL-AZIZ ', '123', 'ABDOUL-AZIZ ', 'HASSANA', '690002323', 'email@gmail.com', 'online', 4, 4),
(4, '16A0029FS', 'etudiant', 'III', '00-00-2000', 'MAROUA', 'ABDOURAMANE ABOU ', '123', 'ABDOURAMANE ABOU ', 'DJAFAR', '690002323', 'email@gmail.com', 'offline', 4, 4),
(5, '19A1995FS', 'etudiant', 'III', '00-00-2001', 'MAROUA', 'ABOUBAKAR ', '123', 'ABOUBAKAR ', 'MALOUM', '690002323', 'email@gmail.com', 'offline', 4, 4),
(6, '17A0763FS', 'etudiant', 'III', '00-00-2002', 'MAROUA', 'ABOUBAKAR', '123', 'ABOUBAKAR', 'NDJIDDA FAL', '690002323', 'email@gmail.com', 'offline', 4, 4),
(7, '18A1307FS', 'etudiant', 'III', '00-00-2003', 'MAROUA', 'ADJIM ', '123', 'ADJIM ', 'ARPHY', '690002323', 'email@gmail.com', 'offline', 4, 4),
(8, '17A0793FS', 'etudiant', 'III', '00-00-2004', 'MAROUA', 'ADOUM ', '123', 'ADOUM ', 'BOUBA', '690002323', 'email@gmail.com', 'online', 4, 4),
(9, '16A0046FS', 'etudiant', 'III', '00-00-2005', 'MAROUA', 'ALHADJI ABBA ', '123', 'ALHADJI ABBA ', 'YOUSSOUFA MOHMAN', '690002323', 'email@gmail.com', 'offline', 4, 4),
(10, '18A1094FS', 'etudiant', 'III', '00-00-2006', 'MAROUA', 'ANNOUR ', '123', 'ANNOUR ', 'ABDOULAYE', '690002323', 'email@gmail.com', 'offline', 4, 4),
(11, '17A0696FS', 'etudiant', 'III', '00-00-2007', 'MAROUA', 'ARISTIDE ', '123', 'ARISTIDE ', 'ODJIGUE', '690002323', 'email@gmail.com', 'offline', 4, 4),
(12, '18A1743FS', 'etudiant', 'III', '00-00-2008', 'MAROUA', 'AXEL ', '123', 'AXEL ', 'WAYA', '690002323', 'email@gmail.com', 'online', 4, 4),
(13, '17A0726FS', 'etudiant', 'III', '00-00-2009', 'MAROUA', 'BADAWE ', '123', 'BADAWE ', 'GASSO', '690002323', 'email@gmail.com', 'offline', 4, 4),
(14, '20A0691FS', 'etudiant', 'III', '00-00-2010', 'MAROUA', 'BAMBE ', '123', 'BAMBE ', 'SANDAS', '690002323', 'email@gmail.com', 'offline', 4, 4),
(15, '16A1153FS', 'etudiant', 'III', '00-00-2011', 'MAROUA', 'BEBDEU-YAHNOBA ', '123', 'BEBDEU-YAHNOBA ', 'DJEDANG', '690002323', 'email@gmail.com', 'offline', 4, 4),
(16, '18A1093FS', 'etudiant', 'III', '00-00-2012', 'MAROUA', 'BEIDI DINA ', '123', 'BEIDI DINA ', 'SAMUEL', '690002323', 'email@gmail.com', 'offline', 4, 4),
(17, '17A0718FS', 'etudiant', 'III', '00-00-2013', 'MAROUA', 'BIYENA DJONGUE ', '123', 'BIYENA DJONGUE ', 'DESIRE', '690002323', 'email@gmail.com', 'online', 4, 4),
(18, '17A0921FS', 'etudiant', 'III', '00-00-2014', 'MAROUA', 'BOYANNE NYA JOSETTE ', '123', 'BOYANNE NYA JOSETTE ', 'FRANCINE', '690002323', 'email@gmail.com', 'offline', 4, 4),
(19, '18A1554FS', 'etudiant', 'III', '00-00-2015', 'MAROUA', 'DASRANE ', '123', 'DASRANE ', 'BENEDICTH', '690002323', 'email@gmail.com', 'offline', 4, 4),
(20, '18A1132FS', 'etudiant', 'III', '00-00-2016', 'MAROUA', 'DEUSSAHBE ', '123', 'DEUSSAHBE ', 'MAHOULI', '690002323', 'email@gmail.com', 'online', 4, 4),
(21, '19A1653FS', 'etudiant', 'III', '00-00-2017', 'MAROUA', 'DIEUDONNE ', '123', 'DIEUDONNE ', 'DJIMADOUMADJI ERIC', '690002323', 'email@gmail.com', 'offline', 4, 4),
(22, '18A1133FS', 'etudiant', 'III', '00-00-2018', 'MAROUA', 'DINGUEMBEYE ', '123', 'DINGUEMBEYE ', 'ISRAEL', '690002323', 'email@gmail.com', 'offline', 4, 4),
(23, '17A0797FS', 'etudiant', 'III', '00-00-2019', 'MAROUA', 'DJANGO ', '123', 'DJANGO ', 'FAMARGUE', '690002323', 'email@gmail.com', 'offline', 4, 4),
(24, '17A0927FS', 'etudiant', 'III', '00-00-2020', 'MAROUA', 'DJINDIMADJI DJIMET ', '123', 'DJINDIMADJI DJIMET ', 'LANDONA', '690002323', 'email@gmail.com', 'offline', 4, 4),
(25, '19A1334FS', 'etudiant', 'III', '00-00-2021', 'MAROUA', 'EBANGA ', '123', 'EBANGA ', 'LOIC ARNAUD', '690002323', 'email@gmail.com', 'offline', 4, 4),
(26, '16A1047FS', 'etudiant', 'III', '00-00-2022', 'MAROUA', 'EVEGUE  MEKONGO ', '123', 'EVEGUE  MEKONGO ', 'CYRILLE VALENTIN', '690002323', 'email@gmail.com', 'offline', 4, 4),
(27, '16A0767FS', 'etudiant', 'III', '00-00-2023', 'MAROUA', 'FIDJANDEU ', '123', 'FIDJANDEU ', 'PATALET', '690002323', 'email@gmail.com', 'offline', 4, 4),
(28, '18A1154FS', 'etudiant', 'III', '00-00-2024', 'MAROUA', 'GUIBA? JUSTIN ', '123', 'GUIBA? JUSTIN ', 'GUEKEME', '690002323', 'email@gmail.com', 'offline', 4, 4),
(29, '20A0664FS', 'etudiant', 'III', '00-00-2025', 'MAROUA', 'HABIBA ', '123', 'HABIBA ', 'OUSMANA', '690002323', 'email@gmail.com', 'offline', 4, 4),
(30, '16A0208FS', 'etudiant', 'III', '00-00-2026', 'MAROUA', 'ISSOUF ELHADJI ', '123', 'ISSOUF ELHADJI ', 'MAMAT ', '690002323', 'email@gmail.com', 'offline', 4, 4),
(31, '17A0785FS', 'etudiant', 'III', '00-00-2027', 'MAROUA', 'JOSAPHAT ', '123', 'JOSAPHAT ', 'SPAKOUA', '690002323', 'email@gmail.com', 'online', 4, 4),
(32, '18A1104FS', 'etudiant', 'III', '00-00-2028', 'MAROUA', 'KWAPNANG ', '123', 'KWAPNANG ', 'NANA FRANCK', '690002323', 'email@gmail.com', 'offline', 4, 4),
(33, '17A0788FS', 'etudiant', 'III', '00-00-2029', 'MAROUA', 'LAHIBE ', '123', 'LAHIBE ', 'SCHOLASTIQUE', '690002323', 'email@gmail.com', 'offline', 4, 4),
(34, '18A1135FS', 'etudiant', 'III', '00-00-2030', 'MAROUA', 'MAHMOUT ', '123', 'MAHMOUT ', 'NOUDJALTA', '690002323', 'email@gmail.com', 'offline', 4, 4),
(35, '16A0200FS', 'etudiant', 'III', '00-00-2031', 'MAROUA', 'MANA TCHINDEBE ', '123', 'MANA TCHINDEBE ', 'ETIENNE', '690002323', 'email@gmail.com', 'online', 4, 4),
(36, '20A0683FS', 'etudiant', 'III', '00-00-2032', 'MAROUA', 'MAPOURE YOUMO ', '123', 'MAPOURE YOUMO ', 'ASSIATOU', '690002323', 'email@gmail.com', 'offline', 4, 4),
(37, '18A1127FS', 'etudiant', 'III', '00-00-2033', 'MAROUA', 'MBAINDIGUIM DJONDONGAR ', '123', 'MBAINDIGUIM DJONDONGAR ', 'CHERIVAIN', '690002323', 'email@gmail.com', 'offline', 4, 4),
(38, '20A0678FS', 'etudiant', 'III', '00-00-2034', 'MAROUA', 'MEIGWUIE TIODOUNG ', '123', 'MEIGWUIE TIODOUNG ', 'MARRAINE', '690002323', 'email@gmail.com', 'offline', 4, 4),
(39, '19A1648FS', 'etudiant', 'III', '00-00-2035', 'MAROUA', 'MEULEL KEOUL DOL', '123', 'MEULEL KEOUL ', 'DOL', '690002323', 'email@gmail.com', 'online', 4, 4),
(40, '17A0783FS', 'etudiant', 'III', '00-00-2036', 'MAROUA', 'MIKAEL DJEME ERIC', '123', 'MIKAEL DJEME ', 'ERIC', '690002323', 'email@gmail.com', 'offline', 4, 4),
(41, '18A0932FS', 'etudiant', 'III', '00-00-2037', 'MAROUA', 'MOHAMADOU ', '123', 'MOHAMADOU ', 'MOUSTAPHA', '690002323', 'email@gmail.com', 'offline', 4, 4),
(42, '18A1131FS', 'etudiant', 'III', '00-00-2038', 'MAROUA', 'MOUSSA AHMAT HAMOUR', '123', 'MOUSSA AHMAT ', 'HAMOUR', '690002323', 'email@gmail.com', 'offline', 4, 4),
(43, '17A0933FS', 'etudiant', 'III', '00-00-2039', 'MAROUA', 'MOUSTAPHA DJIBRILLA', '123', 'MOUSTAPHA', ' DJIBRILLA', '690002323', 'email@gmail.com', 'offline', 4, 4),
(44, '18A1128FS', 'etudiant', 'III', '00-00-2040', 'MAROUA', 'MOUSTAPHA MAHAMAT', '123', 'MOUSTAPHA ', 'MAHAMAT', '690002323', 'email@gmail.com', 'online', 4, 4),
(45, '18A1130FS', 'etudiant', 'III', '00-00-2041', 'MAROUA', 'NGORHOMA KLAKOM', '123', 'NGORHOMA ', 'KLAKOM', '690002323', 'email@gmail.com', 'online', 4, 4),
(46, '16A0189FS', 'etudiant', 'III', '00-00-2042', 'MAROUA', 'POFINE PATAHALET ERIC', '123', 'POFINE PATAHALET ', 'ERIC', '690002323', 'email@gmail.com', 'offline', 4, 4),
(47, '18A1151FS', 'etudiant', 'III', '00-00-2043', 'MAROUA', 'RITCHATOU MBENE ', '123', 'RITCHATOU MBENE ', 'CHARLOTTE', '690002323', 'email@gmail.com', 'offline', 4, 4),
(48, '17A0743FS', 'etudiant', 'III', '00-00-2044', 'MAROUA', 'SABA FIDEL', '123', 'SABA ', 'FIDEL', '690002323', 'email@gmail.com', 'offline', 4, 4),
(49, '17A0799FS', 'etudiant', 'III', '05-01-1999', 'FIGUIL', 'SALI ', '123', 'SALI ', 'EMMANUEL', '690002323', 'email@gmail.com', 'online', 4, 4),
(50, '17A0930FS', 'etudiant', 'III', '00-00-2044', 'MAROUA', 'SOKO BEOYE  OYANA ERIC', '123', 'SOKO BEOYE  ', 'OYANA ERIC', '690002323', 'email@gmail.com', 'offline', 4, 4),
(51, '17A1129FS', 'etudiant', 'III', '00-00-2045', 'MAROUA', 'SOMBLE YANICK', '123', 'SOMBLE ', 'YANICK', '690002323', 'email@gmail.com', 'offline', 4, 4),
(52, '16A0742FS', 'etudiant', 'III', '00-00-2046', 'MAROUA', 'TAIRA SANGO PIERRE', '123', 'TAIRA SANGO ', 'PIERRE', '690002323', 'email@gmail.com', 'offline', 4, 4),
(53, '17A0900FS', 'etudiant', 'III', '00-00-2047', 'MAROUA', 'WARI BERTRAND', '123', 'WARI ', 'BERTRAND', '690002323', 'email@gmail.com', 'offline', 4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `payement`
--

CREATE TABLE `payement` (
  `idPayement` int(11) NOT NULL,
  `codePayement` varchar(50) NOT NULL,
  `tranche` varchar(50) NOT NULL,
  `idAdministrateur` int(11) NOT NULL,
  `semestre` varchar(11) NOT NULL,
  `matricule` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `payement`
--

INSERT INTO `payement` (`idPayement`, `codePayement`, `tranche`, `idAdministrateur`, `semestre`, `matricule`) VALUES
(42, '01IN', '01IN2', 4, 'S5', '20A0657FS'),
(43, '02IN', '02T2', 4, 'S5', '17A0611FS'),
(44, '03IN', '03T2', 4, 'S5', '18A1087FS'),
(45, '04IN', '04T2', 4, 'S5', '16A0029FS'),
(46, '06IN', '04T3', 4, 'S5', '19A1995FS'),
(47, '07IN', '07T2', 4, 'S5', '17A0763FS'),
(48, '08IN', '08T2', 4, 'S5', '18A1307FS'),
(49, '08IN', '08T3', 4, 'S5', '17A0793FS'),
(50, '08IN', '08T4', 4, 'S5', '16A0046FS'),
(51, '08IN', '08T5', 4, 'S5', '18A1094FS'),
(52, '08IN', '08T6', 4, 'S5', '17A0696FS'),
(53, '08IN', '08T7', 4, 'S5', '18A1743FS'),
(54, '08IN', '08T8', 4, 'S5', '17A0726FS'),
(55, '08IN', '08T9', 4, 'S5', '20A0691FS'),
(56, '08IN', '08T10', 4, 'S5', '16A1153FS'),
(57, '08IN', '08T11', 4, 'S5', '18A1093FS'),
(58, '08IN', '08T12', 4, 'S5', '17A0718FS'),
(59, '08IN', '08T13', 4, 'S5', '17A0921FS'),
(60, '08IN', '08T14', 4, 'S5', '18A1554FS'),
(61, '08IN', '08T15', 4, 'S5', '18A1132FS'),
(62, '08IN', '08T16', 4, 'S5', '19A1653FS'),
(63, '08IN', '08T17', 4, 'S5', '18A1133FS'),
(64, '08IN', '08T18', 4, 'S5', '17A0797FS'),
(65, '08IN', '08T19', 4, 'S5', '17A0927FS'),
(66, '08IN', '08T20', 4, 'S5', '19A1334FS'),
(67, '08IN', '08T21', 4, 'S5', '16A1047FS'),
(68, '08IN', '08T22', 4, 'S5', '16A0767FS'),
(69, '08IN', '08T23', 4, 'S5', '18A1154FS'),
(70, '08IN', '08T24', 4, 'S5', '20A0664FS'),
(71, '08IN', '08T25', 4, 'S5', '16A0208FS'),
(72, '08IN', '08T26', 4, 'S5', '17A0785FS'),
(73, '08IN', '08T27', 4, 'S5', '18A1104FS'),
(74, '08IN', '08T28', 4, 'S5', '17A0788FS'),
(75, '08IN', '08T29', 4, 'S5', '18A1135FS'),
(76, '08IN', '08T30', 4, 'S5', '16A0200FS'),
(77, '08IN', '08T31', 4, 'S5', '20A0683FS'),
(78, '08IN', '08T32', 4, 'S5', '18A1127FS'),
(79, '08IN', '08T33', 4, 'S5', '20A0678FS'),
(80, '08IN', '08T34', 4, 'S5', '19A1648FS'),
(81, '08IN', '08T35', 4, 'S5', '17A0783FS'),
(82, '08IN', '08T36', 4, 'S5', '18A0932FS'),
(83, '08IN', '08T37', 4, 'S5', '18A1131FS'),
(84, '08IN', '08T38', 4, 'S5', '17A0933FS'),
(85, '08IN', '08T39', 4, 'S5', '18A1128FS'),
(86, '08IN', '08T40', 4, 'S5', '18A1130FS'),
(87, '08IN', '08T41', 4, 'S5', '16A0189FS'),
(88, '08IN', '08T42', 4, 'S5', '18A1151FS'),
(89, '08IN', '08T43', 4, 'S5', '17A0743FS'),
(90, '08IN', '08T44', 4, 'S5', '17A0799FS'),
(91, '08IN', '08T45', 4, 'S5', '17A0930FS'),
(92, '08IN', '08T46', 4, 'S5', '17A1129FS'),
(93, '08IN', '08T47', 4, 'S5', '16A0742FS'),
(94, '08IN', '08T48', 4, 'S5', '17A0900FS');

-- --------------------------------------------------------

--
-- Structure de la table `superadministrateur`
--

CREATE TABLE `superadministrateur` (
  `idSuperAdministrateur` int(11) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `userName` varchar(250) NOT NULL,
  `passWord` varchar(250) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `numTel` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `statut` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `superadministrateur`
--

INSERT INTO `superadministrateur` (`idSuperAdministrateur`, `grade`, `userName`, `passWord`, `nom`, `prenom`, `numTel`, `email`, `statut`) VALUES
(1, 'superadmin', 'doyen', '123', 'NOM DOYEN', 'PRENOM DOYEN', '237', 'doyen@gmail.com', 'online');

-- --------------------------------------------------------

--
-- Structure de la table `uniteenseignement`
--

CREATE TABLE `uniteenseignement` (
  `idUniteEnseignement` int(11) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `codeUniteEnseignement` varchar(50) NOT NULL,
  `libelle` varchar(250) NOT NULL,
  `M` double DEFAULT NULL,
  `A` varchar(50) NOT NULL,
  `S` int(11) NOT NULL,
  `MEN` varchar(50) NOT NULL,
  `nbCredit` int(11) NOT NULL,
  `semestreUE` varchar(150) NOT NULL,
  `CC` double NOT NULL,
  `TPE` double NOT NULL,
  `TP` double NOT NULL,
  `EE` double NOT NULL,
  `idEtablissement` int(11) NOT NULL,
  `matricule` varchar(250) NOT NULL,
  `idAdministrateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `uniteenseignement`
--

INSERT INTO `uniteenseignement` (`idUniteEnseignement`, `categorie`, `codeUniteEnseignement`, `libelle`, `M`, `A`, `S`, `MEN`, `nbCredit`, `semestreUE`, `CC`, `TPE`, `TP`, `EE`, `idEtablissement`, `matricule`, `idAdministrateur`) VALUES
(503, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 15, '2021', 1, 'AB', 5, 'S5', 12, 9, 4, 15, 4, '20A0657FS', 4),
(504, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 14, '2021', 1, 'AB', 5, 'S5', 13, 9, 4, 14, 4, '17A0611FS', 4),
(505, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 14, '2021', 2, 'NV', 5, 'S5', 12, 9, 4, 14, 4, '18A1087FS', 4),
(506, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 11, '2021', 1, 'B', 5, 'S5', 12, 9, 4, 11, 4, '16A0029FS', 4),
(507, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 12, '2021', 1, 'AB', 5, 'S5', 8, 9, 4, 12, 4, '19A1995FS', 4),
(508, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 10, '2021', 2, 'P', 5, 'S5', 12, 9, 4, 10, 4, '17A0763FS', 4),
(509, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 13, '2021', 1, 'B', 5, 'S5', 12, 9, 4, 13, 4, '18A1307FS', 4),
(510, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 12, '2021', 2, 'AB', 5, 'S5', 13, 9, 4, 12, 4, '17A0793FS', 4),
(511, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 14, '2017', 1, 'AB', 5, 'S5', 12, 9, 4, 14, 4, '16A0046FS', 4),
(512, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 12, '2021', 1, 'AB', 5, 'S5', 13, 9, 4, 12, 4, '18A1094FS', 4),
(513, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 12, '2021', 2, 'NV', 5, 'S5', 12, 9, 4, 12, 4, '17A0696FS', 4),
(514, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 16, '2021', 1, 'B', 5, 'S5', 12, 9, 4, 16, 4, '18A1743FS', 4),
(515, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 12, '2018', 1, 'AB', 5, 'S5', 8, 9, 4, 12, 4, '17A0726FS', 4),
(516, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 12, '2021', 2, 'P', 5, 'S5', 12, 9, 4, 12, 4, '20A0691FS', 4),
(517, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 20, '2021', 1, 'B', 5, 'S5', 12, 9, 4, 20, 4, '16A1153FS', 4),
(518, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 11, '2021', 2, 'AB', 5, 'S5', 13, 9, 4, 11, 4, '18A1093FS', 4),
(519, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 11, '2021', 1, 'AB', 5, 'S5', 12, 9, 4, 11, 4, '17A0718FS', 4),
(520, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 11, '2021', 1, 'AB', 5, 'S5', 13, 9, 4, 11, 4, '17A0921FS', 4),
(521, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 11, '2021', 2, 'NV', 5, 'S5', 12, 9, 4, 11, 4, '18A1554FS', 4),
(522, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 11, '2021', 1, 'B', 5, 'S5', 12, 9, 4, 11, 4, '18A1132FS', 4),
(523, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 11, '2021', 1, 'AB', 5, 'S5', 8, 9, 4, 11, 4, '19A1653FS', 4),
(524, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 11, '2021', 2, 'P', 5, 'S5', 12, 9, 4, 11, 4, '18A1133FS', 4),
(525, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 11, '2021', 1, 'B', 5, 'S5', 12, 9, 4, 11, 4, '17A0797FS', 4),
(526, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 11, '2021', 2, 'AB', 5, 'S5', 13, 9, 4, 11, 4, '17A0927FS', 4),
(527, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 11, '2021', 1, 'AB', 5, 'S5', 14, 9, 4, 11, 4, '19A1334FS', 4),
(528, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 11, '2021', 1, 'AB', 5, 'S5', 12, 9, 4, 11, 4, '16A1047FS', 4),
(529, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 12, '2021', 2, 'NV', 5, 'S5', 12, 9, 4, 12, 4, '16A0767FS', 4),
(530, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 14, '2021', 1, 'B', 5, 'S5', 16, 9, 4, 14, 4, '18A1154FS', 4),
(531, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 12, '2021', 1, 'AB', 5, 'S5', 12, 9, 4, 12, 4, '20A0664FS', 4),
(532, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 12, '2021', 2, 'P', 5, 'S5', 12, 9, 4, 12, 4, '16A0208FS', 4),
(533, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 16, '2021', 1, 'B', 5, 'S5', 20, 9, 4, 16, 4, '17A0785FS', 4),
(534, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 12, '2021', 2, 'AB', 5, 'S5', 12, 9, 4, 12, 4, '18A1104FS', 4),
(535, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 12, '2021', 1, 'AB', 5, 'S5', 14, 9, 4, 12, 4, '17A0788FS', 4),
(536, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 20, '2021', 1, 'AB', 5, 'S5', 12, 9, 4, 20, 4, '18A1135FS', 4),
(537, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 11, '2021', 1, 'NV', 5, 'S5', 12, 9, 4, 11, 4, '16A0200FS', 4),
(538, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 11, '2021', 1, 'B', 5, 'S5', 16, 9, 4, 11, 4, '20A0683FS', 4),
(539, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 11, '2021', 1, 'AB', 5, 'S5', 12, 9, 4, 11, 4, '18A1127FS', 4),
(540, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 11, '2021', 1, 'P', 5, 'S5', 12, 9, 4, 11, 4, '20A0678FS', 4),
(541, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 12, '2021', 1, 'B', 5, 'S5', 13.63, 9, 4, 12, 4, '19A1648FS', 4),
(542, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 14, '2021', 1, 'AB', 5, 'S5', 15.23, 9, 4, 14, 4, '17A0783FS', 4),
(543, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 12, '2021', 1, 'AB', 5, 'S5', 13.65, 9, 4, 12, 4, '18A0932FS', 4),
(544, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 12, '2021', 1, 'AB', 5, 'S5', 13.66, 9, 4, 12, 4, '18A1131FS', 4),
(545, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 12, '2021', 1, 'NV', 5, 'S5', 13.67, 9, 4, 12, 4, '17A0933FS', 4),
(546, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 14, '2021', 1, 'B', 5, 'S5', 14, 9, 4, 14, 4, '18A1128FS', 4),
(547, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 12, '2020', 1, 'AB', 5, 'S5', 12, 9, 4, 12, 4, '18A1130FS', 4),
(548, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 12, '2021', 1, 'P', 5, 'S5', 12, 9, 4, 12, 4, '16A0189FS', 4),
(549, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 16, '2021', 1, 'B', 5, 'S5', 16, 9, 4, 16, 4, '18A1151FS', 4),
(550, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 12, '2021', 1, 'AB', 5, 'S5', 12, 9, 4, 12, 4, '17A0743FS', 4),
(551, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 12, '2021', 1, 'AB', 5, 'S5', 12, 9, 4, 12, 4, '17A0799FS', 4),
(552, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 20, '2021', 1, 'AB', 5, 'S5', 20, 9, 4, 20, 4, '17A0930FS', 4),
(553, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 11, '2021', 1, 'NV', 5, 'S5', 12, 9, 0, 11, 4, '17A1129FS', 4),
(554, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 11, '2021', 1, 'B', 5, 'S5', 14, 9, 0, 11, 4, '16A0742FS', 4),
(555, 'optionnele', 'INF355', 'THEORIE DES ENSEMBLES', 11, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 11, 4, '17A0900FS', 4),
(556, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 15, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 13.63, 4, '20A0657FS', 4),
(557, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 14, '2021', 1, 'AB', 5, 'S5', 13, 9, 0, 15.23, 4, '17A0611FS', 4),
(558, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 14, '2021', 2, 'NV', 5, 'S5', 12, 9, 0, 13.65, 4, '18A1087FS', 4),
(559, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 11, '2021', 1, 'B', 5, 'S5', 12, 9, 0, 13.66, 4, '16A0029FS', 4),
(560, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 12, '2021', 1, 'AB', 5, 'S5', 8, 9, 0, 13.67, 4, '19A1995FS', 4),
(561, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 10, '2021', 2, 'P', 5, 'S5', 12, 9, 0, 13.68, 4, '17A0763FS', 4),
(562, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 13, '2021', 1, 'B', 5, 'S5', 12, 9, 0, 13.69, 4, '18A1307FS', 4),
(563, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 12, '2021', 2, 'AB', 5, 'S5', 13, 9, 0, 13.7, 4, '17A0793FS', 4),
(564, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 14, '2017', 1, 'AB', 5, 'S5', 12, 9, 0, 12, 4, '16A0046FS', 4),
(565, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 12, '2021', 1, 'AB', 5, 'S5', 13, 9, 0, 14, 4, '18A1094FS', 4),
(566, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 12, '2021', 2, 'NV', 5, 'S5', 12, 9, 0, 12, 4, '17A0696FS', 4),
(567, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 16, '2021', 1, 'B', 5, 'S5', 12, 9, 0, 12, 4, '18A1743FS', 4),
(568, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 12, '2018', 1, 'AB', 5, 'S5', 8, 9, 0, 16, 4, '17A0726FS', 4),
(569, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 12, '2021', 2, 'P', 5, 'S5', 12, 9, 0, 12, 4, '20A0691FS', 4),
(570, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 20, '2021', 1, 'B', 5, 'S5', 12, 9, 0, 12, 4, '16A1153FS', 4),
(571, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 11, '2021', 2, 'AB', 5, 'S5', 13, 9, 0, 20, 4, '18A1093FS', 4),
(572, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 11, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 12, 4, '17A0718FS', 4),
(573, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 11, '2021', 1, 'AB', 5, 'S5', 13, 9, 0, 14, 4, '17A0921FS', 4),
(574, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 11, '2021', 2, 'NV', 5, 'S5', 12, 9, 0, 12, 4, '18A1554FS', 4),
(575, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 11, '2021', 1, 'B', 5, 'S5', 12, 9, 0, 12, 4, '18A1132FS', 4),
(576, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 11, '2021', 1, 'AB', 5, 'S5', 8, 9, 0, 16, 4, '19A1653FS', 4),
(577, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 11, '2021', 2, 'P', 5, 'S5', 12, 9, 0, 12, 4, '18A1133FS', 4),
(578, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 11, '2021', 1, 'B', 5, 'S5', 12, 9, 0, 12, 4, '17A0797FS', 4),
(579, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 11, '2021', 2, 'AB', 5, 'S5', 13, 9, 0, 13.63, 4, '17A0927FS', 4),
(580, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 11, '2021', 1, 'AB', 5, 'S5', 14, 9, 0, 15.23, 4, '19A1334FS', 4),
(581, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 11, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 13.65, 4, '16A1047FS', 4),
(582, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 12, '2021', 2, 'NV', 5, 'S5', 12, 9, 0, 13.66, 4, '16A0767FS', 4),
(583, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 14, '2021', 1, 'B', 5, 'S5', 16, 9, 0, 13.67, 4, '18A1154FS', 4),
(584, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 12, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 13.7, 4, '20A0664FS', 4),
(585, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 12, '2021', 2, 'P', 5, 'S5', 12, 9, 0, 12, 4, '16A0208FS', 4),
(586, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 16, '2021', 1, 'B', 5, 'S5', 20, 9, 0, 14, 4, '17A0785FS', 4),
(587, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 12, '2021', 2, 'AB', 5, 'S5', 12, 9, 0, 12, 4, '18A1104FS', 4),
(588, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 12, '2021', 1, 'AB', 5, 'S5', 14, 9, 0, 12, 4, '17A0788FS', 4),
(589, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 20, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 16, 4, '18A1135FS', 4),
(590, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 11, '2021', 1, 'NV', 5, 'S5', 12, 9, 0, 12, 4, '16A0200FS', 4),
(591, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 11, '2021', 1, 'B', 5, 'S5', 16, 9, 0, 12, 4, '20A0683FS', 4),
(592, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 11, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 20, 4, '18A1127FS', 4),
(593, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 11, '2021', 1, 'P', 5, 'S5', 12, 9, 0, 12, 4, '20A0678FS', 4),
(594, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 12, '2021', 1, 'B', 5, 'S5', 13.63, 9, 0, 14, 4, '19A1648FS', 4),
(595, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 14, '2021', 1, 'AB', 5, 'S5', 15.23, 9, 0, 12, 4, '17A0783FS', 4),
(596, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 12, '2021', 1, 'AB', 5, 'S5', 13.65, 9, 0, 12, 4, '18A0932FS', 4),
(597, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 12, '2021', 1, 'AB', 5, 'S5', 13.66, 9, 0, 16, 4, '18A1131FS', 4),
(598, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 12, '2021', 1, 'NV', 5, 'S5', 13.67, 9, 0, 12, 4, '17A0933FS', 4),
(599, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 14, '2021', 1, 'B', 5, 'S5', 14, 9, 0, 12, 4, '18A1128FS', 4),
(600, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 12, '2020', 1, 'AB', 5, 'S5', 12, 9, 0, 13.63, 4, '18A1130FS', 4),
(601, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 12, '2021', 1, 'P', 5, 'S5', 12, 9, 0, 15.23, 4, '16A0189FS', 4),
(602, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 16, '2021', 1, 'B', 5, 'S5', 16, 9, 0, 13.65, 4, '18A1151FS', 4),
(603, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 12, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 13.66, 4, '17A0743FS', 4),
(604, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 12, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 13.67, 4, '17A0799FS', 4),
(605, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 20, '2021', 1, 'AB', 5, 'S5', 20, 9, 0, 15.23, 4, '17A0930FS', 4),
(606, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 11, '2021', 1, 'NV', 5, 'S5', 12, 9, 0, 13.65, 4, '17A1129FS', 4),
(607, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 11, '2021', 1, 'B', 5, 'S5', 14, 9, 0, 13.66, 4, '16A0742FS', 4),
(608, 'fondamentale', 'INF315', 'CONCEPTION ET ANALYSE DES ALGORITHMES', 11, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 13.67, 4, '17A0900FS', 4),
(609, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 15, '2017', 2, 'AB', 5, 'S5', 12, 9, 0, 13.63, 4, '20A0657FS', 4),
(610, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 14, '2021', 2, 'AB', 5, 'S5', 13, 9, 0, 15.23, 4, '17A0611FS', 4),
(611, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 14, '2021', 2, 'NV', 5, 'S5', 12, 9, 0, 13.65, 4, '18A1087FS', 4),
(612, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 11, '2021', 1, 'B', 5, 'S5', 12, 9, 0, 13.66, 4, '16A0029FS', 4),
(613, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 0, '2017', 2, 'AB', 5, 'S5', 8, 9, 0, 13.67, 4, '19A1995FS', 4),
(614, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 10, '2021', 2, 'P', 5, 'S5', 12, 9, 0, 13.68, 4, '17A0763FS', 4),
(615, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 13, '2021', 1, 'B', 5, 'S5', 12, 9, 0, 13.69, 4, '18A1307FS', 4),
(616, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 12, '2017', 2, 'AB', 5, 'S5', 13, 9, 0, 13.7, 4, '17A0793FS', 4),
(617, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 14, '2017', 1, 'AB', 5, 'S5', 12, 9, 0, 12, 4, '16A0046FS', 4),
(618, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 12, '2021', 1, 'AB', 5, 'S5', 13, 9, 0, 14, 4, '18A1094FS', 4),
(619, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 12, '2021', 2, 'NV', 5, 'S5', 12, 9, 0, 12, 4, '17A0696FS', 4),
(620, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 16, '2021', 2, 'B', 5, 'S5', 12, 9, 0, 12, 4, '18A1743FS', 4),
(621, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 12, '2017', 1, 'AB', 5, 'S5', 8, 9, 0, 16, 4, '17A0726FS', 4),
(622, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 12, '2021', 2, 'P', 5, 'S5', 12, 9, 0, 12, 4, '20A0691FS', 4),
(623, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 20, '2021', 1, 'B', 5, 'S5', 12, 9, 0, 12, 4, '16A1153FS', 4),
(624, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 11, '2017', 2, 'AB', 5, 'S5', 13, 9, 0, 20, 4, '18A1093FS', 4),
(625, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 11, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 12, 4, '17A0718FS', 4),
(626, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 11, '2021', 1, 'AB', 5, 'S5', 13, 9, 0, 14, 4, '17A0921FS', 4),
(627, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 11, '2017', 2, 'NV', 5, 'S5', 12, 9, 0, 12, 4, '18A1554FS', 4),
(628, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 11, '2021', 1, 'B', 5, 'S5', 12, 9, 0, 12, 4, '18A1132FS', 4),
(629, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 11, '2021', 1, 'AB', 5, 'S5', 8, 9, 0, 16, 4, '19A1653FS', 4),
(630, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 11, '2021', 2, 'P', 5, 'S5', 12, 9, 0, 12, 4, '18A1133FS', 4),
(631, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 11, '2021', 1, 'B', 5, 'S5', 12, 9, 0, 12, 4, '17A0797FS', 4),
(632, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 11, '2021', 2, 'AB', 5, 'S5', 13, 9, 0, 13.63, 4, '17A0927FS', 4),
(633, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 11, '2021', 1, 'AB', 5, 'S5', 14, 9, 0, 15.23, 4, '19A1334FS', 4),
(634, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 11, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 13.65, 4, '16A1047FS', 4),
(635, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 12, '2021', 2, 'NV', 5, 'S5', 12, 9, 0, 13.66, 4, '16A0767FS', 4),
(636, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 14, '2021', 1, 'B', 5, 'S5', 16, 9, 0, 13.67, 4, '18A1154FS', 4),
(637, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 12, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 13.7, 4, '20A0664FS', 4),
(638, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 12, '2021', 2, 'P', 5, 'S5', 12, 9, 0, 12, 4, '16A0208FS', 4),
(639, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 16, '2021', 1, 'B', 5, 'S5', 20, 9, 0, 14, 4, '17A0785FS', 4),
(640, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 12, '2021', 2, 'AB', 5, 'S5', 12, 9, 0, 12, 4, '18A1104FS', 4),
(641, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 12, '2021', 1, 'AB', 5, 'S5', 14, 9, 0, 12, 4, '17A0788FS', 4),
(642, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 20, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 16, 4, '18A1135FS', 4),
(643, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 11, '2021', 1, 'NV', 5, 'S5', 12, 9, 0, 12, 4, '16A0200FS', 4),
(644, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 11, '2021', 1, 'B', 5, 'S5', 16, 9, 0, 12, 4, '20A0683FS', 4),
(645, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 11, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 20, 4, '18A1127FS', 4),
(646, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 11, '2021', 1, 'P', 5, 'S5', 12, 9, 0, 12, 4, '20A0678FS', 4),
(647, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 12, '2021', 1, 'B', 5, 'S5', 13.63, 9, 0, 14, 4, '19A1648FS', 4),
(648, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 14, '2021', 1, 'AB', 5, 'S5', 15.23, 9, 0, 12, 4, '17A0783FS', 4),
(649, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 12, '2021', 1, 'AB', 5, 'S5', 13.65, 9, 0, 12, 4, '18A0932FS', 4),
(650, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 12, '2021', 1, 'AB', 5, 'S5', 13.66, 9, 0, 16, 4, '18A1131FS', 4),
(651, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 12, '2021', 1, 'NV', 5, 'S5', 13.67, 9, 0, 12, 4, '17A0933FS', 4),
(652, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 14, '2021', 1, 'B', 5, 'S5', 14, 9, 0, 12, 4, '18A1128FS', 4),
(653, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 12, '2020', 1, 'AB', 5, 'S5', 12, 9, 0, 13.63, 4, '18A1130FS', 4),
(654, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 12, '2021', 1, 'P', 5, 'S5', 12, 9, 0, 15.23, 4, '16A0189FS', 4),
(655, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 16, '2021', 1, 'B', 5, 'S5', 16, 9, 0, 13.65, 4, '18A1151FS', 4),
(656, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 12, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 13.66, 4, '17A0743FS', 4),
(657, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 12, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 13.67, 4, '17A0799FS', 4),
(658, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 20, '2021', 1, 'AB', 5, 'S5', 20, 9, 0, 15.23, 4, '17A0930FS', 4),
(659, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 11, '2021', 1, 'NV', 5, 'S5', 12, 9, 0, 13.65, 4, '17A1129FS', 4),
(660, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 11, '2021', 1, 'B', 5, 'S5', 14, 9, 0, 13.66, 4, '16A0742FS', 4),
(661, 'fondamentale', 'INF325', 'LANGAGES FORMELS ET COMPILATION', 11, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 13.67, 4, '17A0900FS', 4),
(662, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 15, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 13.63, 4, '20A0657FS', 4),
(663, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 14, '2021', 1, 'AB', 5, 'S5', 13, 9, 0, 15.23, 4, '17A0611FS', 4),
(664, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 14, '2021', 2, 'NV', 5, 'S5', 12, 9, 0, 13.65, 4, '18A1087FS', 4),
(665, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 11, '2021', 1, 'B', 5, 'S5', 12, 9, 0, 13.66, 4, '16A0029FS', 4),
(666, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 12, '2021', 1, 'AB', 5, 'S5', 8, 9, 0, 13.67, 4, '19A1995FS', 4),
(667, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 10, '2021', 2, 'P', 5, 'S5', 12, 9, 0, 13.68, 4, '17A0763FS', 4),
(668, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 13, '2021', 1, 'B', 5, 'S5', 12, 9, 0, 13.69, 4, '18A1307FS', 4),
(669, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 12, '2021', 2, 'AB', 5, 'S5', 13, 9, 0, 13.7, 4, '17A0793FS', 4),
(670, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 14, '2017', 1, 'AB', 5, 'S5', 12, 9, 0, 12, 4, '16A0046FS', 4),
(671, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 12, '2021', 1, 'AB', 5, 'S5', 13, 9, 0, 14, 4, '18A1094FS', 4),
(672, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 12, '2021', 2, 'NV', 5, 'S5', 12, 9, 0, 12, 4, '17A0696FS', 4),
(673, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 16, '2021', 1, 'B', 5, 'S5', 12, 9, 0, 12, 4, '18A1743FS', 4),
(674, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 12, '2018', 1, 'AB', 5, 'S5', 8, 9, 0, 16, 4, '17A0726FS', 4),
(675, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 12, '2021', 2, 'P', 5, 'S5', 12, 9, 0, 12, 4, '20A0691FS', 4),
(676, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 20, '2021', 1, 'B', 5, 'S5', 12, 9, 0, 12, 4, '16A1153FS', 4),
(677, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 11, '2021', 2, 'AB', 5, 'S5', 13, 9, 0, 20, 4, '18A1093FS', 4),
(678, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 11, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 12, 4, '17A0718FS', 4),
(679, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 11, '2021', 1, 'AB', 5, 'S5', 13, 9, 0, 14, 4, '17A0921FS', 4),
(680, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 11, '2021', 2, 'NV', 5, 'S5', 12, 9, 0, 12, 4, '18A1554FS', 4),
(681, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 11, '2021', 1, 'B', 5, 'S5', 12, 9, 0, 12, 4, '18A1132FS', 4),
(682, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 11, '2021', 1, 'AB', 5, 'S5', 8, 9, 0, 16, 4, '19A1653FS', 4),
(683, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 11, '2021', 2, 'P', 5, 'S5', 12, 9, 0, 12, 4, '18A1133FS', 4),
(684, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 11, '2021', 1, 'B', 5, 'S5', 12, 9, 0, 12, 4, '17A0797FS', 4),
(685, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 11, '2021', 2, 'AB', 5, 'S5', 13, 9, 0, 13.63, 4, '17A0927FS', 4),
(686, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 11, '2021', 1, 'AB', 5, 'S5', 14, 9, 0, 15.23, 4, '19A1334FS', 4),
(687, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 11, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 13.65, 4, '16A1047FS', 4),
(688, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 12, '2021', 2, 'NV', 5, 'S5', 12, 9, 0, 13.66, 4, '16A0767FS', 4),
(689, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 14, '2021', 1, 'B', 5, 'S5', 16, 9, 0, 13.67, 4, '18A1154FS', 4),
(690, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 12, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 13.7, 4, '20A0664FS', 4),
(691, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 12, '2021', 2, 'P', 5, 'S5', 12, 9, 0, 12, 4, '16A0208FS', 4),
(692, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 16, '2021', 1, 'B', 5, 'S5', 20, 9, 0, 14, 4, '17A0785FS', 4),
(693, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 12, '2021', 2, 'AB', 5, 'S5', 12, 9, 0, 12, 4, '18A1104FS', 4),
(694, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 12, '2021', 1, 'AB', 5, 'S5', 14, 9, 0, 12, 4, '17A0788FS', 4),
(695, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 20, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 16, 4, '18A1135FS', 4),
(696, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 11, '2021', 1, 'NV', 5, 'S5', 12, 9, 0, 12, 4, '16A0200FS', 4),
(697, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 11, '2021', 1, 'B', 5, 'S5', 16, 9, 0, 12, 4, '20A0683FS', 4),
(698, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 11, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 20, 4, '18A1127FS', 4),
(699, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 11, '2021', 1, 'P', 5, 'S5', 12, 9, 0, 12, 4, '20A0678FS', 4),
(700, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 12, '2021', 1, 'B', 5, 'S5', 13.63, 9, 0, 14, 4, '19A1648FS', 4),
(701, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 14, '2021', 1, 'AB', 5, 'S5', 15.23, 9, 0, 12, 4, '17A0783FS', 4),
(702, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 12, '2021', 1, 'AB', 5, 'S5', 13.65, 9, 0, 12, 4, '18A0932FS', 4),
(703, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 12, '2021', 1, 'AB', 5, 'S5', 13.66, 9, 0, 16, 4, '18A1131FS', 4),
(704, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 12, '2021', 1, 'NV', 5, 'S5', 13.67, 9, 0, 12, 4, '17A0933FS', 4),
(705, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 14, '2021', 1, 'B', 5, 'S5', 14, 9, 0, 12, 4, '18A1128FS', 4),
(706, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 12, '2020', 1, 'AB', 5, 'S5', 12, 9, 0, 13.63, 4, '18A1130FS', 4),
(707, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 12, '2021', 1, 'P', 5, 'S5', 12, 9, 0, 15.23, 4, '16A0189FS', 4),
(708, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 16, '2021', 1, 'B', 5, 'S5', 16, 9, 0, 13.65, 4, '18A1151FS', 4),
(709, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 12, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 13.66, 4, '17A0743FS', 4),
(710, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 12, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 13.67, 4, '17A0799FS', 4),
(711, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 20, '2021', 1, 'AB', 5, 'S5', 20, 9, 0, 15.23, 4, '17A0930FS', 4),
(712, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 11, '2021', 1, 'NV', 5, 'S5', 12, 9, 0, 13.65, 4, '17A1129FS', 4),
(713, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 11, '2021', 1, 'B', 5, 'S5', 14, 9, 0, 13.66, 4, '16A0742FS', 4),
(714, 'fondamentale', 'INF345', 'GENIE LOGICIEL', 11, '2021', 1, 'AB', 5, 'S5', 12, 9, 0, 13.67, 4, '17A0900FS', 4),
(715, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 15, '2021', 1, 'AB', 5, 'S5', 12, 8, 0, 13.63, 4, '20A0657FS', 4),
(716, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 14, '2021', 1, 'AB', 5, 'S5', 14, 8, 0, 15.23, 4, '17A0611FS', 4),
(717, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 14, '2021', 2, 'NV', 5, 'S5', 12, 8, 0, 13.65, 4, '18A1087FS', 4),
(718, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 11, '2021', 1, 'B', 5, 'S5', 12, 8, 0, 13.66, 4, '16A0029FS', 4),
(719, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 12, '2021', 1, 'AB', 5, 'S5', 16, 8, 0, 13.67, 4, '19A1995FS', 4),
(720, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 10, '2021', 2, 'P', 5, 'S5', 12, 8, 0, 13.68, 4, '17A0763FS', 4),
(721, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 13, '2021', 1, 'B', 5, 'S5', 12, 8, 0, 13.69, 4, '18A1307FS', 4),
(722, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 12, '2021', 2, 'AB', 5, 'S5', 20, 8, 0, 13.7, 4, '17A0793FS', 4),
(723, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 14, '2017', 1, 'AB', 5, 'S5', 12, 8, 0, 12, 4, '16A0046FS', 4),
(724, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 12, '2021', 1, 'AB', 5, 'S5', 14, 8, 0, 14, 4, '18A1094FS', 4),
(725, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 12, '2021', 2, 'NV', 5, 'S5', 12, 8, 0, 12, 4, '17A0696FS', 4),
(726, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 16, '2021', 1, 'B', 5, 'S5', 12, 8, 0, 12, 4, '18A1743FS', 4),
(727, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 12, '2018', 1, 'AB', 5, 'S5', 16, 8, 0, 16, 4, '17A0726FS', 4),
(728, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 12, '2021', 2, 'P', 5, 'S5', 12, 8, 0, 12, 4, '20A0691FS', 4),
(729, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 20, '2021', 1, 'B', 5, 'S5', 12, 8, 0, 12, 4, '16A1153FS', 4),
(730, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 11, '2021', 2, 'AB', 5, 'S5', 20, 8, 0, 20, 4, '18A1093FS', 4),
(731, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 11, '2021', 1, 'AB', 5, 'S5', 12, 8, 0, 12, 4, '17A0718FS', 4),
(732, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 11, '2021', 1, 'AB', 5, 'S5', 14, 8, 0, 14, 4, '17A0921FS', 4),
(733, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 11, '2021', 2, 'NV', 5, 'S5', 12, 8, 0, 12, 4, '18A1554FS', 4),
(734, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 11, '2021', 1, 'B', 5, 'S5', 12, 8, 0, 12, 4, '18A1132FS', 4),
(735, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 11, '2021', 1, 'AB', 5, 'S5', 16, 8, 0, 16, 4, '19A1653FS', 4),
(736, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 11, '2021', 2, 'P', 5, 'S5', 12, 8, 0, 12, 4, '18A1133FS', 4),
(737, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 11, '2021', 1, 'B', 5, 'S5', 12, 8, 0, 12, 4, '17A0797FS', 4),
(738, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 11, '2021', 2, 'AB', 5, 'S5', 20, 8, 0, 13.63, 4, '17A0927FS', 4),
(739, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 11, '2021', 1, 'AB', 5, 'S5', 12, 8, 0, 15.23, 4, '19A1334FS', 4),
(740, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 11, '2021', 1, 'AB', 5, 'S5', 14, 8, 0, 13.65, 4, '16A1047FS', 4),
(741, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 12, '2021', 2, 'NV', 5, 'S5', 12, 8, 0, 13.66, 4, '16A0767FS', 4),
(742, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 14, '2021', 1, 'B', 5, 'S5', 12, 8, 0, 13.67, 4, '18A1154FS', 4),
(743, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 12, '2021', 1, 'AB', 5, 'S5', 16, 8, 0, 13.7, 4, '20A0664FS', 4),
(744, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 12, '2021', 2, 'P', 5, 'S5', 12, 8, 0, 12, 4, '16A0208FS', 4),
(745, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 16, '2021', 1, 'B', 5, 'S5', 12, 8, 0, 14, 4, '17A0785FS', 4),
(746, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 12, '2021', 2, 'AB', 5, 'S5', 20, 8, 0, 12, 4, '18A1104FS', 4),
(747, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 12, '2021', 1, 'AB', 5, 'S5', 12, 8, 0, 12, 4, '17A0788FS', 4),
(748, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 20, '2021', 1, 'AB', 5, 'S5', 14, 8, 0, 16, 4, '18A1135FS', 4),
(749, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 11, '2021', 1, 'NV', 5, 'S5', 12, 8, 0, 12, 4, '16A0200FS', 4),
(750, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 11, '2021', 1, 'B', 5, 'S5', 12, 8, 0, 12, 4, '20A0683FS', 4),
(751, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 11, '2021', 1, 'AB', 5, 'S5', 16, 8, 0, 20, 4, '18A1127FS', 4),
(752, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 11, '2021', 1, 'P', 5, 'S5', 12, 8, 0, 12, 4, '20A0678FS', 4),
(753, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 12, '2021', 1, 'B', 5, 'S5', 12, 8, 0, 14, 4, '19A1648FS', 4),
(754, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 14, '2021', 1, 'AB', 5, 'S5', 20, 8, 0, 12, 4, '17A0783FS', 4),
(755, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 12, '2021', 1, 'AB', 5, 'S5', 12, 8, 0, 12, 4, '18A0932FS', 4),
(756, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 12, '2021', 1, 'AB', 5, 'S5', 14, 8, 0, 16, 4, '18A1131FS', 4),
(757, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 12, '2021', 1, 'NV', 5, 'S5', 12, 8, 0, 12, 4, '17A0933FS', 4),
(758, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 14, '2021', 1, 'B', 5, 'S5', 12, 8, 0, 12, 4, '18A1128FS', 4),
(759, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 12, '2020', 1, 'AB', 5, 'S5', 16, 8, 0, 13.63, 4, '18A1130FS', 4),
(760, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 12, '2021', 1, 'P', 5, 'S5', 12, 8, 0, 15.23, 4, '16A0189FS', 4),
(761, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 16, '2021', 1, 'B', 5, 'S5', 12, 8, 0, 13.65, 4, '18A1151FS', 4),
(762, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 12, '2021', 1, 'AB', 5, 'S5', 20, 8, 0, 13.66, 4, '17A0743FS', 4),
(763, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 12, '2021', 1, 'AB', 5, 'S5', 12, 8, 0, 13.67, 4, '17A0799FS', 4),
(764, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 20, '2021', 1, 'AB', 5, 'S5', 12, 8, 0, 15.23, 4, '17A0930FS', 4),
(765, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 11, '2021', 1, 'NV', 5, 'S5', 12, 8, 0, 13.65, 4, '17A1129FS', 4),
(766, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 11, '2021', 1, 'B', 5, 'S5', 12, 8, 0, 13.66, 4, '16A0742FS', 4),
(767, 'complementaire', 'INF335 ', 'FORMATION BILINGUE', 11, '2021', 1, 'AB', 5, 'S5', 12, 8, 0, 13.67, 4, '17A0900FS', 4),
(768, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 12, '2021', 1, 'AB', 5, 'S5', 11, 8, 5, 11, 4, '20A0657FS', 4),
(769, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 5, '2021', 1, 'AB', 5, 'S5', 14, 8, 5, 14, 4, '17A0611FS', 4),
(770, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 15, '2021', 2, 'NV', 5, 'S5', 20, 8, 5, 20, 4, '18A1087FS', 4),
(771, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 8, '2021', 1, 'B', 5, 'S5', 12, 8, 5, 12, 4, '16A0029FS', 4),
(772, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 12, '2021', 1, 'AB', 5, 'S5', 12, 8, 5, 12, 4, '19A1995FS', 4),
(773, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 8, '2021', 2, 'P', 5, 'S5', 17, 8, 5, 17, 4, '17A0763FS', 4),
(774, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 15, '2021', 1, 'B', 5, 'S5', 12, 8, 5, 12, 4, '18A1307FS', 4),
(775, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 11, '2021', 2, 'AB', 5, 'S5', 12, 8, 5, 12, 4, '17A0793FS', 4),
(776, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 11, '2017', 1, 'AB', 5, 'S5', 11, 8, 5, 11, 4, '16A0046FS', 4),
(777, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 14, '2021', 1, 'AB', 5, 'S5', 14, 8, 5, 14, 4, '18A1094FS', 4),
(778, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 20, '2021', 2, 'NV', 5, 'S5', 20, 8, 5, 20, 4, '17A0696FS', 4),
(779, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 12, '2021', 1, 'B', 5, 'S5', 12, 8, 5, 12, 4, '18A1743FS', 4),
(780, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 12, '2018', 1, 'AB', 5, 'S5', 12, 8, 5, 12, 4, '17A0726FS', 4),
(781, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 17, '2021', 2, 'P', 5, 'S5', 17, 8, 5, 17, 4, '20A0691FS', 4),
(782, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 12, '2021', 1, 'B', 5, 'S5', 12, 8, 5, 12, 4, '16A1153FS', 4),
(783, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 12, '2021', 2, 'AB', 5, 'S5', 12, 8, 5, 12, 4, '18A1093FS', 4),
(784, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 11, '2021', 1, 'AB', 5, 'S5', 11, 8, 5, 11, 4, '17A0718FS', 4),
(785, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 14, '2021', 1, 'AB', 5, 'S5', 14, 8, 5, 14, 4, '17A0921FS', 4),
(786, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 20, '2021', 2, 'NV', 5, 'S5', 20, 8, 5, 20, 4, '18A1554FS', 4),
(787, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 12, '2021', 1, 'B', 5, 'S5', 12, 8, 5, 12, 4, '18A1132FS', 4),
(788, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 12, '2021', 1, 'AB', 5, 'S5', 12, 8, 5, 12, 4, '19A1653FS', 4),
(789, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 17, '2021', 2, 'P', 5, 'S5', 17, 8, 5, 17, 4, '18A1133FS', 4),
(790, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 12, '2021', 1, 'B', 5, 'S5', 12, 8, 5, 12, 4, '17A0797FS', 4),
(791, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 12, '2021', 2, 'AB', 5, 'S5', 12, 8, 5, 12, 4, '17A0927FS', 4),
(792, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 11, '2021', 1, 'AB', 5, 'S5', 11, 8, 5, 11, 4, '19A1334FS', 4),
(793, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 14, '2021', 1, 'AB', 5, 'S5', 14, 8, 5, 14, 4, '16A1047FS', 4),
(794, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 20, '2021', 2, 'NV', 5, 'S5', 20, 8, 5, 20, 4, '16A0767FS', 4),
(795, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 12, '2021', 1, 'B', 5, 'S5', 12, 8, 5, 12, 4, '18A1154FS', 4),
(796, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 12, '2021', 1, 'AB', 5, 'S5', 12, 8, 5, 12, 4, '20A0664FS', 4),
(797, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 17, '2021', 2, 'P', 5, 'S5', 17, 8, 5, 17, 4, '16A0208FS', 4),
(798, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 12, '2021', 1, 'B', 5, 'S5', 12, 8, 5, 12, 4, '17A0785FS', 4),
(799, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 12, '2021', 2, 'AB', 5, 'S5', 12, 8, 5, 12, 4, '18A1104FS', 4),
(800, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 11, '2021', 1, 'AB', 5, 'S5', 11, 8, 5, 11, 4, '17A0788FS', 4),
(801, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 14, '2021', 1, 'AB', 5, 'S5', 14, 8, 5, 14, 4, '18A1135FS', 4),
(802, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 12, '2021', 1, 'NV', 5, 'S5', 20, 8, 5, 20, 4, '16A0200FS', 4),
(803, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 5, '2021', 1, 'B', 5, 'S5', 12, 8, 5, 12, 4, '20A0683FS', 4),
(804, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 15, '2021', 1, 'AB', 5, 'S5', 12, 8, 5, 12, 4, '18A1127FS', 4),
(805, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 8, '2021', 1, 'P', 5, 'S5', 17, 8, 5, 17, 4, '20A0678FS', 4),
(806, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 12, '2021', 1, 'B', 5, 'S5', 12, 8, 5, 12, 4, '19A1648FS', 4),
(807, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 8, '2021', 1, 'AB', 5, 'S5', 12, 8, 5, 12, 4, '17A0783FS', 4),
(808, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 15, '2021', 1, 'AB', 5, 'S5', 11, 8, 5, 11, 4, '18A0932FS', 4),
(809, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 11, '2021', 1, 'AB', 5, 'S5', 14, 8, 5, 14, 4, '18A1131FS', 4),
(810, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 11, '2021', 1, 'NV', 5, 'S5', 20, 8, 5, 20, 4, '17A0933FS', 4),
(811, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 14, '2021', 1, 'B', 5, 'S5', 12, 8, 5, 12, 4, '18A1128FS', 4),
(812, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 20, '2020', 1, 'AB', 5, 'S5', 12, 8, 5, 12, 4, '18A1130FS', 4),
(813, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 12, '2021', 1, 'P', 5, 'S5', 17, 8, 5, 17, 4, '16A0189FS', 4),
(814, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 12, '2021', 1, 'B', 5, 'S5', 12, 8, 5, 12, 4, '18A1151FS', 4),
(815, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 17, '2021', 1, 'AB', 5, 'S5', 12, 8, 5, 12, 4, '17A0743FS', 4),
(816, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 12, '2021', 1, 'AB', 5, 'S5', 11, 8, 5, 11, 4, '17A0799FS', 4),
(817, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 12, '2021', 1, 'AB', 5, 'S5', 14, 8, 5, 14, 4, '17A0930FS', 4),
(818, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 12, '2021', 1, 'NV', 5, 'S5', 20, 8, 5, 20, 4, '17A1129FS', 4),
(819, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 12, '2021', 1, 'B', 5, 'S5', 12, 8, 5, 12, 4, '16A0742FS', 4),
(820, 'complementaire', 'INF365', 'RECHERCHE OPERATIONNEL', 11, '2021', 1, 'AB', 5, 'S5', 12, 8, 5, 12, 4, '17A0900FS', 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`idAdministrateur`),
  ADD KEY `idSuperAdministrateur` (`idSuperAdministrateur`);

--
-- Index pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`idEtablissement`),
  ADD KEY `idSuperAdministrateur` (`idSuperAdministrateur`),
  ADD KEY `idAdministrateur` (`idAdministrateur`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`idEtudiant`,`matricule`),
  ADD UNIQUE KEY `matricule` (`matricule`),
  ADD KEY `idEtablissement` (`idEtablissement`),
  ADD KEY `idAdministrateur` (`idAdministrateur`);

--
-- Index pour la table `payement`
--
ALTER TABLE `payement`
  ADD PRIMARY KEY (`idPayement`),
  ADD KEY `idAdministrateur` (`idAdministrateur`),
  ADD KEY `matricule` (`matricule`);

--
-- Index pour la table `superadministrateur`
--
ALTER TABLE `superadministrateur`
  ADD PRIMARY KEY (`idSuperAdministrateur`);

--
-- Index pour la table `uniteenseignement`
--
ALTER TABLE `uniteenseignement`
  ADD PRIMARY KEY (`idUniteEnseignement`),
  ADD KEY `idEtablissement` (`idEtablissement`),
  ADD KEY `matricule` (`matricule`),
  ADD KEY `idAdministrateur` (`idAdministrateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `idAdministrateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `etablissement`
--
ALTER TABLE `etablissement`
  MODIFY `idEtablissement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `idEtudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `payement`
--
ALTER TABLE `payement`
  MODIFY `idPayement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT pour la table `superadministrateur`
--
ALTER TABLE `superadministrateur`
  MODIFY `idSuperAdministrateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `uniteenseignement`
--
ALTER TABLE `uniteenseignement`
  MODIFY `idUniteEnseignement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=821;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `administrateur_ibfk_1` FOREIGN KEY (`idSuperAdministrateur`) REFERENCES `superadministrateur` (`idSuperAdministrateur`);

--
-- Contraintes pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD CONSTRAINT `etablissement_ibfk_1` FOREIGN KEY (`idSuperAdministrateur`) REFERENCES `superadministrateur` (`idSuperAdministrateur`),
  ADD CONSTRAINT `etablissement_ibfk_2` FOREIGN KEY (`idAdministrateur`) REFERENCES `administrateur` (`idAdministrateur`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`idEtablissement`) REFERENCES `etablissement` (`idEtablissement`),
  ADD CONSTRAINT `etudiant_ibfk_2` FOREIGN KEY (`idAdministrateur`) REFERENCES `administrateur` (`idAdministrateur`);

--
-- Contraintes pour la table `payement`
--
ALTER TABLE `payement`
  ADD CONSTRAINT `payement_ibfk_1` FOREIGN KEY (`idAdministrateur`) REFERENCES `administrateur` (`idAdministrateur`),
  ADD CONSTRAINT `payement_ibfk_2` FOREIGN KEY (`matricule`) REFERENCES `etudiant` (`matricule`);

--
-- Contraintes pour la table `uniteenseignement`
--
ALTER TABLE `uniteenseignement`
  ADD CONSTRAINT `uniteenseignement_ibfk_1` FOREIGN KEY (`idEtablissement`) REFERENCES `etablissement` (`idEtablissement`),
  ADD CONSTRAINT `uniteenseignement_ibfk_2` FOREIGN KEY (`matricule`) REFERENCES `etudiant` (`matricule`),
  ADD CONSTRAINT `uniteenseignement_ibfk_3` FOREIGN KEY (`idAdministrateur`) REFERENCES `administrateur` (`idAdministrateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
