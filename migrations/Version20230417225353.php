<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230417225353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE musage_adresses (id INT AUTO_INCREMENT NOT NULL, code_postal_id_id INT NOT NULL, ville_id_id INT NOT NULL, adresse VARCHAR(255) NOT NULL, complement_adresse VARCHAR(255) DEFAULT NULL, INDEX IDX_DA17E11EF3432E9E (code_postal_id_id), INDEX IDX_DA17E11EF0C17188 (ville_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musage_categories (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musage_clients (id INT AUTO_INCREMENT NOT NULL, adresse_id_id INT NOT NULL, nom_client VARCHAR(45) NOT NULL, prenom_client VARCHAR(45) NOT NULL, email_client VARCHAR(64) NOT NULL, mot_de_passe VARCHAR(70) NOT NULL, telephone VARCHAR(15) NOT NULL, UNIQUE INDEX UNIQ_BBA4985C1004EF61 (adresse_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musage_code_postal (id INT AUTO_INCREMENT NOT NULL, code_postal VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musage_commande_produit (id INT AUTO_INCREMENT NOT NULL, commande_id_id INT NOT NULL, produit_id_id INT NOT NULL, quantite INT NOT NULL, INDEX IDX_CAB5A43B462C4194 (commande_id_id), INDEX IDX_CAB5A43B4FD8F9C3 (produit_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musage_commandes (id INT AUTO_INCREMENT NOT NULL, client_id_id INT NOT NULL, lot_id_id INT DEFAULT NULL, date_commande DATETIME NOT NULL, livraison_souhaitee DATETIME NOT NULL, etat_commande VARCHAR(45) NOT NULL, date_livraison DATETIME DEFAULT NULL, INDEX IDX_4A8B2B53DC2902E0 (client_id_id), INDEX IDX_4A8B2B5390CF359 (lot_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musage_couleurs (id INT AUTO_INCREMENT NOT NULL, nom_couleur VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musage_lots (id INT AUTO_INCREMENT NOT NULL, nom_lot VARCHAR(45) NOT NULL, quantite INT NOT NULL, m_a_j DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musage_produit_categories (id INT AUTO_INCREMENT NOT NULL, categorie_id_id INT NOT NULL, produit_id_id INT NOT NULL, INDEX IDX_1DB752C88A3C7387 (categorie_id_id), INDEX IDX_1DB752C84FD8F9C3 (produit_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musage_produits (id INT AUTO_INCREMENT NOT NULL, plante_id_id INT NOT NULL, couleur_id_id INT DEFAULT NULL, unite_id_id INT NOT NULL, description VARCHAR(255) NOT NULL, image1 VARCHAR(45) NOT NULL, image2 VARCHAR(45) NOT NULL, stock INT NOT NULL, date_maj DATETIME NOT NULL, lien_blog VARCHAR(64) DEFAULT NULL, prix NUMERIC(5, 2) NOT NULL, INDEX IDX_8B231BC01AFF595C (plante_id_id), INDEX IDX_8B231BC06F285051 (couleur_id_id), INDEX IDX_8B231BC06E366321 (unite_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musage_type_plante (id INT AUTO_INCREMENT NOT NULL, nom_plante VARCHAR(45) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musage_unite (id INT AUTO_INCREMENT NOT NULL, musage_type_unite VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musage_user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_3574C6F7E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musage_villes (id INT AUTO_INCREMENT NOT NULL, nom_ville VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE musage_adresses ADD CONSTRAINT FK_DA17E11EF3432E9E FOREIGN KEY (code_postal_id_id) REFERENCES musage_code_postal (id)');
        $this->addSql('ALTER TABLE musage_adresses ADD CONSTRAINT FK_DA17E11EF0C17188 FOREIGN KEY (ville_id_id) REFERENCES musage_villes (id)');
        $this->addSql('ALTER TABLE musage_clients ADD CONSTRAINT FK_BBA4985C1004EF61 FOREIGN KEY (adresse_id_id) REFERENCES musage_adresses (id)');
        $this->addSql('ALTER TABLE musage_commande_produit ADD CONSTRAINT FK_CAB5A43B462C4194 FOREIGN KEY (commande_id_id) REFERENCES musage_commandes (id)');
        $this->addSql('ALTER TABLE musage_commande_produit ADD CONSTRAINT FK_CAB5A43B4FD8F9C3 FOREIGN KEY (produit_id_id) REFERENCES musage_produits (id)');
        $this->addSql('ALTER TABLE musage_commandes ADD CONSTRAINT FK_4A8B2B53DC2902E0 FOREIGN KEY (client_id_id) REFERENCES musage_clients (id)');
        $this->addSql('ALTER TABLE musage_commandes ADD CONSTRAINT FK_4A8B2B5390CF359 FOREIGN KEY (lot_id_id) REFERENCES musage_lots (id)');
        $this->addSql('ALTER TABLE musage_produit_categories ADD CONSTRAINT FK_1DB752C88A3C7387 FOREIGN KEY (categorie_id_id) REFERENCES musage_categories (id)');
        $this->addSql('ALTER TABLE musage_produit_categories ADD CONSTRAINT FK_1DB752C84FD8F9C3 FOREIGN KEY (produit_id_id) REFERENCES musage_produits (id)');
        $this->addSql('ALTER TABLE musage_produits ADD CONSTRAINT FK_8B231BC01AFF595C FOREIGN KEY (plante_id_id) REFERENCES musage_type_plante (id)');
        $this->addSql('ALTER TABLE musage_produits ADD CONSTRAINT FK_8B231BC06F285051 FOREIGN KEY (couleur_id_id) REFERENCES musage_couleurs (id)');
        $this->addSql('ALTER TABLE musage_produits ADD CONSTRAINT FK_8B231BC06E366321 FOREIGN KEY (unite_id_id) REFERENCES musage_unite (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE musage_adresses DROP FOREIGN KEY FK_DA17E11EF3432E9E');
        $this->addSql('ALTER TABLE musage_adresses DROP FOREIGN KEY FK_DA17E11EF0C17188');
        $this->addSql('ALTER TABLE musage_clients DROP FOREIGN KEY FK_BBA4985C1004EF61');
        $this->addSql('ALTER TABLE musage_commande_produit DROP FOREIGN KEY FK_CAB5A43B462C4194');
        $this->addSql('ALTER TABLE musage_commande_produit DROP FOREIGN KEY FK_CAB5A43B4FD8F9C3');
        $this->addSql('ALTER TABLE musage_commandes DROP FOREIGN KEY FK_4A8B2B53DC2902E0');
        $this->addSql('ALTER TABLE musage_commandes DROP FOREIGN KEY FK_4A8B2B5390CF359');
        $this->addSql('ALTER TABLE musage_produit_categories DROP FOREIGN KEY FK_1DB752C88A3C7387');
        $this->addSql('ALTER TABLE musage_produit_categories DROP FOREIGN KEY FK_1DB752C84FD8F9C3');
        $this->addSql('ALTER TABLE musage_produits DROP FOREIGN KEY FK_8B231BC01AFF595C');
        $this->addSql('ALTER TABLE musage_produits DROP FOREIGN KEY FK_8B231BC06F285051');
        $this->addSql('ALTER TABLE musage_produits DROP FOREIGN KEY FK_8B231BC06E366321');
        $this->addSql('DROP TABLE musage_adresses');
        $this->addSql('DROP TABLE musage_categories');
        $this->addSql('DROP TABLE musage_clients');
        $this->addSql('DROP TABLE musage_code_postal');
        $this->addSql('DROP TABLE musage_commande_produit');
        $this->addSql('DROP TABLE musage_commandes');
        $this->addSql('DROP TABLE musage_couleurs');
        $this->addSql('DROP TABLE musage_lots');
        $this->addSql('DROP TABLE musage_produit_categories');
        $this->addSql('DROP TABLE musage_produits');
        $this->addSql('DROP TABLE musage_type_plante');
        $this->addSql('DROP TABLE musage_unite');
        $this->addSql('DROP TABLE musage_user');
        $this->addSql('DROP TABLE musage_villes');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
