-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 11 jan. 2025 à 01:27
-- Version du serveur : 10.6.19-MariaDB
-- Version de PHP : 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dasilva_ent`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `abse_id` int(11) NOT NULL,
  `present` tinyint(1) NOT NULL DEFAULT 1,
  `justifie` tinyint(1) DEFAULT NULL,
  `motif` varchar(50) DEFAULT NULL,
  `etud_fk` int(11) NOT NULL,
  `cour_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`abse_id`, `present`, `justifie`, `motif`, `etud_fk`, `cour_fk`) VALUES
(4, 0, 1, 'famille', 10, 11),
(5, 0, 0, NULL, 10, 10),
(6, 0, 1, 'maladie', 10, 14),
(7, 0, 0, NULL, 18, 17);

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `admi_id` int(11) NOT NULL,
  `user_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`admi_id`, `user_fk`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `arti_id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `contenu` text NOT NULL,
  `admi_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `boisson`
--

CREATE TABLE `boisson` (
  `bois_id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prix` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `boisson_formule`
--

CREATE TABLE `boisson_formule` (
  `bofo_id` int(11) NOT NULL,
  `bois_fk` int(11) NOT NULL,
  `form_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_emploi`
--

CREATE TABLE `categorie_emploi` (
  `caem_id` int(11) NOT NULL,
  `categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `clas_id` int(11) NOT NULL,
  `tp` varchar(15) NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`clas_id`, `tp`, `annee`) VALUES
(1, 'TP A', 1),
(2, 'TP B', 1),
(3, 'TP C', 1),
(4, 'TP D', 1),
(5, 'TP A', 2),
(6, 'TP B', 2),
(7, 'TP C', 2),
(8, 'TP D', 2),
(9, 'TP A - dev', 3),
(10, 'TP B - dev', 3),
(11, 'TP C - créa', 3),
(12, 'TP D - créa', 3);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `cour_id` int(11) NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `prof_fk` int(11) NOT NULL,
  `modu_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`cour_id`, `debut`, `fin`, `prof_fk`, `modu_fk`) VALUES
(9, '2025-01-10 13:30:00', '2025-01-10 15:30:00', 4, 1),
(10, '2025-01-10 08:15:00', '2025-01-10 10:15:00', 4, 1),
(11, '2025-01-10 10:30:00', '2025-01-10 12:30:00', 4, 1),
(14, '2025-01-15 15:45:00', '2025-01-15 17:45:00', 4, 1),
(17, '2025-01-15 08:15:00', '2025-01-15 10:15:00', 5, 3),
(18, '2025-01-15 10:30:00', '2025-01-15 12:30:00', 6, 4),
(19, '2025-01-16 15:30:00', '2025-01-16 17:45:00', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `dessert`
--

CREATE TABLE `dessert` (
  `dess_id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prix` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `dessert_formule`
--

CREATE TABLE `dessert_formule` (
  `defo_id` int(11) NOT NULL,
  `dess_fk` int(11) NOT NULL,
  `form_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `devoir`
--

