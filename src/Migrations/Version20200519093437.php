<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200519093437 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user ADD username VARCHAR(255) DEFAULT NULL, ADD enabled DOUBLE PRECISION DEFAULT NULL, ADD tel_nr INT NOT NULL, ADD mobile_nr INT NOT NULL, ADD first_name VARCHAR(255) NOT NULL, ADD insertion_name VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, ADD adress VARCHAR(255) NOT NULL, ADD zip VARCHAR(255) NOT NULL, ADD city VARCHAR(255) NOT NULL, ADD country VARCHAR(255) NOT NULL, CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP username, DROP enabled, DROP tel_nr, DROP mobile_nr, DROP first_name, DROP insertion_name, DROP last_name, DROP adress, DROP zip, DROP city, DROP country, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
