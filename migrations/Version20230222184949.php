<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230222184949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comedien (id_comedien INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, age INT DEFAULT NULL, sexe VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id_comedien)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrat (id_contrat INT AUTO_INCREMENT NOT NULL, id_comedien INT DEFAULT NULL, id_da INT DEFAULT NULL, creation_contrat DATE DEFAULT NULL, date_debut DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, production VARCHAR(255) DEFAULT NULL, titre VARCHAR(255) DEFAULT NULL, nom_personnage VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, INDEX IDX_60349993B2190F57 (id_comedien), INDEX IDX_60349993BA801495 (id_da), PRIMARY KEY(id_contrat)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE da (id_da INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id_da)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993B2190F57 FOREIGN KEY (id_comedien) REFERENCES comedien (id_comedien)');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993BA801495 FOREIGN KEY (id_da) REFERENCES da (id_da)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993B2190F57');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993BA801495');
        $this->addSql('DROP TABLE comedien');
        $this->addSql('DROP TABLE contrat');
        $this->addSql('DROP TABLE da');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
