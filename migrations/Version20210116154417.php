<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210116154417 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, id_parcours_id INT DEFAULT NULL, id_option_id INT DEFAULT NULL, annee VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, niveau VARCHAR(255) NOT NULL, INDEX IDX_8F87BF96762A0D2C (id_parcours_id), INDEX IDX_8F87BF9627F1A148 (id_option_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seance (id INT AUTO_INCREMENT NOT NULL, id_matiere_id INT DEFAULT NULL, id_enseignant_id INT DEFAULT NULL, id_salle_id INT DEFAULT NULL, id_seance VARCHAR(255) NOT NULL, type_seance VARCHAR(255) NOT NULL, jour DATE NOT NULL, heure_debut TIME NOT NULL, heure_fin TIME NOT NULL, INDEX IDX_DF7DFD0E51E6528F (id_matiere_id), INDEX IDX_DF7DFD0E5A7D2DA5 (id_enseignant_id), INDEX IDX_DF7DFD0E8CEBACA0 (id_salle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF96762A0D2C FOREIGN KEY (id_parcours_id) REFERENCES parcours (id)');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF9627F1A148 FOREIGN KEY (id_option_id) REFERENCES `option` (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E51E6528F FOREIGN KEY (id_matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E5A7D2DA5 FOREIGN KEY (id_enseignant_id) REFERENCES enseignant (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E8CEBACA0 FOREIGN KEY (id_salle_id) REFERENCES salle (id)');
        $this->addSql('ALTER TABLE etudiant ADD classe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E38F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('CREATE INDEX IDX_717E22E38F5EA509 ON etudiant (classe_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E38F5EA509');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE seance');
        $this->addSql('DROP INDEX IDX_717E22E38F5EA509 ON etudiant');
        $this->addSql('ALTER TABLE etudiant DROP classe_id');
    }
}
