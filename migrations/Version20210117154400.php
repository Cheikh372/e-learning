<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210117154400 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE unite_enseignement (id INT AUTO_INCREMENT NOT NULL, suffixe VARCHAR(10) DEFAULT NULL, libelle VARCHAR(255) NOT NULL, coefficient INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE matiere ADD ref_ue INT NOT NULL');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574A8C6DC281 FOREIGN KEY (ref_ue) REFERENCES unite_enseignement (id)');
        $this->addSql('CREATE INDEX IDX_9014574A8C6DC281 ON matiere (ref_ue)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY FK_9014574A8C6DC281');
        $this->addSql('DROP TABLE unite_enseignement');
        $this->addSql('DROP INDEX IDX_9014574A8C6DC281 ON matiere');
        $this->addSql('ALTER TABLE matiere DROP ref_ue');
    }
}
