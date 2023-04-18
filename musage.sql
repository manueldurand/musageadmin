-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 18 avr. 2023 à 13:14
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `musage`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230417225353', '2023-04-18 00:54:22', 720),
('DoctrineMigrations\\Version20230418080119', '2023-04-18 10:01:55', 53);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `musage_adresses`
--

CREATE TABLE `musage_adresses` (
  `id` int(11) NOT NULL,
  `code_postal_id_id` int(11) NOT NULL,
  `ville_id_id` int(11) NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complement_adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `musage_categories`
--

CREATE TABLE `musage_categories` (
  `id` int(11) NOT NULL,
  `libelle` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `musage_categories`
--

INSERT INTO `musage_categories` (`id`, `libelle`) VALUES
(1, 'Mariage'),
(2, 'Amour'),
(3, 'Remerciements'),
(4, 'Anniversaire'),
(5, 'Naissance');

-- --------------------------------------------------------

--
-- Structure de la table `musage_clients`
--

CREATE TABLE `musage_clients` (
  `id` int(11) NOT NULL,
  `adresse_id_id` int(11) NOT NULL,
  `nom_client` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_client` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_client` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mot_de_passe` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `musage_code_postal`
--

CREATE TABLE `musage_code_postal` (
  `id` int(11) NOT NULL,
  `code_postal` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `musage_commandes`
--

CREATE TABLE `musage_commandes` (
  `id` int(11) NOT NULL,
  `client_id_id` int(11) NOT NULL,
  `lot_id_id` int(11) DEFAULT NULL,
  `date_commande` datetime NOT NULL,
  `livraison_souhaitee` datetime NOT NULL,
  `etat_commande` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_livraison` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `musage_commande_produit`
--

CREATE TABLE `musage_commande_produit` (
  `id` int(11) NOT NULL,
  `commande_id_id` int(11) NOT NULL,
  `produit_id_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `musage_couleurs`
--

CREATE TABLE `musage_couleurs` (
  `id` int(11) NOT NULL,
  `nom_couleur` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `musage_couleurs`
--

INSERT INTO `musage_couleurs` (`id`, `nom_couleur`) VALUES
(1, 'blanc'),
(2, 'blanche'),
(3, 'bleu'),
(4, 'bleue'),
(5, 'rouge'),
(6, 'rose'),
(7, 'jaune'),
(8, 'vert');

-- --------------------------------------------------------

--
-- Structure de la table `musage_lots`
--

CREATE TABLE `musage_lots` (
  `id` int(11) NOT NULL,
  `nom_lot` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantite` int(11) NOT NULL,
  `m_a_j` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `musage_lots`
--

INSERT INTO `musage_lots` (`id`, `nom_lot`, `quantite`, `m_a_j`) VALUES
(1, 'un stylo \"Lafleur\"', 1000, NULL),
(2, 'un sac en toile Lafleur', 700, NULL),
(3, 'un porte-clefs', 200, NULL),
(4, 'une rose rouge à offrir', 50, NULL),
(5, 'un bouquet de roses rouges', 10, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `musage_produits`
--

CREATE TABLE `musage_produits` (
  `id` int(11) NOT NULL,
  `plante_id_id` int(11) NOT NULL,
  `couleur_id_id` int(11) DEFAULT NULL,
  `unite_id_id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `date_maj` datetime NOT NULL,
  `lien_blog` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `musage_produits`
--

INSERT INTO `musage_produits` (`id`, `plante_id_id`, `couleur_id_id`, `unite_id_id`, `description`, `image1`, `image2`, `stock`, `date_maj`, `lien_blog`, `prix`) VALUES
(1, 1, 2, 1, 'la rose blanche pataiti zeezhze zeouhzef ze ze zefihze f zbebfhzueifuzuiiuz fbqedibqljb ..', 'default.png', 'default.png', 50, '2023-04-18 12:03:07', NULL, '3.00'),
(2, 4, NULL, 2, 'le tournesol zdfhzaehf iqbefipvhpque r libliugezr qelihbf q..', 'default.png', 'default.png', 70, '2023-04-18 12:03:07', NULL, '5.00'),
(3, 1, 5, 3, 'ZDLFUIGIZUGD Cz dpiqugep vq peifhvqpi eqiupfyqimjekbbfyz f zmiuhbrgqdurhgieuirg  ebkbkhbsfuyreuytiuyiuytzbhfskgrfbzurh', 'default.png', 'default.png', 25, '2023-04-18 12:03:07', NULL, '39.99'),
(4, 2, 3, 1, 'le gerbera zoihiohoinr  mioehfôviuh sdfkvjbqdmfouiqherkjg :q', 'default.png', 'default.png', 50, '2023-04-18 12:03:07', NULL, '2.50'),
(5, 2, 7, 1, 'sjiodofihzo  ^zoiôijefô vqs^efouibh ^sfgb', 'default.png', 'default.png', 50, '2023-04-18 12:03:07', NULL, '2.30'),
(6, 1, 7, 3, 'sdmojqôjndf vqd fôbns^ofifb^s emfkjhqôdhf v qed foihqùkngùoqieùoj !fd eàçàoilgkn ek', 'default.png', 'default.png', 15, '2023-04-18 12:03:07', NULL, '40.00');

-- --------------------------------------------------------

--
-- Structure de la table `musage_produit_categories`
--

CREATE TABLE `musage_produit_categories` (
  `id` int(11) NOT NULL,
  `categorie_id_id` int(11) NOT NULL,
  `produit_id_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `musage_type_plante`
--

CREATE TABLE `musage_type_plante` (
  `id` int(11) NOT NULL,
  `nom_plante` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `musage_type_plante`
--

INSERT INTO `musage_type_plante` (`id`, `nom_plante`, `description`) VALUES
(1, 'Rose', NULL),
(2, 'Gerbera', NULL),
(3, 'Orchidée', NULL),
(4, 'Tournesol', NULL),
(5, 'Gerbera', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `musage_unite`
--

CREATE TABLE `musage_unite` (
  `id` int(11) NOT NULL,
  `musage_type_unite` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `musage_unite`
--

INSERT INTO `musage_unite` (`id`, `musage_type_unite`) VALUES
(1, 'Tige, 40 cm'),
(2, 'Tige, 90 cm'),
(3, 'Bouquet, (10 unités)'),
(4, 'Gerbe, 100 gr'),
(5, 'Gerbe, 300 gr');

-- --------------------------------------------------------

--
-- Structure de la table `musage_user`
--

CREATE TABLE `musage_user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `musage_user`
--

INSERT INTO `musage_user` (`id`, `email`, `roles`, `password`, `nom`) VALUES
(1, 'manuel@musage.net', '[]', '$2y$13$EKX1wyfsfJtcuDvyFP9LCOHVLtiwX9SpA8a6b.Lst2tOrXJxZ80zK', 'Manuel'),
(2, 'pauline@musage.net', '[\"ROLE_USER\"]', '$2y$13$jhv/1Ea/p3.HSvs5Somii.Xv2W8h8vMTjjwe2cmb9cUwjcKLluYu.', 'Pauline');

-- --------------------------------------------------------

--
-- Structure de la table `musage_villes`
--

CREATE TABLE `musage_villes` (
  `id` int(11) NOT NULL,
  `nom_ville` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

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
-- Index pour la table `musage_adresses`
--
ALTER TABLE `musage_adresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DA17E11EF3432E9E` (`code_postal_id_id`),
  ADD KEY `IDX_DA17E11EF0C17188` (`ville_id_id`);

--
-- Index pour la table `musage_categories`
--
ALTER TABLE `musage_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `musage_clients`
--
ALTER TABLE `musage_clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_BBA4985C1004EF61` (`adresse_id_id`);

--
-- Index pour la table `musage_code_postal`
--
ALTER TABLE `musage_code_postal`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `musage_commandes`
--
ALTER TABLE `musage_commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4A8B2B53DC2902E0` (`client_id_id`),
  ADD KEY `IDX_4A8B2B5390CF359` (`lot_id_id`);

--
-- Index pour la table `musage_commande_produit`
--
ALTER TABLE `musage_commande_produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CAB5A43B462C4194` (`commande_id_id`),
  ADD KEY `IDX_CAB5A43B4FD8F9C3` (`produit_id_id`);

--
-- Index pour la table `musage_couleurs`
--
ALTER TABLE `musage_couleurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `musage_lots`
--
ALTER TABLE `musage_lots`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `musage_produits`
--
ALTER TABLE `musage_produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8B231BC01AFF595C` (`plante_id_id`),
  ADD KEY `IDX_8B231BC06F285051` (`couleur_id_id`),
  ADD KEY `IDX_8B231BC06E366321` (`unite_id_id`);

--
-- Index pour la table `musage_produit_categories`
--
ALTER TABLE `musage_produit_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1DB752C88A3C7387` (`categorie_id_id`),
  ADD KEY `IDX_1DB752C84FD8F9C3` (`produit_id_id`);

--
-- Index pour la table `musage_type_plante`
--
ALTER TABLE `musage_type_plante`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `musage_unite`
--
ALTER TABLE `musage_unite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `musage_user`
--
ALTER TABLE `musage_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_3574C6F7E7927C74` (`email`);

--
-- Index pour la table `musage_villes`
--
ALTER TABLE `musage_villes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `musage_adresses`
--
ALTER TABLE `musage_adresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `musage_categories`
--
ALTER TABLE `musage_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `musage_clients`
--
ALTER TABLE `musage_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `musage_code_postal`
--
ALTER TABLE `musage_code_postal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `musage_commandes`
--
ALTER TABLE `musage_commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `musage_commande_produit`
--
ALTER TABLE `musage_commande_produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `musage_couleurs`
--
ALTER TABLE `musage_couleurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `musage_lots`
--
ALTER TABLE `musage_lots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `musage_produits`
--
ALTER TABLE `musage_produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `musage_produit_categories`
--
ALTER TABLE `musage_produit_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `musage_type_plante`
--
ALTER TABLE `musage_type_plante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `musage_unite`
--
ALTER TABLE `musage_unite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `musage_user`
--
ALTER TABLE `musage_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `musage_villes`
--
ALTER TABLE `musage_villes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `musage_adresses`
--
ALTER TABLE `musage_adresses`
  ADD CONSTRAINT `FK_DA17E11EF0C17188` FOREIGN KEY (`ville_id_id`) REFERENCES `musage_villes` (`id`),
  ADD CONSTRAINT `FK_DA17E11EF3432E9E` FOREIGN KEY (`code_postal_id_id`) REFERENCES `musage_code_postal` (`id`);

--
-- Contraintes pour la table `musage_clients`
--
ALTER TABLE `musage_clients`
  ADD CONSTRAINT `FK_BBA4985C1004EF61` FOREIGN KEY (`adresse_id_id`) REFERENCES `musage_adresses` (`id`);

--
-- Contraintes pour la table `musage_commandes`
--
ALTER TABLE `musage_commandes`
  ADD CONSTRAINT `FK_4A8B2B5390CF359` FOREIGN KEY (`lot_id_id`) REFERENCES `musage_lots` (`id`),
  ADD CONSTRAINT `FK_4A8B2B53DC2902E0` FOREIGN KEY (`client_id_id`) REFERENCES `musage_clients` (`id`);

--
-- Contraintes pour la table `musage_commande_produit`
--
ALTER TABLE `musage_commande_produit`
  ADD CONSTRAINT `FK_CAB5A43B462C4194` FOREIGN KEY (`commande_id_id`) REFERENCES `musage_commandes` (`id`),
  ADD CONSTRAINT `FK_CAB5A43B4FD8F9C3` FOREIGN KEY (`produit_id_id`) REFERENCES `musage_produits` (`id`);

--
-- Contraintes pour la table `musage_produits`
--
ALTER TABLE `musage_produits`
  ADD CONSTRAINT `FK_8B231BC01AFF595C` FOREIGN KEY (`plante_id_id`) REFERENCES `musage_type_plante` (`id`),
  ADD CONSTRAINT `FK_8B231BC06E366321` FOREIGN KEY (`unite_id_id`) REFERENCES `musage_unite` (`id`),
  ADD CONSTRAINT `FK_8B231BC06F285051` FOREIGN KEY (`couleur_id_id`) REFERENCES `musage_couleurs` (`id`);

--
-- Contraintes pour la table `musage_produit_categories`
--
ALTER TABLE `musage_produit_categories`
  ADD CONSTRAINT `FK_1DB752C84FD8F9C3` FOREIGN KEY (`produit_id_id`) REFERENCES `musage_produits` (`id`),
  ADD CONSTRAINT `FK_1DB752C88A3C7387` FOREIGN KEY (`categorie_id_id`) REFERENCES `musage_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
