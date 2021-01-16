<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210116145054 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE enseignant (id INT AUTO_INCREMENT NOT NULL, matricule VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, grade VARCHAR(255) NOT NULL, specialite VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enseignant_matiere (enseignant_id INT NOT NULL, matiere_id INT NOT NULL, INDEX IDX_33D1A024E455FCC0 (enseignant_id), INDEX IDX_33D1A024F46CD258 (matiere_id), PRIMARY KEY(enseignant_id, matiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, matricule VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, lieu_naissance VARCHAR(255) NOT NULL, cin VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, code_ue_id INT NOT NULL, id_matiere VARCHAR(255) NOT NULL, lebelle VARCHAR(255) NOT NULL, coefficient INT NOT NULL, volhtd INT NOT NULL, libelle VARCHAR(255) NOT NULL, volhtp INT NOT NULL, volhcours INT NOT NULL, INDEX IDX_9014574A8EBD9AFD (code_ue_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, id_parcours_id INT NOT NULL, id_option VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_5A8600B0762A0D2C (id_parcours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parcours (id INT AUTO_INCREMENT NOT NULL, id_parcours VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle (id INT AUTO_INCREMENT NOT NULL, id_salle VARCHAR(255) NOT NULL, lebelle VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, capacite INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unite_enseignement (id INT AUTO_INCREMENT NOT NULL, code_ue VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, coefficient INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE enseignant_matiere ADD CONSTRAINT FK_33D1A024E455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enseignant_matiere ADD CONSTRAINT FK_33D1A024F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574A8EBD9AFD FOREIGN KEY (code_ue_id) REFERENCES unite_enseignement (id)');
        $this->addSql('ALTER TABLE `option` ADD CONSTRAINT FK_5A8600B0762A0D2C FOREIGN KEY (id_parcours_id) REFERENCES parcours (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE enseignant_matiere DROP FOREIGN KEY FK_33D1A024E455FCC0');
        $this->addSql('ALTER TABLE enseignant_matiere DROP FOREIGN KEY FK_33D1A024F46CD258');
        $this->addSql('ALTER TABLE `option` DROP FOREIGN KEY FK_5A8600B0762A0D2C');
        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY FK_9014574A8EBD9AFD');
        $this->addSql('DROP TABLE enseignant');
        $this->addSql('DROP TABLE enseignant_matiere');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP TABLE `option`');
        $this->addSql('DROP TABLE parcours');
        $this->addSql('DROP TABLE salle');
        $this->addSql('DROP TABLE unite_enseignement');
    }
}
