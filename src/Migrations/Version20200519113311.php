<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200519113311 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F2C391598');
        $this->addSql('DROP INDEX UNIQ_C53D045F2C391598 ON image');
        $this->addSql('ALTER TABLE image CHANGE kamer_id_id kamer_id INT NOT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F78ECB459 FOREIGN KEY (kamer_id) REFERENCES kamer (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C53D045F78ECB459 ON image (kamer_id)');
        $this->addSql('ALTER TABLE kamer DROP FOREIGN KEY FK_4DD4F6A61D9D252B');
        $this->addSql('DROP INDEX IDX_4DD4F6A61D9D252B ON kamer');
        $this->addSql('ALTER TABLE kamer CHANGE soort_id_id soort_id INT NOT NULL');
        $this->addSql('ALTER TABLE kamer ADD CONSTRAINT FK_4DD4F6A63DEE50DF FOREIGN KEY (soort_id) REFERENCES soort (id)');
        $this->addSql('CREATE INDEX IDX_4DD4F6A63DEE50DF ON kamer (soort_id)');
        $this->addSql('ALTER TABLE soort ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE username username VARCHAR(255) DEFAULT NULL, CHANGE enabled enabled DOUBLE PRECISION DEFAULT NULL, CHANGE insertion_name insertion_name VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F78ECB459');
        $this->addSql('DROP INDEX UNIQ_C53D045F78ECB459 ON image');
        $this->addSql('ALTER TABLE image CHANGE kamer_id kamer_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F2C391598 FOREIGN KEY (kamer_id_id) REFERENCES kamer (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C53D045F2C391598 ON image (kamer_id_id)');
        $this->addSql('ALTER TABLE kamer DROP FOREIGN KEY FK_4DD4F6A63DEE50DF');
        $this->addSql('DROP INDEX IDX_4DD4F6A63DEE50DF ON kamer');
        $this->addSql('ALTER TABLE kamer CHANGE soort_id soort_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE kamer ADD CONSTRAINT FK_4DD4F6A61D9D252B FOREIGN KEY (soort_id_id) REFERENCES soort (id)');
        $this->addSql('CREATE INDEX IDX_4DD4F6A61D9D252B ON kamer (soort_id_id)');
        $this->addSql('ALTER TABLE soort DROP name');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE username username VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE enabled enabled DOUBLE PRECISION DEFAULT \'NULL\', CHANGE insertion_name insertion_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
