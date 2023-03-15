-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 10 mars 2023 à 16:42
-- Version du serveur : 8.0.29
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dubbing_dub`
--

-- --------------------------------------------------------

--
-- Structure de la table `comedien`
--

CREATE TABLE `comedien` (
  `id_comedien` int NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int DEFAULT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taux_journalier` int DEFAULT NULL,
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comedien`
--

INSERT INTO `comedien` (`id_comedien`, `image_name`, `nom`, `prenom`, `telephone`, `email`, `age`, `sexe`, `type`, `taux_journalier`, `updated_at`) VALUES
(1, 'inconnu.jpg', 'Ledoux', 'Pauline', '06 25 76 18 13', 'Pauline.Ledoux@gmail.com', 32, 'Femme', NULL, 100, '2023-03-09 10:11:34'),
(2, 'inconnu.jpg', 'Schmitt', 'Théophile', '06 20 59 90 87', 'Théophile.Schmitt@gmail.com', 66, 'Homme', NULL, 200, '2023-03-09 10:11:34'),
(3, 'inconnu.jpg', 'Weiss', 'Matthieu', '06 07 66 76 69', 'Matthieu.Weiss@gmail.com', 24, 'Homme', NULL, 400, '2023-03-09 10:11:34'),
(4, 'inconnu.jpg', 'Blot', 'Josette', '06 00 06 04 38', 'Josette.Blot@gmail.com', 60, 'Femme', NULL, 150, '2023-03-09 10:11:34'),
(5, 'inconnu.jpg', 'Maury', 'Marguerite', '06 58 17 43 01', 'Marguerite.Maury@gmail.com', 60, 'Femme', NULL, 375, '2023-03-09 10:11:34'),
(6, 'inconnu.jpg', 'Fontaine', 'Pauline', '06 33 94 78 77', 'Pauline.Fontaine@gmail.com', 56, 'Femme', NULL, 425, '2023-03-09 10:11:34'),
(7, 'inconnu.jpg', 'Berger', 'Lucie', '06 18 51 68 45', 'Lucie.Berger@gmail.com', 66, 'Femme', NULL, 175, '2023-03-09 10:11:34'),
(8, 'inconnu.jpg', 'Perrier', 'Yves', '06 18 64 88 25', 'Yves.Perrier@gmail.com', 31, 'Homme', NULL, 150, '2023-03-09 10:11:34'),
(9, 'inconnu.jpg', 'Dias', 'Astrid', '06 45 49 26 32', 'Astrid.Dias@gmail.com', 54, 'Femme', NULL, 325, '2023-03-09 10:11:34'),
(10, 'inconnu.jpg', 'Fischer', 'Sébastien', '06 19 39 09 20', 'Sébastien.Fischer@gmail.com', 26, 'Homme', NULL, 425, '2023-03-09 10:11:34'),
(11, 'inconnu.jpg', 'Bailly', 'Christophe', '06 73 23 53 04', 'Christophe.Bailly@gmail.com', 33, 'Homme', NULL, 475, '2023-03-09 10:11:34'),
(12, 'inconnu.jpg', 'Renard', 'Charles', '06 34 31 04 56', 'Charles.Renard@gmail.com', 52, 'Homme', NULL, 175, '2023-03-09 10:11:34'),
(13, 'inconnu.jpg', 'Dufour', 'François', '06 91 80 52 88', 'François.Dufour@gmail.com', 22, 'Homme', NULL, 225, '2023-03-09 10:11:34'),
(14, 'inconnu.jpg', 'Legrand', 'Luc', '06 08 05 40 21', 'Luc.Legrand@gmail.com', 21, 'Homme', NULL, 375, '2023-03-09 10:11:34'),
(15, 'inconnu.jpg', 'Laporte', 'Camille', '06 11 35 49 01', 'Camille.Laporte@gmail.com', 28, 'Femme', NULL, 250, '2023-03-09 10:11:34'),
(16, 'inconnu.jpg', 'Mary', 'Catherine', '06 08 66 00 23', 'Catherine.Mary@gmail.com', 50, 'Femme', NULL, 175, '2023-03-09 10:11:34'),
(17, 'inconnu.jpg', 'Faure', 'Élodie', '06 19 30 64 83', 'Élodie.Faure@gmail.com', 53, 'Femme', NULL, 275, '2023-03-09 10:11:34'),
(18, 'inconnu.jpg', 'Samson', 'Monique', '06 51 28 80 36', 'Monique.Samson@gmail.com', 49, 'Femme', NULL, 100, '2023-03-09 10:11:34'),
(19, 'inconnu.jpg', 'Munoz', 'Henriette', '06 68 65 47 02', 'Henriette.Munoz@gmail.com', 38, 'Femme', NULL, 375, '2023-03-09 10:11:34'),
(20, 'inconnu.jpg', 'Raymond', 'Édith', '06 24 95 76 95', 'Édith.Raymond@gmail.com', 21, 'Femme', NULL, 375, '2023-03-09 10:11:34'),
(21, 'inconnu.jpg', 'Leblanc', 'Édouard', '06 62 89 92 95', 'Édouard.Leblanc@gmail.com', 42, 'Homme', NULL, 325, '2023-03-09 10:11:34'),
(22, 'inconnu.jpg', 'Paul', 'Philippine', '06 22 02 82 13', 'Philippine.Paul@gmail.com', 24, 'Femme', NULL, 400, '2023-03-09 10:11:34'),
(23, 'inconnu.jpg', 'David', 'Maryse', '06 01 72 00 46', 'Maryse.David@gmail.com', 70, 'Femme', NULL, 375, '2023-03-09 10:11:34'),
(24, 'inconnu.jpg', 'Marty', 'Frédérique', '06 09 82 55 72', 'Frédérique.Marty@gmail.com', 62, 'Femme', NULL, 275, '2023-03-09 10:11:34'),
(25, 'inconnu.jpg', 'Rolland', 'Théodore', '06 38 75 18 93', 'Théodore.Rolland@gmail.com', 72, 'Homme', NULL, 375, '2023-03-09 10:11:34'),
(26, 'inconnu.jpg', 'Imbert', 'Thibaut', '06 01 28 22 47', 'Thibaut.Imbert@gmail.com', 71, 'Homme', NULL, 350, '2023-03-09 10:11:34'),
(27, 'inconnu.jpg', 'Fischer', 'Andrée', '06 53 56 90 52', 'Andrée.Fischer@gmail.com', 20, 'Femme', NULL, 300, '2023-03-09 10:11:34'),
(28, 'inconnu.jpg', 'Maurice', 'David', '06 82 61 88 80', 'David.Maurice@gmail.com', 28, 'Homme', NULL, 375, '2023-03-09 10:11:34'),
(29, 'inconnu.jpg', 'Coste', 'Daniel', '06 39 20 17 93', 'Daniel.Coste@gmail.com', 47, 'Homme', NULL, 450, '2023-03-09 10:11:34'),
(30, 'inconnu.jpg', 'Da Costa', 'Dominique', '06 58 17 54 77', 'Dominique.Da Costa@gmail.com', 21, 'Femme', NULL, 325, '2023-03-09 10:11:34'),
(31, 'inconnu.jpg', 'Arnaud', 'Charles', '06 44 28 14 60', 'Charles.Arnaud@gmail.com', 56, 'Homme', NULL, 125, '2023-03-09 10:11:34'),
(32, 'inconnu.jpg', 'Ollivier', 'Agnès', '06 26 53 51 09', 'Agnès.Ollivier@gmail.com', 24, 'Femme', NULL, 350, '2023-03-09 10:11:34'),
(33, 'inconnu.jpg', 'Pires', 'Noémi', '06 66 08 63 00', 'Noémi.Pires@gmail.com', 47, 'Femme', NULL, 225, '2023-03-09 10:11:34'),
(34, 'inconnu.jpg', 'Teixeira', 'Chantal', '06 00 56 17 91', 'Chantal.Teixeira@gmail.com', 46, 'Femme', NULL, 300, '2023-03-09 10:11:34'),
(35, 'inconnu.jpg', 'Joseph', 'Manon', '06 73 68 71 44', 'Manon.Joseph@gmail.com', 41, 'Femme', NULL, 225, '2023-03-09 10:11:34'),
(36, 'inconnu.jpg', 'Gregoire', 'Hugues', '06 05 12 36 46', 'Hugues.Gregoire@gmail.com', 71, 'Homme', NULL, 175, '2023-03-09 10:11:34'),
(37, 'inconnu.jpg', 'Caron', 'Patricia', '06 69 46 05 74', 'Patricia.Caron@gmail.com', 52, 'Femme', NULL, 275, '2023-03-09 10:11:34'),
(38, 'inconnu.jpg', 'Bouvet', 'Colette', '06 77 05 62 22', 'Colette.Bouvet@gmail.com', 74, 'Femme', NULL, 100, '2023-03-09 10:11:34'),
(39, 'inconnu.jpg', 'Lelievre', 'Guillaume', '06 11 91 68 68', 'Guillaume.Lelievre@gmail.com', 55, 'Homme', NULL, 450, '2023-03-09 10:11:34'),
(40, 'inconnu.jpg', 'Guyon', 'Sébastien', '06 66 82 00 51', 'Sébastien.Guyon@gmail.com', 43, 'Homme', NULL, 425, '2023-03-09 10:11:34'),
(41, 'inconnu.jpg', 'Mercier', 'Aimé', '06 79 07 94 21', 'Aimé.Mercier@gmail.com', 52, 'Homme', NULL, 500, '2023-03-09 10:11:34'),
(42, 'inconnu.jpg', 'Lopez', 'Bernadette', '06 50 45 07 54', 'Bernadette.Lopez@gmail.com', 38, 'Femme', NULL, 325, '2023-03-09 10:11:34'),
(43, 'inconnu.jpg', 'Chauveau', 'Marc', '06 57 08 97 13', 'Marc.Chauveau@gmail.com', 46, 'Homme', NULL, 150, '2023-03-09 10:11:34'),
(44, 'inconnu.jpg', 'Marion', 'Roger', '06 64 35 68 88', 'Roger.Marion@gmail.com', 20, 'Homme', NULL, 200, '2023-03-09 10:11:34'),
(45, 'inconnu.jpg', 'Morin', 'Zacharie', '06 56 38 09 70', 'Zacharie.Morin@gmail.com', 35, 'Homme', NULL, 100, '2023-03-09 10:11:34'),
(46, 'inconnu.jpg', 'Laurent', 'Claire', '06 16 71 27 86', 'Claire.Laurent@gmail.com', 27, 'Femme', NULL, 400, '2023-03-09 10:11:34'),
(47, 'inconnu.jpg', 'Godard', 'Honoré', '06 41 40 31 90', 'Honoré.Godard@gmail.com', 23, 'Homme', NULL, 300, '2023-03-09 10:11:34'),
(48, 'inconnu.jpg', 'Duval', 'Luce', '06 68 39 91 35', 'Luce.Duval@gmail.com', 50, 'Femme', NULL, 300, '2023-03-09 10:11:34'),
(49, 'inconnu.jpg', 'Giraud', 'Marine', '06 86 15 92 14', 'Marine.Giraud@gmail.com', 64, 'Femme', NULL, 175, '2023-03-09 10:11:34');

-- --------------------------------------------------------

--
-- Structure de la table `contrat_comedien`
--

CREATE TABLE `contrat_comedien` (
  `id_contrat_comedien` int NOT NULL,
  `id_comedien` int DEFAULT NULL,
  `id_da` int DEFAULT NULL,
  `id_role` int DEFAULT NULL,
  `creation_contrat` date DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contrat_comedien`
