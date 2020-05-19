<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200519123945 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE reservering (id INT AUTO_INCREMENT NOT NULL, kamer_id INT NOT NULL, user_id INT NOT NULL, checkin_date DATETIME NOT NULL, checkout_date DATETIME NOT NULL, betaalid VARCHAR(255) DEFAULT NULL, betaal_methode VARCHAR(255) DEFAULT NULL, INDEX IDX_F2E439AC78ECB459 (kamer_id), INDEX IDX_F2E439ACA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservering ADD CONSTRAINT FK_F2E439AC78ECB459 FOREIGN KEY (kamer_id) REFERENCES kamer (id)');
        $this->addSql('ALTER TABLE reservering ADD CONSTRAINT FK_F2E439ACA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE username username VARCHAR(255) DEFAULT NULL, CHANGE enabled enabled DOUBLE PRECISION DEFAULT NULL, CHANGE insertion_name insertion_name VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE reservering');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE username username VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE enabled enabled DOUBLE PRECISION DEFAULT \'NULL\', CHANGE insertion_name insertion_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
