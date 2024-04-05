-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : devbdd.iutmetz.univ-lorraine.fr
-- Généré le : ven. 05 avr. 2024 à 10:13
-- Version du serveur : 10.3.39-MariaDB
-- Version de PHP : 8.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `varon1u_SAE401SAH`
--

-- --------------------------------------------------------

--
-- Structure de la table `CATEGORIE`
--

CREATE TABLE `CATEGORIE` (
  `id_categorie` bigint(20) UNSIGNED NOT NULL,
  `nom_categorie` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `CATEGORIE`
--

INSERT INTO `CATEGORIE` (`id_categorie`, `nom_categorie`) VALUES
(1, 'Paysagisme'),
(2, 'Menuiserie'),
(3, 'Plomberie'),
(4, 'Electricité'),
(5, 'Terrassement'),
(6, 'Chauffagerie'),
(7, 'Maçonnerie'),
(8, 'Peinture'),
(9, 'Démolition'),
(10, 'Bâtiment'),
(11, 'Toiture');

-- --------------------------------------------------------

--
-- Structure de la table `FAVORIS`
--

CREATE TABLE `FAVORIS` (
  `id_favori` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_mat` int(11) DEFAULT NULL,
  `id_service` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `FAVORIS`
--

INSERT INTO `FAVORIS` (`id_favori`, `id_user`, `id_mat`, `id_service`) VALUES
(1, 6, 7, 0);

-- --------------------------------------------------------

--
-- Structure de la table `MATERIEL`
--

CREATE TABLE `MATERIEL` (
  `id_mat` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `marque` varchar(100) DEFAULT NULL,
  `categorie` int(11) DEFAULT NULL,
  `modele` varchar(100) DEFAULT NULL,
  `statut` varchar(100) DEFAULT NULL,
  `prix_mat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `MATERIEL`
--

INSERT INTO `MATERIEL` (`id_mat`, `id_user`, `description`, `photo`, `marque`, `categorie`, `modele`, `statut`, `prix_mat`) VALUES
(1, 1, 'Tondeuse à gazon', '/photos/tondeuse.jpg', 'GreenWorks', 1, 'Model 2500', 'Neuf', 300),
(2, 2, 'Scie circulaire', '/photos/scie_circulaire.jpg', 'Bosch', 2, 'GKS 190', 'Occasion', 150),
(3, 3, 'Clé à molette', '/photos/cle_malette.jpg', 'Facom', 3, '101', 'Neuf', 50),
(4, 4, 'Multimètre', '/photos/multimetre.jpg', 'Fluke', 4, '87V', 'Occasion', 200),
(5, 5, 'Mini-pelle', '/photos/mini_pelle.jpg', 'Caterpillar', 5, '301.5', 'Occasion', 15000),
(6, 6, 'Chaudière à gaz', '/photos/chaudiere.jpg', 'Viessmann', 6, 'Vitodens 222-F', 'Neuf', 4000),
(7, 7, 'Bétonnière', '/photos/betonniere.jpg', 'Altrad', 7, 'B150', 'Neuf', 1000),
(8, 8, 'Pistolet à peinture', '/photos/pistolet_peinture.jpg', 'Wagner', 8, 'Control Pro 350 R', 'Occasion', 300),
(9, 9, 'Marteau-piqueur', '/photos/marteau_piqueur.jpg', 'Makita', 9, 'HM0871C', 'Neuf', 500),
(10, 10, 'Tuile en terre cuite', '/photos/tuile.jpg', 'Monier', 10, 'MonierLand', 'Neuf', 5),
(11, 1, 'Taille-haie électrique', '/photos/taille_haie.jpg', 'Bosch', 1, 'AHS 50-20', 'Occasion', 80),
(12, 2, 'Scie à onglet', '/photos/scie_onglet.jpg', 'DeWalt', 2, 'DWS779', 'Neuf', 350),
(13, 3, 'Perceuse sans fil', '/photos/perceuse.jpg', 'Makita', 4, 'DF331D', 'Neuf', 120),
(14, 4, 'Tronçonneuse thermique', '/photos/tronconneuse.jpg', 'Stihl', 1, 'MS 170', 'Occasion', 250),
(15, 5, 'Niveau laser', '/photos/niveau_laser.jpg', 'Bosch', 4, 'GCL 2-15', 'Occasion', 100),
(16, 6, 'Débroussailleuse', '/photos/debroussailleuse.jpg', 'Husqvarna', 1, '129R', 'Neuf', 220),
(17, 7, 'Scie à ruban', '/photos/scie_ruban.jpg', 'Jet', 2, 'JWBS-14SFX', 'Neuf', 900),
(18, 8, 'Ponceuse orbitale', '/photos/ponceuse_orbitale.jpg', 'Makita', 8, 'BO5041K', 'Occasion', 150),
(19, 9, 'Compresseur d\'air', '/photos/compresseur_air.jpg', 'California Air Tools', 10, 'CAT-1P1060S', 'Neuf', 100),
(20, 10, 'Scie sauteuse', '/photos/scie_sauteuse.jpg', 'Bosch', 2, 'JS572EK', 'Occasion', 90);

-- --------------------------------------------------------

--
-- Structure de la table `PANIER`
--

CREATE TABLE `PANIER` (
  `id_panier` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_mat` int(11) DEFAULT NULL,
  `id_service` int(11) DEFAULT NULL,
  `qte` int(11) DEFAULT NULL,
  `prix_jeton` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `PANIER`
--

INSERT INTO `PANIER` (`id_panier`, `id_user`, `id_mat`, `id_service`, `qte`, `prix_jeton`) VALUES
(1, 3, 10, 2, 4, 14),
(2, 3, 10, 11, 3, 33),
(3, 10, 0, 16, 4, 57);

-- --------------------------------------------------------

--
-- Structure de la table `SERVICES`
--

CREATE TABLE `SERVICES` (
  `id_service` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `categorie` int(11) DEFAULT NULL,
  `statut` varchar(100) DEFAULT NULL,
  `prix_service` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `SERVICES`
--

INSERT INTO `SERVICES` (`id_service`, `id_user`, `description`, `photo`, `categorie`, `statut`, `prix_service`) VALUES
(1, 3, 'Service de déménagement', '/photos/demenagement.jpg', 10, 'Disponible', 500),
(2, 1, 'Cours de cuisine', '/photos/cuisine.jpg', 11, 'Indisponible', 80),
(3, 2, 'Soin du visage', '/photos/soin_visage.jpg', 8, 'Disponible', 100),
(4, 3, 'Services de plomberie', '/photos/plomberie.jpg', 3, 'Disponible', 70),
(5, 3, 'Service de terrassement pour jardin', '/photos/terrassement.jpg', 5, 'Disponible', 2000),
(6, 1, 'Service de pose de parquet', '/photos/pose_parquet.jpg', 2, 'Disponible', 500),
(7, 2, 'Service de réparation de vélos', '/photos/reparation_velo.jpg', 5, 'Disponible', 50),
(8, 3, 'Service de réparation de fuites', '/photos/reparation_fuites.jpg', 3, 'Disponible', 100),
(9, 1, 'Service de cours de couture', '/photos/couture.jpg', 2, 'Indisponible', 60),
(10, 2, 'Service de nettoyage de vitres', '/photos/nettoyage_vitres.jpg', 7, 'Disponible', 80),
(11, 3, 'Service de rénovation de salle de bain', '/photos/renovation_sdb.jpg', 3, 'Disponible', 2000),
(12, 1, 'Service de déménagement local', '/photos/demenagement_local.jpg', 10, 'Disponible', 300),
(13, 2, 'Service de peinture extérieure', '/photos/peinture_exterieure.jpg', 9, 'Disponible', 400),
(14, 3, 'Service de montage de meubles', '/photos/montage_meubles.jpg', 7, 'Disponible', 50),
(15, 1, 'Service de nettoyage de tapis', '/photos/nettoyage_tapis.jpg', 7, 'Disponible', 70),
(16, 2, 'Service de réparation de volets', '/photos/reparation_volets.jpg', 8, 'Disponible', 120),
(17, 3, 'Service de construction de murs', '/photos/construction_murs.jpg', 10, 'Disponible', 1500),
(18, 1, 'Service de taille de haie', '/photos/taille_haie_service.jpg', 1, 'Disponible', 80),
(19, 2, 'Service de réparation de tondeuses', '/photos/reparation_tondeuses.jpg', 1, 'Disponible', 50),
(20, 3, 'Service de pose de gouttières', '/photos/pose_gouttieres.jpg', 11, 'Disponible', 100);

-- --------------------------------------------------------

--
-- Structure de la table `TRANSACTION`
--

CREATE TABLE `TRANSACTION` (
  `id_transaction` bigint(20) UNSIGNED NOT NULL,
  `id_emprunteur` int(11) DEFAULT NULL,
  `id_preteur` int(11) DEFAULT NULL,
  `id_mat` int(11) DEFAULT NULL,
  `id_service` int(11) DEFAULT NULL,
  `date_transaction` date DEFAULT NULL,
  `date_emprunt` date DEFAULT NULL,
  `date_retour` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `TRANSACTION`
--

INSERT INTO `TRANSACTION` (`id_transaction`, `id_emprunteur`, `id_preteur`, `id_mat`, `id_service`, `date_transaction`, `date_emprunt`, `date_retour`) VALUES
(1, 2, 7, 0, 3, '2024-03-20', '2024-04-03', '2024-04-04'),
(2, 1, 6, 0, 14, '2024-03-16', '2024-03-30', '2024-04-07'),
(3, 1, 9, 0, 16, '2024-03-31', '2024-03-30', '2024-04-04'),
(4, 5, 3, 1, 0, '2024-03-20', '2024-03-28', '2024-04-06'),
(5, 9, 3, 1, 0, '2024-03-15', '2024-04-03', '2024-04-08'),
(6, 6, 4, 3, 0, '2024-03-15', '2024-03-27', '2024-04-05'),
(7, 1, 7, 6, 0, '2024-04-04', '2024-04-04', '2024-04-04'),
(8, 2, 5, 8, 0, '2024-03-14', '2024-04-03', '2024-04-06'),
(9, 1, 3, 0, 0, '2024-03-12', '2024-03-29', '2024-04-08'),
(10, 1, 5, 0, 0, '2024-04-01', '2024-04-02', '2024-04-07'),
(11, 4, 5, 0, 0, '2024-03-10', '2024-04-03', '2024-04-04'),
(12, 6, 5, 0, 0, '2024-03-25', '2024-04-02', '2024-04-05'),
(13, 5, 6, 0, 0, '2024-03-19', '2024-03-26', '2024-04-05'),
(14, 3, 7, 0, 0, '2024-03-27', '2024-03-29', '2024-04-05'),
(15, 4, 7, 0, 0, '2024-03-15', '2024-03-31', '2024-04-04'),
(16, 6, 7, 0, 0, '2024-03-19', '2024-04-02', '2024-04-07'),
(17, 4, 10, 0, 0, '2024-03-19', '2024-03-29', '2024-04-07'),
(18, 9, 10, 0, 0, '2024-03-11', '2024-03-28', '2024-04-06');

-- --------------------------------------------------------

--
-- Structure de la table `TYPES`
--

CREATE TABLE `TYPES` (
  `id_type` bigint(20) UNSIGNED NOT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `nom_type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `TYPES`
--

INSERT INTO `TYPES` (`id_type`, `id_categorie`, `nom_type`) VALUES
(1, 1, 'Outils de jardinage'),
(2, 2, 'Outils de menuiserie'),
(3, 3, 'Outils de plomberie'),
(4, 4, 'Outils d\'électricité'),
(5, 5, 'Machines de terrassement'),
(6, 6, 'Matériel de chauffagerie'),
(7, 7, 'Matériel de maçonnerie'),
(8, 8, 'Matériel de peinture'),
(9, 9, 'Outils de démolition'),
(10, 10, 'Matériel de bâtiment'),
(11, 11, 'Matériel de toiture');

-- --------------------------------------------------------

--
-- Structure de la table `UTILISATEUR`
--

CREATE TABLE `UTILISATEUR` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `tel` bigint(20) NOT NULL,
  `rayon` smallint(6) NOT NULL,
  `nb_jetons` smallint(6) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `UTILISATEUR`
--

INSERT INTO `UTILISATEUR` (`id_user`, `mdp`, `nom`, `prenom`, `adresse`, `tel`, `rayon`, `nb_jetons`, `admin`) VALUES
(1, 'Aqueduc()', 'Dupont', 'Jean', '11 rue de la Liberté, Ville', 1234567891, 15, 50, 1),
(2, 'Contrepèterie?4', 'Martin', 'Emma', '22 avenue des Roses, Ville', 9876543211, 20, 30, 0),
(3, 'Virevole-21', 'Garcia', 'Lucas', '33 chemin des Lilas, Ville', 5556667771, 25, 100, 0),
(4, 'Merlin\'90', 'Leroy', 'Camille', '44 rue Principale, Ville', 1112223334, 10, 80, 0),
(5, 'RoisDuChateau31', 'Moreau', 'Léa', '55 avenue Secondaire, Ville', 4445556667, 30, 60, 0),
(6, 'Gesticulation_34', 'Roux', 'Louis', '66 rue de la Paix, Ville', 7778889990, 15, 70, 0),
(7, 'Worcestershire=88', 'Fournier', 'Zoé', '77 avenue des Champs, Ville', 2223334445, 20, 90, 0),
(8, 'Caliméro91', 'Petit', 'Paul', '88 rue de la Poste, Ville', 6667778880, 25, 40, 0),
(9, 'Saturnin.79', 'Dubois', 'Marie', '99 avenue des Fleurs, Ville', 3334445556, 20, 110, 0),
(10, 'Clifford2000', 'Bernard', 'Louise', '1010 boulevard des Arbres, Ville', 9990001112, 15, 75, 0),
(99, 'Franchementcestca', 'Thanos', 'Dione', '13 Boulevard du Sah', 9999999999, 999, 999, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `CATEGORIE`
--
ALTER TABLE `CATEGORIE`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `FAVORIS`
--
ALTER TABLE `FAVORIS`
  ADD PRIMARY KEY (`id_favori`);

--
-- Index pour la table `MATERIEL`
--
ALTER TABLE `MATERIEL`
  ADD PRIMARY KEY (`id_mat`);

--
-- Index pour la table `PANIER`
--
ALTER TABLE `PANIER`
  ADD PRIMARY KEY (`id_panier`);

--
-- Index pour la table `SERVICES`
--
ALTER TABLE `SERVICES`
  ADD PRIMARY KEY (`id_service`);

--
-- Index pour la table `TRANSACTION`
--
ALTER TABLE `TRANSACTION`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Index pour la table `TYPES`
--
ALTER TABLE `TYPES`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `UTILISATEUR`
--
ALTER TABLE `UTILISATEUR`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `CATEGORIE`
--
ALTER TABLE `CATEGORIE`
  MODIFY `id_categorie` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `FAVORIS`
--
ALTER TABLE `FAVORIS`
  MODIFY `id_favori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `MATERIEL`
--
ALTER TABLE `MATERIEL`
  MODIFY `id_mat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `PANIER`
--
ALTER TABLE `PANIER`
  MODIFY `id_panier` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `SERVICES`
--
ALTER TABLE `SERVICES`
  MODIFY `id_service` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `TRANSACTION`
--
ALTER TABLE `TRANSACTION`
  MODIFY `id_transaction` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `TYPES`
--
ALTER TABLE `TYPES`
  MODIFY `id_type` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `UTILISATEUR`
--
ALTER TABLE `UTILISATEUR`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
