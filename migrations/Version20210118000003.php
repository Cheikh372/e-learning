<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210118000003 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE depot_travaux (id INT AUTO_INCREMENT NOT NULL, enseignant_id INT DEFAULT NULL, matiere_id INT NOT NULL, description VARCHAR(255) NOT NULL, date_creation DATETIME NOT NULL, dateline DATETIME NOT NULL, fichier VARCHAR(255) DEFAULT NULL, INDEX IDX_7F00BF0AE455FCC0 (enseignant_id), INDEX IDX_7F00BF0AF46CD258 (matiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE depot_travaux ADD CONSTRAINT FK_7F00BF0AE455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id)');
        $this->addSql('ALTER TABLE depot_travaux ADD CONSTRAINT FK_7F00BF0AF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE depot_travaux');
    }
}
