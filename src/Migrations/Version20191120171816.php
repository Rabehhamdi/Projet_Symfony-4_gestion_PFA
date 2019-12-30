<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191120171816 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE competence ADD etudiant_id INT NOT NULL');
        $this->addSql('ALTER TABLE competence ADD CONSTRAINT FK_94D4687FDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('CREATE INDEX IDX_94D4687FDDEAB1A3 ON competence (etudiant_id)');
        $this->addSql('ALTER TABLE experianceprofessionnelle ADD etudiant_id INT NOT NULL');
        $this->addSql('ALTER TABLE experianceprofessionnelle ADD CONSTRAINT FK_F5AC5D61DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('CREATE INDEX IDX_F5AC5D61DDEAB1A3 ON experianceprofessionnelle (etudiant_id)');
        $this->addSql('ALTER TABLE formation ADD etudiant_id INT NOT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('CREATE INDEX IDX_404021BFDDEAB1A3 ON formation (etudiant_id)');
        $this->addSql('ALTER TABLE langue ADD etudiant_id INT NOT NULL');
        $this->addSql('ALTER TABLE langue ADD CONSTRAINT FK_9357758EDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('CREATE INDEX IDX_9357758EDDEAB1A3 ON langue (etudiant_id)');
        $this->addSql('ALTER TABLE projet ADD etudiant_id INT NOT NULL');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('CREATE INDEX IDX_50159CA9DDEAB1A3 ON projet (etudiant_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE competence DROP FOREIGN KEY FK_94D4687FDDEAB1A3');
        $this->addSql('DROP INDEX IDX_94D4687FDDEAB1A3 ON competence');
        $this->addSql('ALTER TABLE competence DROP etudiant_id');
        $this->addSql('ALTER TABLE experianceprofessionnelle DROP FOREIGN KEY FK_F5AC5D61DDEAB1A3');
        $this->addSql('DROP INDEX IDX_F5AC5D61DDEAB1A3 ON experianceprofessionnelle');
        $this->addSql('ALTER TABLE experianceprofessionnelle DROP etudiant_id');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFDDEAB1A3');
        $this->addSql('DROP INDEX IDX_404021BFDDEAB1A3 ON formation');
        $this->addSql('ALTER TABLE formation DROP etudiant_id');
        $this->addSql('ALTER TABLE langue DROP FOREIGN KEY FK_9357758EDDEAB1A3');
        $this->addSql('DROP INDEX IDX_9357758EDDEAB1A3 ON langue');
        $this->addSql('ALTER TABLE langue DROP etudiant_id');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9DDEAB1A3');
        $this->addSql('DROP INDEX IDX_50159CA9DDEAB1A3 ON projet');
        $this->addSql('ALTER TABLE projet DROP etudiant_id');
    }
}
