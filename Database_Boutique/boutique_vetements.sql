-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2024 at 05:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boutique_vetements`
--
CREATE DATABASE IF NOT EXISTS `boutique_vetements` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `boutique_vetements`;

-- --------------------------------------------------------

--
-- Table structure for table `abonnements`
--

CREATE TABLE `abonnements` (
  `id` int(11) UNSIGNED NOT NULL,
  `courriel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `abonnements`
--

INSERT INTO `abonnements` (`id`, `courriel`) VALUES
(5, '201583353@collegeahuntsic.qc.ca'),
(6, 'asdasd@sdaas.com'),
(7, 'EMAIL@MAIL.COM'),
(3, 'mendozaev@live.ca'),
(2, 'momo@dasd.com'),
(4, 'nico@bella.com');

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` decimal(10,2) UNSIGNED DEFAULT NULL,
  `couleur` varchar(255) NOT NULL,
  `taille` set('Unique','44','46','48','50','52','54','56') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `type`, `nom`, `image`, `description`, `prix`, `couleur`, `taille`) VALUES
(4, 'cravate', 'Ciel Surréaliste', 'http://localhost:4208/api/assets/produits/tie1.webp', 'Un ciel pastel onirique, parfait pour les amateurs de rêve et d\'imaginaire.', 51.99, 'Bleu', 'Unique'),
(5, 'cravate', 'Illusion Rétrograde', 'http://localhost:4208/api/assets/produits/tie2.webp', 'Un motif hypnotique et temporel qui défie le style conventionnel, avec un prix qui reflète sa singularité.', 64.99, 'Rose', 'Unique'),
(6, 'cravate', 'Crépuscule Futuriste', 'http://localhost:4208/api/assets//produits/tie3.webp', 'Les teintes sombres et les reflets métalliques donnent à cette cravate un aspect luxueux et avant-gardiste.', 65.99, 'Mauve', 'Unique'),
(7, 'cravate', 'Vaporwave Horizon', 'http://localhost:4208/api/assets//produits/tie4.webp', 'Un dégradé aux couleurs vives qui rappelle les couchers de soleil des années 80, pour un style affirmé.', 60.99, 'Rose', 'Unique'),
(8, 'cravate', 'Cascade de Pixels', 'http://localhost:4208/api/assets/produits/tie5.webp', 'Un hommage aux premiers ordinateurs avec un motif pixélisé unique, à un prix abordable.', 48.99, 'Mauve', 'Unique'),
(9, 'cravate', 'Mirage Électrique', 'http://localhost:4208/api/assets/produits/tie6.webp', 'Une cravate aux éclairs fluorescents, idéale pour un look audacieux et contemporain.', 49.99, 'Rose', 'Unique'),
(10, 'cravate', 'Galaxie de Licornes', 'http://localhost:4208/api/assets/produits/tie7.webp', 'Des licornes flottant dans l’espace, entourées d’étoiles et de nébuleuses pastel, pour un look magique et cosmique.', 45.99, 'Mauve', 'Unique'),
(11, 'cravate', 'Rêverie de Licorne', 'http://localhost:4208/api/assets/produits/tie8.webp', 'Une cravate avec des reflets holographiques et des silhouettes de licornes qui apparaissent sous différentes lumières, créant un effet mystique.', 56.99, 'Bleu', 'Unique'),
(12, 'chemise', 'Nuit Licorne', 'http://localhost:4208/api/assets/produits/tshirt1.webp', 'Une chemise sombre et élégante avec des touches de néon, où des licornes illuminent la nuit avec des éclats scintillants.', 147.99, 'Mauve', '46,48,52'),
(13, 'chemise', 'Vague Licorne', 'http://localhost:4208/api/assets/produits/tshirt2.webp', 'Un motif fluide de vagues digitales avec des licornes sautant à travers des vagues de pixels et de néons, pour un style envoûtant.', 121.99, 'Bleu', '46,50'),
(14, 'chemise', 'Éclipse de Licorne', 'http://localhost:4208/api/assets/produits/tshirt3.webp', 'Chemise en dégradé sombre et mystérieux, avec des silhouettes de licornes galopant dans l’ombre d’une éclipse lumineuse.', 102.99, 'Vert', '44,48,52,54,56'),
(15, 'chemise', 'Synthwave Mirage', 'http://localhost:4208/api/assets/produits/tshirt4.webp', 'Des bandes horizontales en dégradé de néons, parfaites pour un look à la fois futuriste et élégant.', 112.99, 'Vert', '46,48,52,56'),
(16, 'chemise', 'Horizon Néon', 'http://localhost:4208/api/assets/produits/tshirt5.webp', 'Chemise inspirée des ciels artificiels des simulations numériques, avec des couleurs douces et pastels.', 199.99, 'Vert', '52'),
(17, 'chemise', 'Odyssée Cyberspace', 'http://localhost:4208/api/assets/produits/tshirt6.webp', 'Motif complexe rappelant des cartes de circuits imprimés et des réseaux, idéale pour un look futuriste.', 133.99, 'Mauve', '54'),
(18, 'chemise', 'Licorne Éthérée', 'http://localhost:4208/api/assets/produits/shirt1.webp', 'Une chemise légère aux motifs pastel, avec des licornes dessinées en filigrane, flottant dans un ciel numérique brumeux.', 146.99, 'Blanc', '52,56'),
(19, 'cravate', 'Le Hologramme Licorne', 'http://localhost:4208/api/assets/produits/tiex.webp', 'Une licorne qui sera toujours avec toi.', 164.99, 'Mauve', 'Unique');

-- --------------------------------------------------------

--
-- Table structure for table `quantity_product`
--

CREATE TABLE `quantity_product` (
  `id` int(11) NOT NULL,
  `taille` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `courriel` varchar(255) NOT NULL,
  `autorisation` set('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `password`, `courriel`, `autorisation`) VALUES
(28, 'Bella', 'Bella', '$2y$10$EhK0xOyQitWks9wbvEFHOOPumfCqGOIIvjNyYWGYQFFEJkaH9bnf6', 'nico@bella.com', 'admin'),
(29, 'Momo', 'Koko', '1234', 'momo@hot.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abonnements`
--
ALTER TABLE `abonnements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `abonnements_uk` (`courriel`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quantity_product`
--
ALTER TABLE `quantity_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quantity_product_produits_id_fk` (`idProduit`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courriel_uk` (`courriel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abonnements`
--
ALTER TABLE `abonnements`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `quantity_product`
--
ALTER TABLE `quantity_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quantity_product`
--
ALTER TABLE `quantity_product`
  ADD CONSTRAINT `quantity_product_produits_id_fk` FOREIGN KEY (`idProduit`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
