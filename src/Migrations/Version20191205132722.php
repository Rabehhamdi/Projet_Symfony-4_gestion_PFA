<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191205132722 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categorieoffre (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE offreentreprise ADD categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offreentreprise ADD CONSTRAINT FK_1C0DF382BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorieoffre (id)');
        $this->addSql('CREATE INDEX IDX_1C0DF382BCF5E72D ON offreentreprise (categorie_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE offreentreprise DROP FOREIGN KEY FK_1C0DF382BCF5E72D');
        $this->addSql('DROP TABLE categorieoffre');
        $this->addSql('DROP INDEX IDX_1C0DF382BCF5E72D ON offreentreprise');
        $this->addSql('ALTER TABLE offreentreprise DROP categorie_id');
    }
}
