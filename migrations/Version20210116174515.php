<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210116174515 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE traveaux_rendu (id INT AUTO_INCREMENT NOT NULL, id_depot_id INT DEFAULT NULL, id_etudiant_id INT DEFAULT NULL, nom_fichier VARCHAR(255) NOT NULL, date_rendu DATE NOT NULL, INDEX IDX_BD4AC6CD5CB384B (id_depot_id), INDEX IDX_BD4AC6CC5F87C54 (id_etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE traveaux_rendu ADD CONSTRAINT FK_BD4AC6CD5CB384B FOREIGN KEY (id_depot_id) REFERENCES depot_traveaux (id)');
        $this->addSql('ALTER TABLE traveaux_rendu ADD CONSTRAINT FK_BD4AC6CC5F87C54 FOREIGN KEY (id_etudiant_id) REFERENCES etudiant (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE traveaux_rendu');
    }
}
