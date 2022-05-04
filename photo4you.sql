-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 04 mai 2022 à 23:07
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
-- Base de données : `photo4you`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de l''article',
  `nom_article` varchar(50) NOT NULL COMMENT 'Nom de l''article',
  `quantite` int(11) NOT NULL COMMENT 'Quantité article',
  `prix_article` float NOT NULL COMMENT 'Prix de l''article',
  `photoArticle` varchar(400) NOT NULL COMMENT 'Image article',
  `reference` varchar(50) NOT NULL COMMENT 'Référence',
  `categorie` varchar(50) NOT NULL COMMENT 'Catégorie produit',
  `product_statuts` int(11) NOT NULL DEFAULT '1' COMMENT 'Statut de l''article',
  `promotion` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_article`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `nom_article`, `quantite`, `prix_article`, `photoArticle`, `reference`, `categorie`, `product_statuts`, `promotion`) VALUES
(51, 'Casque', 10, 99.99, 'https://www.cdiscount.com/pdt2/k/m/a/1/700x700/shhe3306kma/rw/shark-casque-moto-jet-street-drak-noir-mat.jpg', '234864', 'Casque', 1, '0'),
(53, 'Huile Motul', 20, 21.99, 'https://www.racinglubes.fr/3277-large/huile-moteur-huile-moteur-motul-4100-turbolight-10w40.jpg', '345345', 'Huile', 1, '0'),
(54, 'Bougie', 10, 5.99, 'https://medias.la-becanerie.com/cache/images_articles/800_800/bougie-ngk-c8hsa-standard.jpg', '2131896', 'Bougie', 1, '0'),
(55, 'Veste Homme', 5, 139.99, 'https://d1kvfoyrif6wzg.cloudfront.net/assets/images/78/main/none_4a9b746d7eb1a6be79b87302ad57de43_4a9b746.JPEG', '364345', 'Vestes', 1, '0'),
(56, 'Gants homme', 10, 59.99, 'https://medias.la-becanerie.com/cache/images_articles/800_800/gants-moto-mi-saison-homme-darts-wild-etanche.jpg', '2131896', 'Gants', 1, '0');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant',
  `Nom` varchar(50) NOT NULL COMMENT 'Nom Utilisateur',
  `Prenom` varchar(100) NOT NULL COMMENT 'Prénom Utilisateur',
  `Mail` varchar(100) NOT NULL COMMENT 'Mail Utilisateur',
  `mdp` varchar(80) NOT NULL COMMENT 'Mot de passe utilisateur',
  `Type` varchar(25) NOT NULL DEFAULT 'client' COMMENT 'Type de compte',
  `photoUser` varchar(255) NOT NULL COMMENT 'Image profil',
  `etat` varchar(10) NOT NULL DEFAULT 'valid' COMMENT 'Etat du compte\r\n',
  `adresse1` varchar(100) DEFAULT NULL COMMENT 'Adresse 1',
  `ville` varchar(50) DEFAULT NULL COMMENT 'Ville',
  `region` varchar(25) DEFAULT NULL COMMENT 'Region',
  `codep` int(5) DEFAULT NULL COMMENT 'Code Postal',
  `pays` varchar(6) DEFAULT NULL COMMENT 'Pays',
  `infoc` varchar(255) DEFAULT NULL COMMENT 'Info Supplémentaire',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `Nom`, `Prenom`, `Mail`, `mdp`, `Type`, `photoUser`, `etat`, `adresse1`, `ville`, `region`, `codep`, `pays`, `infoc`) VALUES
(58, 'Durand', 'Clément', 'clement.durand.cd32@gmail.com', '$2y$10$/faiEXnQOaFV8JONLamn/.PxqdaQCVpdi3AaB6K8HCkpK4DBP88y.', 'admin', 'noir-et-couleur-spiderman_1920x1080.jpg', 'valid', 'ejbnfjwdfwdf', 'wdwgdgwdfwd', 'wdgwdfwdf', 86767, 'france', 'wdwdgwdf'),
(57, 'Durand', 'Clément', 'walid@gmail.com', '$2y$10$WNc9aexSDdkjBWaV7H/2lOLW56SnZ46.dGx5i1SsDs1XfIiSFRrEy', 'client', 'user.png', 'valid', NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'Durand', 'Clément', 'karim@gmail.com', '$2y$10$1j6s0utBhwWZJfG7rJA3CeeuB5p/Gpl20lDg9.ksEmVpDbgy3erpW', 'admin', 'noir-et-couleur-spiderman_1920x1080.jpg', 'valid', '5 rue du zizi', 'Ziziland', 'ZIZItanie', 85665, 'france', 'Code 234256'),
(60, 'Durand', 'Clément', 'aa@gmail.com', '$2y$10$/AKkEBXpWAnzXEKsx1GlXem569Iad.GaIHxtHqlbXXJRF7YBax.2O', 'client', 'noir-et-couleur-spiderman_1920x1080.jpg', 'valid', 'aaaaa', 'aaaaa', 'aaaaa', 86767, 'france', 'dwfwdf');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
