<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230302201423 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comedien (id_comedien INT AUTO_INCREMENT NOT NULL, image_name VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, age INT DEFAULT NULL, sexe VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, taux_journalier INT DEFAULT NULL, updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id_comedien)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrat_comedien (id_contrat_comedien INT AUTO_INCREMENT NOT NULL, id_comedien INT DEFAULT NULL, id_da INT DEFAULT NULL, id_contrat_da INT DEFAULT NULL, creation_contrat DATE DEFAULT NULL, date_debut DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, production VARCHAR(255) DEFAULT NULL, titre VARCHAR(255) DEFAULT NULL, role_comedien VARCHAR(255) DEFAULT NULL, INDEX IDX_5B0DF998B2190F57 (id_comedien), INDEX IDX_5B0DF998BA801495 (id_da), INDEX IDX_5B0DF998786D0C0A (id_contrat_da), PRIMARY KEY(id_contrat_comedien)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrat_da (id_contrat_da INT AUTO_INCREMENT NOT NULL, id_da INT DEFAULT NULL, id_production INT DEFAULT NULL, creation_contrat DATE DEFAULT NULL, date_debut DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, titre VARCHAR(255) DEFAULT NULL, nbre_role INT DEFAULT NULL, INDEX IDX_DDE78CDDBA801495 (id_da), INDEX IDX_DDE78CDD76673137 (id_production), PRIMARY KEY(id_contrat_da)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE da (id_da INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, avatar VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id_da)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE production (id_production INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, avatar VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id_production)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contrat_comedien ADD CONSTRAINT FK_5B0DF998B2190F57 FOREIGN KEY (id_comedien) REFERENCES comedien (id_comedien)');
        $this->addSql('ALTER TABLE contrat_comedien ADD CONSTRAINT FK_5B0DF998BA801495 FOREIGN KEY (id_da) REFERENCES da (id_da)');
        $this->addSql('ALTER TABLE contrat_comedien ADD CONSTRAINT FK_5B0DF998786D0C0A FOREIGN KEY (id_contrat_da) REFERENCES contrat_da (id_contrat_da)');
        $this->addSql('ALTER TABLE contrat_da ADD CONSTRAINT FK_DDE78CDDBA801495 FOREIGN KEY (id_da) REFERENCES da (id_da)');
        $this->addSql('ALTER TABLE contrat_da ADD CONSTRAINT FK_DDE78CDD76673137 FOREIGN KEY (id_production) REFERENCES production (id_production)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat_comedien DROP FOREIGN KEY FK_5B0DF998B2190F57');
        $this->addSql('ALTER TABLE contrat_comedien DROP FOREIGN KEY FK_5B0DF998BA801495');
        $this->addSql('ALTER TABLE contrat_comedien DROP FOREIGN KEY FK_5B0DF998786D0C0A');
        $this->addSql('ALTER TABLE contrat_da DROP FOREIGN KEY FK_DDE78CDDBA801495');
        $this->addSql('ALTER TABLE contrat_da DROP FOREIGN KEY FK_DDE78CDD76673137');
        $this->addSql('DROP TABLE comedien');
        $this->addSql('DROP TABLE contrat_comedien');
        $this->addSql('DROP TABLE contrat_da');
        $this->addSql('DROP TABLE da');
        $this->addSql('DROP TABLE production');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