--

INSERT INTO `contrat_comedien` (`id_contrat_comedien`, `id_comedien`, `id_da`, `id_role`, `creation_contrat`, `date_debut`, `date_fin`) VALUES
(1, 9, 1, 1, '2022-08-18', '2022-09-23', '2022-10-08'),
(2, 7, 1, 2, '2022-10-11', '2022-11-16', '2022-12-01'),
(3, 39, 1, 3, '2023-04-11', '2023-05-16', '2023-05-31'),
(4, 3, 1, 4, '2021-10-28', '2021-12-02', '2021-12-17'),
(5, 45, 1, 5, '2023-12-07', '2024-01-12', '2024-01-27'),
(6, 39, 2, 6, '2020-05-27', '2020-07-01', '2020-07-16'),
(7, 43, 2, 7, '2020-08-05', '2020-09-10', '2020-09-25'),
(8, 41, 2, 8, '2022-10-14', '2022-11-19', '2022-12-04'),
(9, 48, 2, 9, '2020-04-07', '2020-05-12', '2020-05-27'),
(10, 15, 2, 10, '2023-06-30', '2023-08-05', '2023-08-20'),
(11, 21, 2, 11, '2023-04-30', '2023-06-05', '2023-06-20'),
(12, 27, 2, 12, '2023-11-17', '2023-12-22', '2024-01-06'),
(13, 23, 2, 13, '2021-07-25', '2021-08-30', '2021-09-14'),
(14, 38, 2, 14, '2023-10-15', '2023-11-20', '2023-12-05'),
(15, 40, 2, 15, '2020-10-01', '2020-11-06', '2020-11-21'),
(16, 18, 2, 16, '2021-03-25', '2021-04-30', '2021-05-15'),
(17, 10, 2, 17, '2021-07-19', '2021-08-24', '2021-09-08'),
(18, 8, 2, 18, '2022-02-19', '2022-03-24', '2022-04-08'),
(19, 17, 2, 19, '2023-02-12', '2023-03-17', '2023-04-01'),
(20, 20, 2, 20, '2021-06-15', '2021-07-20', '2021-08-04'),
(21, 26, 2, 21, '2023-05-29', '2023-07-03', '2023-07-18'),
(22, 42, 2, 22, '2022-06-22', '2022-07-27', '2022-08-11'),
(23, 15, 2, 23, '2022-01-21', '2022-02-26', '2022-03-13'),
(24, 34, 2, 24, '2023-02-17', '2023-03-22', '2023-04-06'),
(25, 14, 2, 25, '2021-06-20', '2021-07-25', '2021-08-09'),
(26, 14, 2, 26, '2020-03-08', '2020-04-13', '2020-04-28'),
(27, 34, 2, 27, '2023-05-17', '2023-06-22', '2023-07-07'),
(28, 3, 2, 28, '2024-02-04', '2024-03-09', '2024-03-24'),
(29, 31, 2, 29, '2021-11-06', '2021-12-11', '2021-12-26'),
(30, 47, 2, 30, '2023-01-23', '2023-02-28', '2023-03-15'),
(31, 16, 2, 31, '2022-08-31', '2022-10-05', '2022-10-20'),
(32, 47, 2, 32, '2022-11-03', '2022-12-08', '2022-12-23'),
(33, 49, 2, 33, '2021-01-03', '2021-02-08', '2021-02-23'),
(34, 27, 2, 34, '2023-01-08', '2023-02-13', '2023-02-28'),
(35, 38, 2, 35, '2022-01-17', '2022-02-22', '2022-03-09'),
(36, 15, 2, 36, '2021-03-25', '2021-04-30', '2021-05-15'),
(37, 15, 2, 37, '2022-08-31', '2022-10-05', '2022-10-20'),
(38, 16, 2, 38, '2020-07-17', '2020-08-22', '2020-09-06'),
(39, 28, 2, 39, '2022-12-11', '2023-01-16', '2023-01-31'),
(40, 7, 2, 40, '2021-12-31', '2022-02-05', '2022-02-20'),
(41, 9, 2, 41, '2022-12-06', '2023-01-11', '2023-01-26'),
(42, 30, 2, 42, '2020-03-30', '2020-05-04', '2020-05-19'),
(43, 6, 1, 43, '2023-08-27', '2023-10-01', '2023-10-16'),
(44, 29, 1, 44, '2020-06-17', '2020-07-22', '2020-08-06'),
(45, 5, 1, 45, '2020-11-21', '2020-12-26', '2021-01-10'),
(46, 20, 1, 46, '2023-07-27', '2023-09-01', '2023-09-16'),
(47, 39, 1, 47, '2022-01-03', '2022-02-08', '2022-02-23'),
(48, 12, 1, 48, '2022-07-21', '2022-08-26', '2022-09-10'),
(49, 16, 1, 49, '2023-09-03', '2023-10-08', '2023-10-23'),
(50, 35, 1, 50, '2020-08-08', '2020-09-13', '2020-09-28'),
(51, 40, 2, 51, '2023-12-11', '2024-01-16', '2024-01-31'),
(52, 27, 2, 52, '2022-03-02', '2022-04-07', '2022-04-22'),
(53, 16, 2, 53, '2022-07-09', '2022-08-14', '2022-08-29'),
(54, 36, 2, 54, '2023-03-29', '2023-05-03', '2023-05-18'),
(55, 41, 2, 55, '2023-02-09', '2023-03-14', '2023-03-29'),
(56, 27, 2, 56, '2022-11-11', '2022-12-16', '2022-12-31'),
(57, 23, 2, 57, '2021-02-16', '2021-03-21', '2021-04-05'),
(58, 10, 2, 58, '2020-09-19', '2020-10-24', '2020-11-08'),
(59, 15, 2, 59, '2023-09-25', '2023-10-30', '2023-11-14'),
(60, 26, 2, 60, '2023-10-31', '2023-12-05', '2023-12-20'),
(61, 40, 2, 61, '2021-07-27', '2021-09-01', '2021-09-16'),
(62, 36, 2, 62, '2023-01-06', '2023-02-11', '2023-02-26'),
(63, 20, 2, 63, '2023-05-28', '2023-07-02', '2023-07-17'),
(64, 10, 2, 64, '2022-05-08', '2022-06-13', '2022-06-28'),
(65, 36, 2, 65, '2022-10-01', '2022-11-06', '2022-11-21'),
(66, 42, 2, 66, '2021-04-22', '2021-05-27', '2021-06-11'),
(67, 32, 2, 67, '2022-10-30', '2022-12-04', '2022-12-19'),
(68, 6, 2, 68, '2020-05-06', '2020-06-11', '2020-06-26'),
(69, 4, 2, 69, '2020-11-14', '2020-12-19', '2021-01-03'),
(70, 2, 2, 70, '2021-02-11', '2021-03-16', '2021-03-31'),
(71, 31, 2, 71, '2022-02-04', '2022-03-09', '2022-03-24'),
(72, 13, 2, 72, '2022-11-27', '2023-01-02', '2023-01-17'),
(73, 20, 2, 73, '2022-09-02', '2022-10-07', '2022-10-22'),
(74, 7, 2, 74, '2023-01-20', '2023-02-25', '2023-03-12'),
(75, 45, 2, 75, '2023-11-11', '2023-12-16', '2023-12-31'),
(76, 23, 2, 76, '2023-02-05', '2023-03-10', '2023-03-25'),
(77, 42, 2, 77, '2020-12-14', '2021-01-19', '2021-02-03'),
(78, 33, 2, 78, '2020-07-21', '2020-08-26', '2020-09-10'),
(79, 44, 2, 79, '2020-07-07', '2020-08-12', '2020-08-27'),
(80, 28, 2, 80, '2021-12-06', '2022-01-11', '2022-01-26'),
(81, 17, 2, 81, '2020-04-18', '2020-05-23', '2020-06-07'),
(82, 33, 2, 82, '2021-03-01', '2021-04-06', '2021-04-21'),
(83, 23, 2, 83, '2021-04-18', '2021-05-23', '2021-06-07'),
(84, 15, 2, 84, '2020-02-15', '2020-03-20', '2020-04-04'),
(85, 36, 2, 85, '2020-08-02', '2020-09-07', '2020-09-22'),
(86, 21, 2, 86, '2021-04-05', '2021-05-10', '2021-05-25'),
(87, 17, 2, 87, '2023-06-16', '2023-07-21', '2023-08-05'),
(88, 33, 2, 88, '2022-12-13', '2023-01-18', '2023-02-02'),
(89, 49, 2, 89, '2022-05-02', '2022-06-07', '2022-06-22'),
(90, 47, 2, 90, '2023-04-24', '2023-05-29', '2023-06-13'),
(91, 1, 2, 91, '2022-07-31', '2022-09-05', '2022-09-20'),
(92, 23, 1, 92, '2023-01-08', '2023-02-13', '2023-02-28'),
(93, 9, 1, 93, '2021-02-27', '2021-04-04', '2021-04-19'),
(94, 21, 1, 94, '2021-03-16', '2021-04-21', '2021-05-06'),
(95, 42, 1, 95, '2020-08-03', '2020-09-08', '2020-09-23'),
(96, 8, 1, 96, '2020-12-30', '2021-02-04', '2021-02-19'),
(97, 1, 1, 97, '2022-04-13', '2022-05-18', '2022-06-02'),
(98, 49, 1, 98, '2020-09-28', '2020-11-03', '2020-11-18'),
(99, 31, 1, 99, '2020-12-22', '2021-01-27', '2021-02-11'),
(100, 36, 1, 100, '2021-10-27', '2021-12-01', '2021-12-16'),
(101, 35, 1, 101, '2021-05-03', '2021-06-08', '2021-06-23'),
(102, 11, 1, 102, '2022-03-03', '2022-04-08', '2022-04-23'),
(103, 43, 1, 103, '2023-04-19', '2023-05-24', '2023-06-08'),
(104, 11, 1, 104, '2023-04-27', '2023-06-02', '2023-06-17'),
(105, 40, 1, 105, '2020-07-14', '2020-08-19', '2020-09-03'),
(106, 42, 1, 106, '2022-04-26', '2022-05-31', '2022-06-15');

