<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191120154243 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE offreentreprise (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE responsableentreprise ADD offres_entreprise_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE responsableentreprise ADD CONSTRAINT FK_BDC30A6B7D5DD6B8 FOREIGN KEY (offres_entreprise_id) REFERENCES offreentreprise (id)');
        $this->addSql('CREATE INDEX IDX_BDC30A6B7D5DD6B8 ON responsableentreprise (offres_entreprise_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE responsableentreprise DROP FOREIGN KEY FK_BDC30A6B7D5DD6B8');
        $this->addSql('DROP TABLE offreentreprise');
        $this->addSql('DROP INDEX IDX_BDC30A6B7D5DD6B8 ON responsableentreprise');
        $this->addSql('ALTER TABLE responsableentreprise DROP offres_entreprise_id');
    }
}
