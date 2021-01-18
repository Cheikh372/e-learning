<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210117161529 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE support (id INT AUTO_INCREMENT NOT NULL, enseignant_id INT NOT NULL, matiere_id INT NOT NULL, type_support VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, nomfichier VARCHAR(255) NOT NULL, INDEX IDX_8004EBA5E455FCC0 (enseignant_id), INDEX IDX_8004EBA5F46CD258 (matiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE support ADD CONSTRAINT FK_8004EBA5E455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id)');
        $this->addSql('ALTER TABLE support ADD CONSTRAINT FK_8004EBA5F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY FK_9014574A8C6DC281');
        $this->addSql('DROP INDEX IDX_9014574A8C6DC281 ON matiere');
        $this->addSql('ALTER TABLE matiere CHANGE ref_ue id_ue_id INT NOT NULL');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574A8C6DC281 FOREIGN KEY (id_ue_id) REFERENCES unite_enseignement (id)');
        $this->addSql('CREATE INDEX IDX_9014574A8C6DC281 ON matiere (id_ue_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE support');
        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY FK_9014574A8C6DC281');
        $this->addSql('DROP INDEX IDX_9014574A8C6DC281 ON matiere');
        $this->addSql('ALTER TABLE matiere CHANGE id_ue_id ref_ue INT NOT NULL');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574A8C6DC281 FOREIGN KEY (ref_ue) REFERENCES unite_enseignement (id)');
        $this->addSql('CREATE INDEX IDX_9014574A8C6DC281 ON matiere (ref_ue)');
    }
}