CREATE TABLE `devoir` (
  `devo_id` int(11) NOT NULL,
  `note` decimal(4,2) NOT NULL,
  `date` datetime NOT NULL,
  `remarque` varchar(256) DEFAULT NULL,
  `etud_fk` int(11) NOT NULL,
  `enon_fk` int(11) NOT NULL,
  `prof_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `devoir`
--

INSERT INTO `devoir` (`devo_id`, `note`, `date`, `remarque`, `etud_fk`, `enon_fk`, `prof_fk`) VALUES
(1, 15.00, '2025-01-10 00:16:49', 'Très bien', 10, 3, 4),
(2, 10.00, '2025-01-10 00:16:49', 'Peut mieux faire', 11, 3, 4),
(3, 15.00, '2025-01-10 00:19:19', 'Original', 10, 4, 4),
(4, 10.00, '2025-01-10 00:19:19', 'Manque d\'ambition', 11, 4, 4),
(5, 20.00, '2025-01-10 01:15:13', 'Parfait', 9, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `docu_id` int(11) NOT NULL,
  `document` varchar(256) NOT NULL,
  `date` datetime NOT NULL,
  `etud_fk` int(11) NOT NULL,
  `tydo_fk` int(11) NOT NULL,
  `parent_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `emploi`
--

CREATE TABLE `emploi` (
  `empl_id` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `salaire` varchar(20) NOT NULL,
  `horaires` varchar(20) NOT NULL,
  `duree` varchar(20) NOT NULL,
  `description` varchar(256) NOT NULL,
  `lien` text NOT NULL,
  `tyem_fk` int(11) NOT NULL,
  `caem_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `enonce`
--

CREATE TABLE `enonce` (
  `enon_id` int(11) NOT NULL,
  `intitule` varchar(50) NOT NULL,
  `coeff` decimal(2,1) NOT NULL,
  `date_rendu` datetime NOT NULL,
  `modu_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `enonce`
--

INSERT INTO `enonce` (`enon_id`, `intitule`, `coeff`, `date_rendu`, `modu_fk`) VALUES
(1, 'Portfolio', 2.0, '2025-01-27 00:00:00', 1),
(2, 'Portrait Chinois', 0.0, '2025-01-12 23:59:00', 1),
(3, 'Résaweb', 0.0, '2025-01-24 23:59:00', 1),
(4, 'Portfolio', 0.0, '2025-01-24 10:00:00', 1),
(6, 'Blog', 1.0, '2025-01-26 23:59:00', 1),
(7, 'Interview', 1.5, '2025-02-28 23:59:00', 3);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `etud_id` int(11) NOT NULL,
  `user_fk` int(11) NOT NULL,
  `clas_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`etud_id`, `user_fk`, `clas_fk`) VALUES
(9, 13, 11),
(10, 16, 6),
(11, 17, 1),
(12, 18, 1),
(13, 19, 2),
(14, 20, 2),
(15, 21, 2),
(16, 22, 2),
(17, 23, 1),
(18, 24, 1),
(19, 25, 1),
(20, 26, 3),
(21, 27, 3),
(22, 28, 3),
(23, 29, 3),
(24, 30, 2),
(25, 31, 4),
(26, 32, 4),
(27, 33, 4),
(28, 34, 4),
(29, 35, 4),
(30, 36, 5),
(31, 37, 5),
(32, 38, 5),
(33, 42, 7),
(34, 43, 7),
(35, 44, 6),
(36, 45, 6),
(37, 46, 6),
(38, 47, 6),
(39, 48, 5),
(40, 49, 5),
(41, 50, 7),
(42, 51, 8),
(43, 52, 9),
(44, 53, 11),
(45, 54, 8),
(46, 55, 11),
(47, 56, 8),
(48, 57, 12),
(49, 58, 10),
(50, 59, 12),
(51, 60, 9),
(52, 61, 10),
(53, 62, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `favo_id` int(11) NOT NULL,
  `page` varchar(50) NOT NULL,
  `etud_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formule`
--

CREATE TABLE `formule` (
  `form_id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prix` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mail`
--

CREATE TABLE `mail` (
  `mail_id` int(11) NOT NULL,
  `objet` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `contenu` text NOT NULL,
  `auteur_fk` int(11) NOT NULL,
  `destinataire_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE `materiel` (
  `mate_id` int(11) NOT NULL,
  `materiel` varchar(50) NOT NULL,
  `disponible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `entree` varchar(50) NOT NULL,
  `plat` varchar(50) NOT NULL,
  `dessert` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `mess_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `contenu` varchar(256) NOT NULL,
  `auteur_fk` int(11) NOT NULL,
  `destinataire_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `modu_id` int(11) NOT NULL,
  `module` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`modu_id`, `module`) VALUES
(1, 'Intégration web'),
(3, 'Ecriture multimédia'),
(4, 'Création graphique'),
(5, 'Javascript');

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `plat_id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `vegetarien` tinyint(1) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `typl_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plat_formule`
--

CREATE TABLE `plat_formule` (
  `plfo_id` int(11) NOT NULL,
  `plat_fk` int(11) NOT NULL,
  `form_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `prof_id` int(11) NOT NULL,
  `user_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`prof_id`, `user_fk`) VALUES
(3, 14),
(4, 15),
(5, 39),
(6, 40),
(7, 41);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `ques_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `titre` varchar(50) NOT NULL,
  `contenu` varchar(256) NOT NULL,
  `modu_fk` int(11) NOT NULL,
  `user_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `relation_cours_classe`
--

CREATE TABLE `relation_cours_classe` (
  `cocl_id` int(11) NOT NULL,
  `clas_fk` int(11) NOT NULL,
  `cour_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `relation_cours_classe`
--

INSERT INTO `relation_cours_classe` (`cocl_id`, `clas_fk`, `cour_fk`) VALUES
(9, 6, 10),
(10, 6, 11),
(11, 6, 14),
(12, 1, 17),
(13, 1, 18),
(14, 2, 19);

-- --------------------------------------------------------

--
-- Structure de la table `relation_enonce_classe`
--

CREATE TABLE `relation_enonce_classe` (
  `encl_id` int(11) NOT NULL,
  `clas_fk` int(11) NOT NULL,
  `enon_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `relation_enonce_classe`
--

INSERT INTO `relation_enonce_classe` (`encl_id`, `clas_fk`, `enon_fk`) VALUES
(1, 5, 1),
(2, 2, 2),
(3, 6, 3),
(4, 6, 4),
(6, 5, 6),
(7, 1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `relation_prof_classe`
--

CREATE TABLE `relation_prof_classe` (
  `prcl_id` int(11) NOT NULL,
  `clas_fk` int(11) NOT NULL,
  `prof_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `relation_prof_classe`
--

INSERT INTO `relation_prof_classe` (`prcl_id`, `clas_fk`, `prof_fk`) VALUES
(1, 5, 3),
(2, 2, 4),
(3, 6, 4),
(4, 1, 5),
(5, 2, 5),
(6, 1, 6),
(7, 1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `relation_prof_enonce`
--

CREATE TABLE `relation_prof_enonce` (
  `pren_id` int(11) NOT NULL,
  `enon_fk` int(11) NOT NULL,
  `prof_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `relation_prof_enonce`
--

INSERT INTO `relation_prof_enonce` (`pren_id`, `enon_fk`, `prof_fk`) VALUES
(1, 1, 3),
(2, 2, 4),
(3, 3, 4),
(4, 4, 4),
(6, 6, 3),
(7, 7, 5);

-- --------------------------------------------------------

--
-- Structure de la table `relation_prof_module`
--

CREATE TABLE `relation_prof_module` (
  `prmo_id` int(11) NOT NULL,
  `modu_fk` int(11) NOT NULL,
  `prof_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `relation_prof_module`
--

INSERT INTO `relation_prof_module` (`prmo_id`, `modu_fk`, `prof_fk`) VALUES
(10, 1, 3),
(9, 1, 4),
(11, 3, 5),
(12, 4, 6),
(13, 5, 7);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `repo_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `contenu` varchar(256) NOT NULL,
  `ques_fk` int(11) NOT NULL,
  `user_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reserve_materiel`
--

CREATE TABLE `reserve_materiel` (
  `rema_id` int(11) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `etud_fk` int(11) NOT NULL,
  `mate_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reserve_salle`
--

CREATE TABLE `reserve_salle` (
  `resa_id` int(11) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `etud_fk` int(11) DEFAULT NULL,
  `cour_fk` int(11) DEFAULT NULL,
  `sall_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reserve_salle`
--

INSERT INTO `reserve_salle` (`resa_id`, `date_debut`, `date_fin`, `etud_fk`, `cour_fk`, `sall_fk`) VALUES
(2, '2025-01-10 08:15:00', '2025-01-10 10:15:00', NULL, 10, 120),
(3, '2025-01-10 10:30:00', '2025-01-10 12:30:00', NULL, 11, 123),
(4, '2025-01-15 15:45:00', '2025-01-15 17:45:00', NULL, 14, 123),
(5, '2025-01-15 08:15:00', '2025-01-15 10:15:00', NULL, 17, 123),
(6, '2025-01-15 10:30:00', '2025-01-15 12:30:00', NULL, 18, 125),
(7, '2025-01-16 15:30:00', '2025-01-16 17:45:00', NULL, 19, 124);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `num_salle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`num_salle`) VALUES
(120),
(121),
(122),
(123),
(124),
(125),
(126);

-- --------------------------------------------------------

--
-- Structure de la table `type_document`
--

CREATE TABLE `type_document` (
  `tydo_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_emploi`
--

CREATE TABLE `type_emploi` (
  `tyem_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_plat`
--

CREATE TABLE `type_plat` (
  `typl_id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `role` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `login`, `mdp`, `nom`, `prenom`, `role`) VALUES
(1, 'admin', '$2y$10$/mqT0JBtkYNtlBbFfzFuneDus90zNkPRMzi0aR94.P3gwuQcYRwlW', 'admin', 'admin', 'admi'),
(13, 'place.holder', '$2y$10$l0E7vd26IpwnS.ZVCR49Qe/Wt2Ny6dymEGEj/3Qaowr5vTev2YuRy', 'holder', 'place', 'etud'),
(14, 'prof.test', '$2y$10$BnhUEmNVcS7RnNuz9Y4eau50bhkQJ6jY2WQHWlKKjMnTcreJkLRI2', 'test', 'prof', 'prof'),
(15, 'prof.web', '$2y$10$MyfdF5MLpWhLTWn3YPD0ueVxp82LMYnwI49R6UpSj5rFbIO/h9pBa', 'web', 'prof', 'prof'),
(16, 'titi.titi', '$2y$10$Tb3mkwJxVy0uTKIDaIc3i.tuMm1wxiT23yWdrN0ZvOL0q848pt/RK', 'titi', 'titi', 'etud'),
(17, 'tutu.tutu', '$2y$10$qteb0qP397HE6blNbPkPre3eHMm0O63dB7c9tZpiHsDF84.DGB2vK', 'tutu', 'tutu', 'etud'),
(18, 'test.test', '$2y$10$KzZURTAgM8aGBgRhdRANYOT/grNVL2PQC87eJnFoNNDgpYDrLf1Ya', 'test', 'test', 'etud'),
(19, 'Adam.Silvera', '$2y$10$PDHrbMrq7vv6tIwqnIFoSedaCbLljrdhUJVjXWW9tp5N79dwG8exC', 'Silvera', 'Adam', 'etud'),
(20, 'Mina.Abouramé', '$2y$10$TMgERysS.8ivxpRewGB5CeflHz4qTDKNqvc3avU77lPB3zHLA9XI.', 'Abouramé', 'Mina', 'etud'),
(21, 'Caterine.lino', '$2y$10$N4lpSDJXupglgc.kHfl5nukLy2vJfkJWpMjXn634QCNZ8uBm3mI5O', 'lino', 'Caterine', 'etud'),
(22, 'Zakari.tonnerre', '$2y$10$6XHxiZUue5N4crrUr1JsfO8uUNvWe53FJifYPlt870r0s.MTGOgay', 'tonnerre', 'Zakari', 'etud'),
(23, 'Lilian .Cesso', '$2y$10$rEmY8eV7XRIvmj8LcM70VOuDNl6Pa9iSguq8zdO.ChVlCc.NbxxIC', 'Cesso', 'Lilian ', 'etud'),
(24, 'Guillaume.Lepetit', '$2y$10$IvLwS2sEGkWcHNXEDnt48ukIEMoF.TLF9vlnYccp/EwiYkaHBcZI.', 'Lepetit', 'Guillaume', 'etud'),
(25, 'Sylvaine.Forge', '$2y$10$t7dXByRRt6o60H36AJjYwufhxsH1IuVpnEzMgkyeusfvp/5hBESoK', 'Forge', 'Sylvaine', 'etud'),
(26, 'paul.Bique', '$2y$10$zUH1NihUnebBVwzgvGbpMenSYoKCv9nJm74QMEfEl9sWU5gGOMfde', 'Bique', 'paul', 'etud'),
(27, 'vivienne.Westwood', '$2y$10$6I5m8DgIikNXbFTZjR.DTOe/xJdRZN6rbjTABnImunykH5FwbJ0CK', 'Westwood', 'vivienne', 'etud'),
(28, 'Claud.Monet', '$2y$10$mlmGEsFxtPPfrVrPikt53eSMiS.jm9I5LYZfSdwGCn6eKYAyhHchW', 'Monet', 'Claud', 'etud'),
(29, 'Georges.Gillet', '$2y$10$B5dcgw90gudqliW4O58iROv.qDQrCYT6hqdyQ2vdbEBY3MPfmuGHe', 'Gillet', 'Georges', 'etud'),
(30, 'Eleonore.Kamie', '$2y$10$lVyHWllK9fsrFpulOCMn3OcEAjoUeZ.2Qm0do.r7Q4dMGV0K.bPay', 'Kamie', 'Eleonore', 'etud'),
(31, 'Issac.Newton', '$2y$10$wKrHvsGK5VtRck0dOIzqruVNO1i3fqXCNUnt1foVok9bzMP6Pdaxy', 'Newton', 'Issac', 'etud'),
(32, 'Pitt.Brad', '$2y$10$8dhjnK.wy/utVF8d0d1CxuRvl7tUIUEYIpkidnZb1zJyAU8eFUSv6', 'Brad', 'Pitt', 'etud'),
(33, 'Rick.Grims', '$2y$10$Ze4V6P.XTMrHaDX6Gl/E7eYEivE6cIcpg0fIkzCsf4Xz6BHyj9zGC', 'Grims', 'Rick', 'etud'),
(34, 'Carole.Battue', '$2y$10$vsi9YvXIGFD3ku3MqctUb.SR347c102gEgFflaI9wZ32kAlYMbkMG', 'Battue', 'Carole', 'etud'),
(35, 'Carle .Leborgne', '$2y$10$AqunOhmqwSU0KR2fqHrBIuALpTQj4MXQV1TNMTNIwzFiysyw8Axk6', 'Leborgne', 'Carle ', 'etud'),
(36, 'Nicolas .Chippy', '$2y$10$KL8YQ.tXmHyGA7H.Dpbipupgy3vwMu0zSyPQbyu5oGBXLxPeUoQh6', 'Chippy', 'Nicolas ', 'etud'),
(37, 'Luc.Skystalker', '$2y$10$FEH4AB.vhxOpAdgplPUZve0lS4of5lsWq/oSp0UIS4PBAg5S5cT.C', 'Skystalker', 'Luc', 'etud'),
(38, 'Frodon.Toupet', '$2y$10$kDrEK6iZTYUnozzXHh/8geNYh/A7bVmH/y1IN3v6hYpihIPxFIlNW', 'Toupet', 'Frodon', 'etud'),
(39, 'Grandalf.Lecool', '$2y$10$x7aisMWhYS5kOnBEITKp7O3g29b4Tj99OFx8qzs/hnKRrGefPyiIy', 'Lecool', 'Grandalf', 'prof'),
(40, 'Phillipe.Baran', '$2y$10$.YA0z.CPn6Ujs43Vl2pkp.cUuXAHfweYbR/IOCQUmCJ5EMrFhjQzu', 'Baran', 'Phillipe', 'prof'),
(41, 'Aragorne.Erwen', '$2y$10$aOFHxxrT.MpMHsXYlGu.E.yKIuCzs/IO3i6GL0Kss/vKVqQEgjU3a', 'Erwen', 'Aragorne', 'prof'),
(42, 'Loucoume.Narnia', '$2y$10$swM3719zt5BV3oRPC/uT8.vunPP4QXy9U26w.vI5AM/e1YSRkPn3K', 'Narnia', 'Loucoume', 'etud'),
(43, 'Esekielle.Mini', '$2y$10$q7B8Jq7AH0qUguxr/qiwROiGhoBAmD3sJ3D6sn2IkB2K1iYWfeaeG', 'Mini', 'Esekielle', 'etud'),
(44, 'Julie.Legrand', '$2y$10$cWT.U.VbfTkxk7zXnr5dQexXY7ub.r9jclpYU4II/wToR9n59FerS', 'Legrand', 'Julie', 'etud'),
(45, 'Etelle.Bretagne', '$2y$10$EkKqJ0CW2TwkO8BYNRPw9.Pkkbgh1opxre5A4N51E3Jm2hmL0qt0C', 'Bretagne', 'Etelle', 'etud'),
(46, 'Powder.Linutil', '$2y$10$Uxtp8jfuJzpW4FYAEICUMeLrUSqqjaQLNJM/0SoykMgKBaLIFtf.y', 'Linutil', 'Powder', 'etud'),
(47, 'Sarah.Livy', '$2y$10$dteHD2mQQqlZ2NsE0db14OHgO2b7Qb2L7pLu.YjUmb2dvQm9s8s2m', 'Livy', 'Sarah', 'etud'),
(48, 'Caitlyne.Cupcake', '$2y$10$7yuWOwxFMU9rDrl24Fdk2uSQ9zMaoHJRpT0.E3OvV4nP5f8QWWU7O', 'Cupcake', 'Caitlyne', 'etud'),
(49, 'Jihun.Sanbundong', '$2y$10$Y0LTVQa.fYtK85/HOlO.Ju7oBaBDKgI1iwEh3SieaQNCgkDUbXfGy', 'Sanbundong', 'Jihun', 'etud'),
(50, 'Paf.Lechien', '$2y$10$CJp1yTIM7M41PsD45rY9VuisWkFW1D6CH6wANhTBYtiLufU1Lt8DW', 'Lechien', 'Paf', 'etud'),
(51, 'Rafael.Montagne', '$2y$10$kDrI0QjkPdJCAEtKbniVJ.cAhmIH6gWaGgoYjSeRsbfKS9zxuXOTi', 'Montagne', 'Rafael', 'etud'),
(52, 'Diana.Osting', '$2y$10$85T4kPezXytQNQtfFJIDkO0jA2.nHn2LhEdrC3YRTdRBAi12zsvBq', 'Osting', 'Diana', 'etud'),
(53, 'Mathis.Roberts', '$2y$10$ZHLDcohUtFbLs.MyqyxekO0RI4fS00az03eTHMXelFZyh.xQ1DDNa', 'Roberts', 'Mathis', 'etud'),
(54, 'Jean.Pierre', '$2y$10$XzG/AZQvUynqMtrSrzd13u5oLu2K3uIkH3.HuTHglY5JIxQ/SVZBO', 'Pierre', 'Jean', 'etud'),
(55, 'Leo.Duvalle', '$2y$10$tXdE3YWFWJbTjLECzE1zl.pgtxsTCF54wZHaUHK95buQV0qt.OBwS', 'Duvalle', 'Leo', 'etud'),
(56, 'Leila.Nir', '$2y$10$EaAVucGSLxiI/IfZ71KgmeZRESrZBGtXkRzuVcWEm6LGeVcIttWf.', 'Nir', 'Leila', 'etud'),
(57, 'Clara.Quebec', '$2y$10$dN2vj7bCtx111Fog/WDY.u25zYV.pZdLRmY9JgjTH8caH/bJcg72W', 'Quebec', 'Clara', 'etud'),
(58, 'Chloé.Gillet', '$2y$10$RxMTAK0lor3hyW1THNdT/uy3C7B9v4JZbU.RMEQncLixckeu4yZwS', 'Gillet', 'Chloé', 'etud'),
(59, 'Jimi.Te', '$2y$10$oA64I0buXKxqrnGVrrlzfeolGeiVEae62Twi9dxIL0isryZNuFbLu', 'Te', 'Jimi', 'etud'),
(60, 'Britney.Lagoon', '$2y$10$chi1FuATNLM36um95MmpWeg0c1OhgnzCBclyRERP/bDd8ijstk.7q', 'Lagoon', 'Britney', 'etud'),
(61, 'Lili.Bum', '$2y$10$1YrhPCSF1Sowf/8eJ31TzOw56R6XigfkfedeatUCT7V0LO8Zgd7Cq', 'Bum', 'Lili', 'etud'),
(62, 'Jean marie.Gentil', '$2y$10$GzosEf9Q0KU8U/gjCdXPiOdMxTXA8ShOmKXpxlU1Tv4ZCSSwz3..e', 'Gentil', 'Jean marie', 'etud');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`abse_id`),
  ADD KEY `cour_fk` (`cour_fk`),
  ADD KEY `etud_fk` (`etud_fk`);

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`admi_id`),
  ADD KEY `user_fk` (`user_fk`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`arti_id`),
  ADD KEY `admi_fk` (`admi_fk`);

--
-- Index pour la table `boisson`
--
ALTER TABLE `boisson`
  ADD PRIMARY KEY (`bois_id`);

--
-- Index pour la table `boisson_formule`
--
ALTER TABLE `boisson_formule`
  ADD PRIMARY KEY (`bofo_id`),
  ADD KEY `bois_fk` (`bois_fk`),
  ADD KEY `form_fk` (`form_fk`);

--
-- Index pour la table `categorie_emploi`
--
ALTER TABLE `categorie_emploi`
  ADD PRIMARY KEY (`caem_id`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`clas_id`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`cour_id`),
  ADD KEY `prof_fk` (`prof_fk`),
  ADD KEY `modu_fk` (`modu_fk`);

--
-- Index pour la table `dessert`
--
ALTER TABLE `dessert`
  ADD PRIMARY KEY (`dess_id`);

--
-- Index pour la table `dessert_formule`
--
ALTER TABLE `dessert_formule`
  ADD PRIMARY KEY (`defo_id`),
  ADD KEY `dess_fk` (`dess_fk`),
  ADD KEY `form_fk` (`form_fk`);

--
-- Index pour la table `devoir`
--
ALTER TABLE `devoir`
  ADD PRIMARY KEY (`devo_id`),
  ADD KEY `enon_fk` (`enon_fk`),
  ADD KEY `etud_fk` (`etud_fk`),
  ADD KEY `prof_fk` (`prof_fk`);

--
-- Index pour la table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`docu_id`),
  ADD KEY `etud_fk` (`etud_fk`),
  ADD KEY `parent_fk` (`parent_fk`),
  ADD KEY `tydo_fk` (`tydo_fk`);

--
-- Index pour la table `emploi`
--
ALTER TABLE `emploi`
  ADD PRIMARY KEY (`empl_id`),
  ADD KEY `caem_fk` (`caem_fk`),
  ADD KEY `tyem_fk` (`tyem_fk`);

--
-- Index pour la table `enonce`
--
ALTER TABLE `enonce`
  ADD PRIMARY KEY (`enon_id`),
  ADD KEY `modu_fk` (`modu_fk`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`etud_id`),
  ADD KEY `clas_fk` (`clas_fk`),
  ADD KEY `user_fk` (`user_fk`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`favo_id`),
  ADD KEY `etud_fk` (`etud_fk`),
  ADD KEY `page_fk` (`page`);

--
-- Index pour la table `formule`
--
ALTER TABLE `formule`
  ADD PRIMARY KEY (`form_id`);

--
-- Index pour la table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`mail_id`),
  ADD KEY `auteur_fk` (`auteur_fk`),
  ADD KEY `destinataire_fk` (`destinataire_fk`);

--
-- Index pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`mate_id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mess_id`),
  ADD KEY `auteur_fk` (`auteur_fk`),
  ADD KEY `destinataire_fk` (`destinataire_fk`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`modu_id`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`plat_id`),
  ADD KEY `typl_fk` (`typl_fk`);

--
-- Index pour la table `plat_formule`
--
ALTER TABLE `plat_formule`
  ADD PRIMARY KEY (`plfo_id`),
  ADD KEY `plat_fk` (`plat_fk`),
  ADD KEY `form_fk` (`form_fk`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`prof_id`),
  ADD KEY `user_fk` (`user_fk`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ques_id`),
  ADD KEY `modu_fk` (`modu_fk`),
  ADD KEY `user_fk` (`user_fk`);

--
-- Index pour la table `relation_cours_classe`
--
ALTER TABLE `relation_cours_classe`
  ADD PRIMARY KEY (`cocl_id`),
  ADD KEY `clas_fk` (`clas_fk`),
  ADD KEY `cour_fk` (`cour_fk`);

--
-- Index pour la table `relation_enonce_classe`
--
ALTER TABLE `relation_enonce_classe`
  ADD PRIMARY KEY (`encl_id`),
  ADD KEY `clas_fk` (`clas_fk`),
  ADD KEY `enon_fk` (`enon_fk`);

--
-- Index pour la table `relation_prof_classe`
--
ALTER TABLE `relation_prof_classe`
  ADD PRIMARY KEY (`prcl_id`),
  ADD KEY `clas_fk` (`clas_fk`),
  ADD KEY `prof_fk` (`prof_fk`);

--
-- Index pour la table `relation_prof_enonce`
--
ALTER TABLE `relation_prof_enonce`
  ADD PRIMARY KEY (`pren_id`),
  ADD KEY `enon_fk` (`enon_fk`),
  ADD KEY `prof_fk` (`prof_fk`);

--
-- Index pour la table `relation_prof_module`
--
ALTER TABLE `relation_prof_module`
  ADD PRIMARY KEY (`prmo_id`),
  ADD UNIQUE KEY `modu_fk` (`modu_fk`,`prof_fk`),
  ADD KEY `prof_fk` (`prof_fk`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`repo_id`),
  ADD KEY `ques_fk` (`ques_fk`),
  ADD KEY `user_fk` (`user_fk`);

--
-- Index pour la table `reserve_materiel`
--
ALTER TABLE `reserve_materiel`
  ADD PRIMARY KEY (`rema_id`),
  ADD KEY `etud_fk` (`etud_fk`),
  ADD KEY `mate_fk` (`mate_fk`);

--
-- Index pour la table `reserve_salle`
--
ALTER TABLE `reserve_salle`
  ADD PRIMARY KEY (`resa_id`),
  ADD KEY `cour_fk` (`cour_fk`),
  ADD KEY `etud_fk` (`etud_fk`),
  ADD KEY `sall_fk` (`sall_fk`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`num_salle`);

--
-- Index pour la table `type_document`
--
ALTER TABLE `type_document`
  ADD PRIMARY KEY (`tydo_id`);

--
-- Index pour la table `type_emploi`
--
ALTER TABLE `type_emploi`
  ADD PRIMARY KEY (`tyem_id`);

--
-- Index pour la table `type_plat`
--
ALTER TABLE `type_plat`
  ADD PRIMARY KEY (`typl_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `abse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `admi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `arti_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `boisson`
--
ALTER TABLE `boisson`
  MODIFY `bois_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `boisson_formule`
--
ALTER TABLE `boisson_formule`
  MODIFY `bofo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorie_emploi`
--
ALTER TABLE `categorie_emploi`
  MODIFY `caem_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `clas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `cour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `dessert`
--
ALTER TABLE `dessert`
  MODIFY `dess_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `dessert_formule`
--
ALTER TABLE `dessert_formule`
  MODIFY `defo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `devoir`
--
ALTER TABLE `devoir`
  MODIFY `devo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `document`
--
ALTER TABLE `document`
  MODIFY `docu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `emploi`
--
ALTER TABLE `emploi`
  MODIFY `empl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `enonce`
--
ALTER TABLE `enonce`
  MODIFY `enon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `etud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `favo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formule`
--
ALTER TABLE `formule`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mail`
--
ALTER TABLE `mail`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `materiel`
--
ALTER TABLE `materiel`
  MODIFY `mate_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `mess_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `modu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `plat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `plat_formule`
--
ALTER TABLE `plat_formule`
  MODIFY `plfo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `prof_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `ques_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `relation_cours_classe`
--
ALTER TABLE `relation_cours_classe`
  MODIFY `cocl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `relation_enonce_classe`
--
ALTER TABLE `relation_enonce_classe`
  MODIFY `encl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `relation_prof_classe`
--
ALTER TABLE `relation_prof_classe`
  MODIFY `prcl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `relation_prof_enonce`
--
ALTER TABLE `relation_prof_enonce`
  MODIFY `pren_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `relation_prof_module`
--
ALTER TABLE `relation_prof_module`
  MODIFY `prmo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `repo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reserve_materiel`
--
ALTER TABLE `reserve_materiel`
  MODIFY `rema_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reserve_salle`
--
ALTER TABLE `reserve_salle`
  MODIFY `resa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `type_document`
--
ALTER TABLE `type_document`
  MODIFY `tydo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_emploi`
--
ALTER TABLE `type_emploi`
  MODIFY `tyem_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_plat`
--
ALTER TABLE `type_plat`
  MODIFY `typl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `absence_ibfk_1` FOREIGN KEY (`cour_fk`) REFERENCES `cours` (`cour_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `absence_ibfk_2` FOREIGN KEY (`etud_fk`) REFERENCES `etudiant` (`etud_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `administrateur_ibfk_1` FOREIGN KEY (`user_fk`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`admi_fk`) REFERENCES `administrateur` (`admi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `boisson_formule`
--
ALTER TABLE `boisson_formule`
  ADD CONSTRAINT `boisson_formule_ibfk_1` FOREIGN KEY (`bois_fk`) REFERENCES `boisson` (`bois_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `boisson_formule_ibfk_2` FOREIGN KEY (`form_fk`) REFERENCES `formule` (`form_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`prof_fk`) REFERENCES `professeur` (`prof_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cours_ibfk_2` FOREIGN KEY (`modu_fk`) REFERENCES `module` (`modu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `dessert_formule`
--
ALTER TABLE `dessert_formule`
  ADD CONSTRAINT `dessert_formule_ibfk_1` FOREIGN KEY (`dess_fk`) REFERENCES `dessert` (`dess_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dessert_formule_ibfk_2` FOREIGN KEY (`form_fk`) REFERENCES `formule` (`form_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `devoir`
--
ALTER TABLE `devoir`
  ADD CONSTRAINT `devoir_ibfk_1` FOREIGN KEY (`enon_fk`) REFERENCES `enonce` (`enon_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `devoir_ibfk_2` FOREIGN KEY (`etud_fk`) REFERENCES `etudiant` (`etud_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `devoir_ibfk_3` FOREIGN KEY (`prof_fk`) REFERENCES `professeur` (`prof_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`etud_fk`) REFERENCES `etudiant` (`etud_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `document_ibfk_2` FOREIGN KEY (`parent_fk`) REFERENCES `document` (`docu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `document_ibfk_3` FOREIGN KEY (`tydo_fk`) REFERENCES `type_document` (`tydo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `emploi`
--
ALTER TABLE `emploi`
  ADD CONSTRAINT `emploi_ibfk_1` FOREIGN KEY (`caem_fk`) REFERENCES `categorie_emploi` (`caem_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `emploi_ibfk_2` FOREIGN KEY (`tyem_fk`) REFERENCES `type_emploi` (`tyem_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `enonce`
--
ALTER TABLE `enonce`
  ADD CONSTRAINT `enonce_ibfk_1` FOREIGN KEY (`modu_fk`) REFERENCES `module` (`modu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`clas_fk`) REFERENCES `classe` (`clas_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `etudiant_ibfk_2` FOREIGN KEY (`user_fk`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`etud_fk`) REFERENCES `etudiant` (`etud_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `mail_ibfk_1` FOREIGN KEY (`auteur_fk`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mail_ibfk_2` FOREIGN KEY (`destinataire_fk`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`auteur_fk`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`destinataire_fk`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `plat_ibfk_1` FOREIGN KEY (`typl_fk`) REFERENCES `type_plat` (`typl_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `plat_formule`
--
ALTER TABLE `plat_formule`
  ADD CONSTRAINT `plat_formule_ibfk_1` FOREIGN KEY (`plat_fk`) REFERENCES `plat` (`plat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `plat_formule_ibfk_2` FOREIGN KEY (`form_fk`) REFERENCES `formule` (`form_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD CONSTRAINT `professeur_ibfk_1` FOREIGN KEY (`user_fk`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`modu_fk`) REFERENCES `module` (`modu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`user_fk`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `relation_cours_classe`
--
ALTER TABLE `relation_cours_classe`
  ADD CONSTRAINT `relation_cours_classe_ibfk_1` FOREIGN KEY (`clas_fk`) REFERENCES `classe` (`clas_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `relation_cours_classe_ibfk_2` FOREIGN KEY (`cour_fk`) REFERENCES `cours` (`cour_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `relation_enonce_classe`
--
ALTER TABLE `relation_enonce_classe`
  ADD CONSTRAINT `relation_enonce_classe_ibfk_1` FOREIGN KEY (`clas_fk`) REFERENCES `classe` (`clas_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `relation_enonce_classe_ibfk_2` FOREIGN KEY (`enon_fk`) REFERENCES `enonce` (`enon_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `relation_prof_classe`
--
ALTER TABLE `relation_prof_classe`
  ADD CONSTRAINT `relation_prof_classe_ibfk_1` FOREIGN KEY (`clas_fk`) REFERENCES `classe` (`clas_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `relation_prof_classe_ibfk_2` FOREIGN KEY (`prof_fk`) REFERENCES `professeur` (`prof_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `relation_prof_enonce`
--
ALTER TABLE `relation_prof_enonce`
  ADD CONSTRAINT `relation_prof_enonce_ibfk_1` FOREIGN KEY (`enon_fk`) REFERENCES `enonce` (`enon_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `relation_prof_enonce_ibfk_2` FOREIGN KEY (`prof_fk`) REFERENCES `professeur` (`prof_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `relation_prof_module`
--
ALTER TABLE `relation_prof_module`
  ADD CONSTRAINT `relation_prof_module_ibfk_1` FOREIGN KEY (`modu_fk`) REFERENCES `module` (`modu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `relation_prof_module_ibfk_2` FOREIGN KEY (`prof_fk`) REFERENCES `professeur` (`prof_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`ques_fk`) REFERENCES `question` (`ques_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reponse_ibfk_2` FOREIGN KEY (`user_fk`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `reserve_materiel`
--
ALTER TABLE `reserve_materiel`
  ADD CONSTRAINT `reserve_materiel_ibfk_1` FOREIGN KEY (`etud_fk`) REFERENCES `etudiant` (`etud_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reserve_materiel_ibfk_2` FOREIGN KEY (`mate_fk`) REFERENCES `materiel` (`mate_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `reserve_salle`
--
ALTER TABLE `reserve_salle`
  ADD CONSTRAINT `reserve_salle_ibfk_1` FOREIGN KEY (`cour_fk`) REFERENCES `cours` (`cour_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reserve_salle_ibfk_2` FOREIGN KEY (`etud_fk`) REFERENCES `etudiant` (`etud_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reserve_salle_ibfk_3` FOREIGN KEY (`sall_fk`) REFERENCES `salle` (`num_salle`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
