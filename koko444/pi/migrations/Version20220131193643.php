<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220131193643 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ParticipationT (id INT AUTO_INCREMENT NOT NULL, id_trajet INT DEFAULT NULL, id_user INT DEFAULT NULL, INDEX IDX_95A80B5BD6C1C61 (id_trajet), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agence (id INT AUTO_INCREMENT NOT NULL, pays_id INT DEFAULT NULL, logo VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, tel INT NOT NULL, update_at DATETIME DEFAULT NULL, INDEX IDX_64C19AA9A6E44244 (pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blog (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE calendar (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, start DATETIME NOT NULL, end DATETIME NOT NULL, description LONGTEXT NOT NULL, all_day TINYINT(1) NOT NULL, background_color VARCHAR(7) NOT NULL, bordor_color VARCHAR(7) NOT NULL, text_color VARCHAR(7) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_497DD634FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chambre (id INT AUTO_INCREMENT NOT NULL, hotel_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, vue VARCHAR(255) NOT NULL, duree VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_C509E4FF3243BB18 (hotel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chambre_res (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, chambre_id INT DEFAULT NULL, date_deb DATE NOT NULL, date_fin DATE NOT NULL, UNIQUE INDEX UNIQ_7EFB3049A76ED395 (user_id), UNIQUE INDEX UNIQ_7EFB30499B177F54 (chambre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chauffeur (id_chauffeur INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, disponibilite INT DEFAULT NULL, PRIMARY KEY(id_chauffeur)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, utilisateur_id INT DEFAULT NULL, text VARCHAR(255) NOT NULL, date DATETIME NOT NULL, INDEX IDX_9474526CBCF5E72D (categorie_id), INDEX IDX_9474526CFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotel (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, etoile VARCHAR(255) NOT NULL, num VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE likecategorie (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, utilisateur_id INT DEFAULT NULL, date DATETIME NOT NULL, INDEX IDX_C5896F6CBCF5E72D (categorie_id), INDEX IDX_C5896F6CFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, sender_id INT NOT NULL, recipient_id INT NOT NULL, title VARCHAR(255) DEFAULT NULL, message LONGTEXT NOT NULL, created_at DATETIME NOT NULL, is_read TINYINT(1) NOT NULL, INDEX IDX_B6BD307FF624B39D (sender_id), INDEX IDX_B6BD307FE92F8F78 (recipient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moydetran (id_moy_trans INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) DEFAULT NULL, matricule VARCHAR(255) DEFAULT NULL, disponibilite INT DEFAULT NULL, PRIMARY KEY(id_moy_trans)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre (id INT AUTO_INCREMENT NOT NULL, pays_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, image VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, updated_at DATETIME NOT NULL, lat DOUBLE PRECISION DEFAULT NULL, lng DOUBLE PRECISION DEFAULT NULL, INDEX IDX_AF86866FA6E44244 (pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, continent VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plan (id INT AUTO_INCREMENT NOT NULL, pays_id INT DEFAULT NULL, agence_id INT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, sujet VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date DATE NOT NULL, prix DOUBLE PRECISION NOT NULL, update_at DATETIME DEFAULT NULL, INDEX IDX_DD5A5B7DA6E44244 (pays_id), INDEX IDX_DD5A5B7DD725330D (agence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plan_res (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, plan_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_75536115A76ED395 (user_id), UNIQUE INDEX UNIQ_75536115E899029B (plan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, utilisateurs_id INT DEFAULT NULL, object VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, statut VARCHAR(255) NOT NULL, INDEX IDX_CE6064041E969C5 (utilisateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trajet (id_trajet INT AUTO_INCREMENT NOT NULL, id_chauffeur INT DEFAULT NULL, id_moy_trans INT DEFAULT NULL, date_depart DATE DEFAULT NULL, date_arrive DATE DEFAULT NULL, pt_depart VARCHAR(255) DEFAULT NULL, pt_arrive VARCHAR(255) DEFAULT NULL, prix DOUBLE PRECISION DEFAULT NULL, lat DOUBLE PRECISION NOT NULL, lng DOUBLE PRECISION NOT NULL, La_g DOUBLE PRECISION NOT NULL, La_i DOUBLE PRECISION NOT NULL, Ra_g DOUBLE PRECISION NOT NULL, Ra_i DOUBLE PRECISION NOT NULL, INDEX FN_key (id_chauffeur), INDEX FN_keymoy (id_moy_trans), PRIMARY KEY(id_trajet)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles VARCHAR(255) DEFAULT NULL, activation_token VARCHAR(50) DEFAULT NULL, reset_token VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ParticipationT ADD CONSTRAINT FK_95A80B5BD6C1C61 FOREIGN KEY (id_trajet) REFERENCES trajet (id_trajet)');
        $this->addSql('ALTER TABLE agence ADD CONSTRAINT FK_64C19AA9A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD634FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE chambre ADD CONSTRAINT FK_C509E4FF3243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE chambre_res ADD CONSTRAINT FK_7EFB3049A76ED395 FOREIGN KEY (user_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE chambre_res ADD CONSTRAINT FK_7EFB30499B177F54 FOREIGN KEY (chambre_id) REFERENCES chambre (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE likecategorie ADD CONSTRAINT FK_C5896F6CBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE likecategorie ADD CONSTRAINT FK_C5896F6CFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FF624B39D FOREIGN KEY (sender_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FE92F8F78 FOREIGN KEY (recipient_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866FA6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE plan ADD CONSTRAINT FK_DD5A5B7DA6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE plan ADD CONSTRAINT FK_DD5A5B7DD725330D FOREIGN KEY (agence_id) REFERENCES agence (id)');
        $this->addSql('ALTER TABLE plan_res ADD CONSTRAINT FK_75536115A76ED395 FOREIGN KEY (user_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE plan_res ADD CONSTRAINT FK_75536115E899029B FOREIGN KEY (plan_id) REFERENCES plan (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE6064041E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE trajet ADD CONSTRAINT FK_2B5BA98CDC92CB9F FOREIGN KEY (id_chauffeur) REFERENCES chauffeur (id_chauffeur)');
        $this->addSql('ALTER TABLE trajet ADD CONSTRAINT FK_2B5BA98CF0F0BA17 FOREIGN KEY (id_moy_trans) REFERENCES moydetran (id_moy_trans)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plan DROP FOREIGN KEY FK_DD5A5B7DD725330D');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CBCF5E72D');
        $this->addSql('ALTER TABLE likecategorie DROP FOREIGN KEY FK_C5896F6CBCF5E72D');
        $this->addSql('ALTER TABLE chambre_res DROP FOREIGN KEY FK_7EFB30499B177F54');
        $this->addSql('ALTER TABLE trajet DROP FOREIGN KEY FK_2B5BA98CDC92CB9F');
        $this->addSql('ALTER TABLE chambre DROP FOREIGN KEY FK_C509E4FF3243BB18');
        $this->addSql('ALTER TABLE trajet DROP FOREIGN KEY FK_2B5BA98CF0F0BA17');
        $this->addSql('ALTER TABLE agence DROP FOREIGN KEY FK_64C19AA9A6E44244');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866FA6E44244');
        $this->addSql('ALTER TABLE plan DROP FOREIGN KEY FK_DD5A5B7DA6E44244');
        $this->addSql('ALTER TABLE plan_res DROP FOREIGN KEY FK_75536115E899029B');
        $this->addSql('ALTER TABLE ParticipationT DROP FOREIGN KEY FK_95A80B5BD6C1C61');
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD634FB88E14F');
        $this->addSql('ALTER TABLE chambre_res DROP FOREIGN KEY FK_7EFB3049A76ED395');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CFB88E14F');
        $this->addSql('ALTER TABLE likecategorie DROP FOREIGN KEY FK_C5896F6CFB88E14F');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FF624B39D');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FE92F8F78');
        $this->addSql('ALTER TABLE plan_res DROP FOREIGN KEY FK_75536115A76ED395');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE6064041E969C5');
        $this->addSql('DROP TABLE ParticipationT');
        $this->addSql('DROP TABLE agence');
        $this->addSql('DROP TABLE blog');
        $this->addSql('DROP TABLE calendar');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE chambre');
        $this->addSql('DROP TABLE chambre_res');
        $this->addSql('DROP TABLE chauffeur');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE likecategorie');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE moydetran');
        $this->addSql('DROP TABLE offre');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE plan');
        $this->addSql('DROP TABLE plan_res');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE trajet');
        $this->addSql('DROP TABLE utilisateur');
    }
}
