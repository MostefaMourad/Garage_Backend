-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 08, 2020 at 10:10 AM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.0.33-29+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Garage`
--

-- --------------------------------------------------------

--
-- Table structure for table `conducteurs`
--

CREATE TABLE `conducteurs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `vehicule_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conducteurs`
--

INSERT INTO `conducteurs` (`id`, `nom`, `prenom`, `date_naissance`, `vehicule_id`) VALUES
(1, 'Douzane', 'Mohammed', '1999-09-13', 1),
(2, 'Fouzi', 'Oukacha', '1999-09-13', 2),
(3, 'Mostefa', 'Mourad', '1999-09-13', 3);

-- --------------------------------------------------------

--
-- Table structure for table `etat_vehicules`
--

CREATE TABLE `etat_vehicules` (
  `id` int(10) UNSIGNED NOT NULL,
  `kilometrage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomre_chang_pneu` int(11) NOT NULL,
  `nombre_maintenance` int(11) NOT NULL,
  `etat_batterie` double(8,2) NOT NULL,
  `immatriculation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicule_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etat_vehicules`
--

INSERT INTO `etat_vehicules` (`id`, `kilometrage`, `date`, `nomre_chang_pneu`, `nombre_maintenance`, `etat_batterie`, `immatriculation`, `vehicule_id`) VALUES
(1, '200', '2020-09-19', 2, 5, 70.00, '33-44-55', 2),
(2, '20', '2020-09-19', 3, 4, 90.00, '22-3333-2017', 1),
(3, '2000', '2020-09-19', 4, 5, 50.00, '22-3333-2017', 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenances`
--

CREATE TABLE `maintenances` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat_maintenance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicule_id` int(10) UNSIGNED NOT NULL,
  `piece_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maintenances`
--

INSERT INTO `maintenances` (`id`, `date`, `description`, `etat_maintenance`, `vehicule_id`, `piece_id`) VALUES
(1, '2020-08-20', 'ra7et vehicule fe dek chi', 'Validé', 2, 2),
(2, '2020-08-20', 'tne7i pnowet brk', 'En Attente', 1, 1),
(3, '2020-08-20', 'bedel feu rouge', 'En Attente', 3, 4),
(4, '2020-09-20', 'ra7et vehicule fe dek chi', 'En Attente', 2, 2),
(5, '2020-09-27', 'hehe', 'En Attente', 2, 3),
(6, '2020-09-19', 'hehe', 'En Attente', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_05_050841_create_vehicules_table', 1),
(5, '2020_07_05_050955_create_conducteurs_table', 1),
(6, '2020_07_05_051158_create_maintenances_table', 1),
(7, '2020_07_05_051945_create_piece__rechanges_table', 1),
(8, '2020_07_05_052328_create_plannings_table', 1),
(9, '2020_07_08_040646_create_etat_vehicules_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `piece__rechanges`
--

CREATE TABLE `piece__rechanges` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `piece__rechanges`
--

INSERT INTO `piece__rechanges` (`id`, `nom`, `type`, `description`, `quantite`) VALUES
(1, 'GPS', 'accessoire', 'blaa blaa blaa', 6),
(2, 'Batterie', 'alimentation', 'blaa blaa blaa', 5),
(3, 'Pièces moteur Huile', 'moteur', 'Pompe à eau + Kit courroie de distributionLiquide de frein Kit de courroie d\'accessoire Kit de distribution', 3),
(4, 'Visibilité', 'moteur', 'Balai d\'essuie-glace Phare avantAmpoule, projecteur principal Feu arrière Rétroviseur extérieur', 3),
(5, 'Freinage', 'frein', 'Jeu de 4 plaquettes de frein avant Jeu de 2 disques de frein avant Jeu de 4 plaquettes de frein arrièreJeu de 2 disques de frein arrière Étrier de frein', 10);

-- --------------------------------------------------------

--
-- Table structure for table `plannings`
--

CREATE TABLE `plannings` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `immatriculation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_panne` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_panne` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_panne` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicule_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicules`
--

CREATE TABLE `vehicules` (
  `id` int(10) UNSIGNED NOT NULL,
  `immatriculation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `couleur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kilometrage` bigint(20) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicules`
--

INSERT INTO `vehicules` (`id`, `immatriculation`, `marque`, `couleur`, `categorie`, `kilometrage`, `image`) VALUES
(1, '22-3333-2017', 'Kia', 'Noir', 'truc', 2000, 'VehiculeImages/FMJqSgUzuqwt3HiPKawRgHYDcSQQ61Y2xWQpLu6K.jpeg'),
(2, '33-44-55', 'ferrari', 'rouge', 'truc', 0, 'VehiculeImages/ab4TYX7gEGTiSzd6GbruHX258Om4YqlM1IhYNKk5.jpeg'),
(3, '55-66-77', 'BMW', 'blue', 'truc', 10000, 'VehiculeImages/se5cxt8inGYbf2P5irXAbZiPyGM4x4lYW9vvUvy8.jpeg'),
(4, '55-66-88', 'ferrari', 'blue', 'truc', 10000, 'VehiculeImages/x1Wvch9NG9Eqz4DFBZLhCjX14GuNA8dp24bH9vMO.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conducteurs`
--
ALTER TABLE `conducteurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conducteurs_vehicule_id_foreign` (`vehicule_id`);

--
-- Indexes for table `etat_vehicules`
--
ALTER TABLE `etat_vehicules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etat_vehicules_vehicule_id_foreign` (`vehicule_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenances`
--
ALTER TABLE `maintenances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maintenances_vehicule_id_foreign` (`vehicule_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `piece__rechanges`
--
ALTER TABLE `piece__rechanges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plannings`
--
ALTER TABLE `plannings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plannings_vehicule_id_foreign` (`vehicule_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conducteurs`
--
ALTER TABLE `conducteurs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `etat_vehicules`
--
ALTER TABLE `etat_vehicules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `maintenances`
--
ALTER TABLE `maintenances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `piece__rechanges`
--
ALTER TABLE `piece__rechanges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `plannings`
--
ALTER TABLE `plannings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `conducteurs`
--
ALTER TABLE `conducteurs`
  ADD CONSTRAINT `conducteurs_vehicule_id_foreign` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicules` (`id`);

--
-- Constraints for table `etat_vehicules`
--
ALTER TABLE `etat_vehicules`
  ADD CONSTRAINT `etat_vehicules_vehicule_id_foreign` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicules` (`id`);

--
-- Constraints for table `maintenances`
--
ALTER TABLE `maintenances`
  ADD CONSTRAINT `maintenances_vehicule_id_foreign` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicules` (`id`);

--
-- Constraints for table `plannings`
--
ALTER TABLE `plannings`
  ADD CONSTRAINT `plannings_vehicule_id_foreign` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicules` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