-- --------------------------------------------------------

--
-- Structure de la table `contrat_da`
--

CREATE TABLE `contrat_da` (
  `id_contrat_da` int NOT NULL,
  `id_da` int DEFAULT NULL,
  `id_production` int DEFAULT NULL,
  `creation_contrat` date DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbre_role` int DEFAULT NULL,
  `montant` int DEFAULT NULL,
  `img_film` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contrat_da`
--

INSERT INTO `contrat_da` (`id_contrat_da`, `id_da`, `id_production`, `creation_contrat`, `date_debut`, `date_fin`, `titre`, `nbre_role`, `montant`, `img_film`) VALUES
(1, 1, 1, '2024-01-23', '2024-02-28', '2024-05-11', 'Avatar 4', 5, 197000, 'Avatar4.jpg'),
(2, 2, 5, '2024-12-29', '2025-02-03', '2025-04-16', 'Avengers: Secret Wars', 8, 214000, 'avengers-secret-wars.jpg'),
(3, 2, 3, '2024-01-05', '2024-02-10', '2024-04-23', 'Pirates des Caraïbes Reboot', 6, 236000, 'piratesDesCaraibes.jpg'),
(4, 2, 3, '2024-07-13', '2024-08-18', '2024-10-31', 'The Batman: Part II', 6, 65000, 'the-batman-part-2.jpg'),
(5, 2, 2, '2024-10-13', '2024-11-18', '2025-01-31', 'John Wick : Chapitre 4', 7, 209000, 'john-wick-chapitre-4.jpg'),
(6, 2, 4, '2024-06-12', '2024-07-17', '2024-09-30', 'Les Gardiens de la Galaxie Vol. 3', 10, 280000, 'LGDLG3.jpg'),
(7, 1, 2, '2025-01-19', '2025-02-24', '2025-05-07', 'Indiana Jones 5', 8, 134000, 'indiana-jones-5.jpg'),
(8, 2, 2, '2024-11-22', '2024-12-27', '2025-03-12', 'Dune, deuxième partie', 8, 147000, 'Dune-deuxième-partie.jpg'),
(9, 2, 6, '2023-05-30', '2023-07-04', '2023-09-17', 'Murder Mystery 2', 5, 196000, 'murder-mystery-2.jpg'),
(10, 2, 6, '2023-10-25', '2023-11-30', '2024-02-12', 'The Flash', 5, 268000, 'The_Flash.jpg'),
(11, 2, 4, '2025-01-20', '2025-02-25', '2025-05-08', 'Les Trois Mousquetaires : D\'Artagnan', 9, 134000, 'Les-trois-mousquetaires.png'),
(12, 2, 1, '2025-01-01', '2025-02-06', '2025-04-19', 'Beau Is Afraid', 9, 283000, 'BEAUNIS.jpg'),
(13, 2, 2, '2024-10-19', '2024-11-24', '2025-02-06', 'The Whale', 5, 152000, 'the_Whale.jpeg'),
(14, 1, 4, '2024-04-05', '2024-05-10', '2024-07-23', 'De Grandes espérances', 9, 224000, 'de-grandes-esperances.jpg'),
(15, 1, 6, '2024-07-29', '2024-09-03', '2024-11-16', 'Le Royaume de Naya', 6, 291000, 'le-royaume-de-naya.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `da`
--

CREATE TABLE `da` (
  `id_da` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `da`
--

INSERT INTO `da` (`id_da`, `email`, `nom`, `prenom`, `roles`, `password`, `avatar`) VALUES
(1, 'ilan@assouline.fr', 'Assouline', 'Ilan', '[\"ROLE_USER\"]', '$2y$13$R1APeIH00PC0gzPjMsnTy.h2YK830m3isjOPa7hhHVJBDnV6ui3fq', 'ilan.jpg'),
(2, 'florimond@labulle.fr', 'Labulle', 'Florimond', '[\"ROLE_USER\"]', '$2y$13$..3jzK3jPNv0EKkZ6v8VreJBoyL2bNHsBjXhX4FKlJOHV0imS..kK', 'florimond.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230308210323', '2023-03-09 10:11:25', 396);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `production`
--

CREATE TABLE `production` (
  `id_production` int NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `production`
--

INSERT INTO `production` (`id_production`, `libelle`) VALUES
(1, 'Netflix'),
(2, 'Amazon Prime Video'),
(3, 'Disney+'),
(4, 'HBO'),
(5, 'AppleTv'),
(6, 'Warner Bros');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `id_contrat_da` int DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `id_contrat_da`, `nom`, `sexe`) VALUES
(1, 1, 'Sabine Chartier', 'Femme'),
(2, 1, 'Élisabeth Vaillant', 'Femme'),
(3, 1, 'Matthieu Baron', 'Homme'),
(4, 1, 'Thierry Gimenez', 'Homme'),
(5, 1, 'Louis Camus', 'Homme'),
(6, 2, 'Auguste Mary', 'Homme'),
(7, 2, 'Victoire Simon', 'Femme'),
(8, 2, 'Xavier Jacob', 'Homme'),
(9, 2, 'Guy Labbe', 'Homme'),
(10, 2, 'Martine Blanc', 'Femme'),
(11, 2, 'Thibaut Mace', 'Homme'),
(12, 2, 'William Besson', 'Homme'),
(13, 2, 'Julie Lenoir', 'Femme'),
(14, 3, 'Virginie Guyon', 'Femme'),
(15, 3, 'Sébastien Bazin', 'Homme'),
(16, 3, 'Anastasie Levy', 'Femme'),
(17, 3, 'Jeanne Lejeune', 'Femme'),
(18, 3, 'Adélaïde Payet', 'Femme'),
(19, 3, 'Léon Adam', 'Homme'),
(20, 4, 'Hortense Jacquot', 'Femme'),
(21, 4, 'Hortense Begue', 'Femme'),
(22, 4, 'Théodore Girard', 'Homme'),
(23, 4, 'Claudine Masse', 'Femme'),
(24, 4, 'Augustin Allain', 'Homme'),
(25, 4, 'Monique Lopes', 'Femme'),
(26, 5, 'Paulette Roussel', 'Femme'),
(27, 5, 'William Maillet', 'Homme'),
(28, 5, 'Lucy Lefevre', 'Femme'),
(29, 5, 'Paul Bonnin', 'Homme'),
(30, 5, 'Virginie Leroy', 'Femme'),
(31, 5, 'Timothée Girard', 'Homme'),
(32, 5, 'Marcel Coulon', 'Homme'),
(33, 6, 'Louis Bourdon', 'Homme'),
(34, 6, 'Astrid Ramos', 'Femme'),
(35, 6, 'Colette Marechal', 'Femme'),
(36, 6, 'Roger Chauvin', 'Homme'),
(37, 6, 'Michelle Blanchard', 'Femme'),
(38, 6, 'Mathilde Allain', 'Femme'),
(39, 6, 'Margaret Collin', 'Femme'),
(40, 6, 'Virginie Dubois', 'Femme'),
(41, 6, 'Louis Henry', 'Homme'),
(42, 6, 'Valentine Rossi', 'Femme'),
(43, 7, 'Julie Etienne', 'Femme'),
(44, 7, 'Laurent Bertrand', 'Homme'),
(45, 7, 'Antoine Leclerc', 'Homme'),
(46, 7, 'Michèle Vidal', 'Femme'),
(47, 7, 'Théophile Renard', 'Homme'),
(48, 7, 'Julie Perrin', 'Femme'),
(49, 7, 'Rémy Roussel', 'Homme'),
(50, 7, 'Susan Leveque', 'Femme'),
(51, 8, 'Monique Hamon', 'Femme'),
(52, 8, 'Noémi Lagarde', 'Femme'),
(53, 8, 'Tristan Richard', 'Homme'),
(54, 8, 'Jacqueline Rossi', 'Femme'),
(55, 8, 'Lucy Leleu', 'Femme'),
(56, 8, 'Honoré Bodin', 'Homme'),
(57, 8, 'Jacques Nicolas', 'Homme'),
(58, 8, 'Margaux Delorme', 'Femme'),
(59, 9, 'Franck Masson', 'Homme'),
(60, 9, 'Célina Lagarde', 'Femme'),
(61, 9, 'Joseph Turpin', 'Homme'),
(62, 9, 'Guy Rousset', 'Homme'),
(63, 9, 'Daniel Roy', 'Homme'),
(64, 10, 'Martin Guyot', 'Homme'),
(65, 10, 'Rémy Leveque', 'Homme'),
(66, 10, 'François Bruneau', 'Homme'),
(67, 10, 'Stéphane Vallee', 'Homme'),
(68, 10, 'Charles Girard', 'Homme'),
(69, 11, 'Renée Barbe', 'Femme'),
(70, 11, 'Alexandria Martins', 'Femme'),
(71, 11, 'Chantal Renard', 'Femme'),
(72, 11, 'Rémy Lesage', 'Homme'),
(73, 11, 'Adrienne Masson', 'Femme'),
(74, 11, 'Édouard Lemonnier', 'Homme'),
(75, 11, 'Luce Herve', 'Femme'),
(76, 11, 'Nicolas Lecomte', 'Homme'),
(77, 11, 'Thibault Martineau', 'Homme'),
(78, 12, 'Victor Peron', 'Homme'),
(79, 12, 'Alphonse Torres', 'Homme'),
(80, 12, 'Frédéric Bourdon', 'Homme'),
(81, 12, 'Guillaume Pons', 'Homme'),
(82, 12, 'Édith Meunier', 'Femme'),
(83, 12, 'Adélaïde Morel', 'Femme'),
(84, 12, 'Paul Merle', 'Homme'),
(85, 12, 'Marc Fleury', 'Homme'),
(86, 12, 'Antoine Maillot', 'Homme'),
(87, 13, 'Olivier Poulain', 'Homme'),
(88, 13, 'Élodie Pereira', 'Femme'),
(89, 13, 'Noémi Delattre', 'Femme'),
(90, 13, 'Laurent Leroy', 'Homme'),
(91, 13, 'Honoré Leger', 'Homme'),
(92, 14, 'Marc Monnier', 'Homme'),
(93, 14, 'Auguste Colin', 'Homme'),
(94, 14, 'Robert Moulin', 'Homme'),
(95, 14, 'David Hebert', 'Homme'),
(96, 14, 'Luc Lagarde', 'Homme'),
(97, 14, 'Jacques Boutin', 'Homme'),
(98, 14, 'Thérèse Hoarau', 'Femme'),
(99, 14, 'Stéphane Morvan', 'Homme'),
(100, 14, 'Jean Dumas', 'Homme'),
(101, 15, 'Françoise Fouquet', 'Femme'),
(102, 15, 'Gabrielle Guillet', 'Femme'),
(103, 15, 'Margaret Chartier', 'Femme'),
(104, 15, 'Nicolas Lombard', 'Homme'),
(105, 15, 'Geneviève Mathieu', 'Femme'),
(106, 15, 'Alain Chauvin', 'Homme'),
(107, 10, 'jenny ortegoa', 'Femme');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comedien`
--
ALTER TABLE `comedien`
  ADD PRIMARY KEY (`id_comedien`);

--
-- Index pour la table `contrat_comedien`
--
ALTER TABLE `contrat_comedien`
  ADD PRIMARY KEY (`id_contrat_comedien`),
  ADD UNIQUE KEY `UNIQ_5B0DF998DC499668` (`id_role`),
  ADD KEY `IDX_5B0DF998B2190F57` (`id_comedien`),
  ADD KEY `IDX_5B0DF998BA801495` (`id_da`);

--
-- Index pour la table `contrat_da`
--
ALTER TABLE `contrat_da`
  ADD PRIMARY KEY (`id_contrat_da`),
  ADD KEY `IDX_DDE78CDDBA801495` (`id_da`),
  ADD KEY `IDX_DDE78CDD76673137` (`id_production`);

--
-- Index pour la table `da`
--
ALTER TABLE `da`
  ADD PRIMARY KEY (`id_da`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`id_production`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`),
  ADD KEY `IDX_57698A6A786D0C0A` (`id_contrat_da`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comedien`
--
ALTER TABLE `comedien`
  MODIFY `id_comedien` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `contrat_comedien`
--
ALTER TABLE `contrat_comedien`
  MODIFY `id_contrat_comedien` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT pour la table `contrat_da`
--
ALTER TABLE `contrat_da`
  MODIFY `id_contrat_da` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `da`
--
ALTER TABLE `da`
  MODIFY `id_da` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `production`
--
ALTER TABLE `production`
  MODIFY `id_production` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contrat_comedien`
--
ALTER TABLE `contrat_comedien`
  ADD CONSTRAINT `FK_5B0DF998B2190F57` FOREIGN KEY (`id_comedien`) REFERENCES `comedien` (`id_comedien`),
  ADD CONSTRAINT `FK_5B0DF998BA801495` FOREIGN KEY (`id_da`) REFERENCES `da` (`id_da`),
  ADD CONSTRAINT `FK_5B0DF998DC499668` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Contraintes pour la table `contrat_da`
--
ALTER TABLE `contrat_da`
  ADD CONSTRAINT `FK_DDE78CDD76673137` FOREIGN KEY (`id_production`) REFERENCES `production` (`id_production`),
  ADD CONSTRAINT `FK_DDE78CDDBA801495` FOREIGN KEY (`id_da`) REFERENCES `da` (`id_da`);

--
-- Contraintes pour la table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `FK_57698A6A786D0C0A` FOREIGN KEY (`id_contrat_da`) REFERENCES `contrat_da` (`id_contrat_da`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
