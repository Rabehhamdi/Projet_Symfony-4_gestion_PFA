<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191120161607 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE offreentreprise ADD responsable_id INT NOT NULL');
        $this->addSql('ALTER TABLE offreentreprise ADD CONSTRAINT FK_1C0DF38253C59D72 FOREIGN KEY (responsable_id) REFERENCES responsableentreprise (id)');
        $this->addSql('CREATE INDEX IDX_1C0DF38253C59D72 ON offreentreprise (responsable_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE offreentreprise DROP FOREIGN KEY FK_1C0DF38253C59D72');
        $this->addSql('DROP INDEX IDX_1C0DF38253C59D72 ON offreentreprise');
        $this->addSql('ALTER TABLE offreentreprise DROP responsable_id');
    }
}
