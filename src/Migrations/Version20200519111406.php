<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200519111406 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE betaal (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, soort VARCHAR(255) NOT NULL, rek_credit_nr VARCHAR(255) NOT NULL, betaaldate DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE extras (id INT AUTO_INCREMENT NOT NULL, omschrijving VARCHAR(255) NOT NULL, meerprijs DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, kamer_id_id INT NOT NULL, imagefile VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C53D045F2C391598 (kamer_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kamer (id INT AUTO_INCREMENT NOT NULL, soort_id_id INT NOT NULL, room_nr INT NOT NULL, price DOUBLE PRECISION NOT NULL, description VARCHAR(500) NOT NULL, name VARCHAR(255) NOT NULL, bed INT NOT NULL, INDEX IDX_4DD4F6A61D9D252B (soort_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seizoen (id INT AUTO_INCREMENT NOT NULL, omschrijving VARCHAR(500) NOT NULL, begindatum DATE NOT NULL, einddatum DATE NOT NULL, korting INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE soort (id INT AUTO_INCREMENT NOT NULL, omschrijving VARCHAR(255) NOT NULL, meerprijs DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F2C391598 FOREIGN KEY (kamer_id_id) REFERENCES kamer (id)');
        $this->addSql('ALTER TABLE kamer ADD CONSTRAINT FK_4DD4F6A61D9D252B FOREIGN KEY (soort_id_id) REFERENCES soort (id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE username username VARCHAR(255) DEFAULT NULL, CHANGE enabled enabled DOUBLE PRECISION DEFAULT NULL, CHANGE insertion_name insertion_name VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F2C391598');
        $this->addSql('ALTER TABLE kamer DROP FOREIGN KEY FK_4DD4F6A61D9D252B');
        $this->addSql('DROP TABLE betaal');
        $this->addSql('DROP TABLE extras');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE kamer');
        $this->addSql('DROP TABLE seizoen');
        $this->addSql('DROP TABLE soort');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE username username VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE enabled enabled DOUBLE PRECISION DEFAULT \'NULL\', CHANGE insertion_name insertion_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
