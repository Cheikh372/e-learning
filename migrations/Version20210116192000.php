<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210116192000 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE absence (id INT AUTO_INCREMENT NOT NULL, id_etudiant_id INT DEFAULT NULL, id_seance_id INT DEFAULT NULL, absence TINYINT(1) NOT NULL, INDEX IDX_765AE0C9C5F87C54 (id_etudiant_id), INDEX IDX_765AE0C9634CC6B3 (id_seance_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, id_parcours_id INT DEFAULT NULL, id_option_id INT DEFAULT NULL, annee VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, niveau VARCHAR(255) NOT NULL, INDEX IDX_8F87BF96762A0D2C (id_parcours_id), INDEX IDX_8F87BF9627F1A148 (id_option_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE depot_traveaux (id INT AUTO_INCREMENT NOT NULL, id_enseignant_id INT DEFAULT NULL, id_matiere_id INT DEFAULT NULL, id_depot VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, INDEX IDX_4D951D945A7D2DA5 (id_enseignant_id), INDEX IDX_4D951D9451E6528F (id_matiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE discussion (id INT AUTO_INCREMENT NOT NULL, id_enseignant_id INT DEFAULT NULL, id_matiere_id INT DEFAULT NULL, id_message VARCHAR(255) NOT NULL, objet VARCHAR(255) NOT NULL, text LONGTEXT NOT NULL, date DATE NOT NULL, INDEX IDX_C0B9F90F5A7D2DA5 (id_enseignant_id), INDEX IDX_C0B9F90F51E6528F (id_matiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emploi (id INT AUTO_INCREMENT NOT NULL, id_seance_id INT DEFAULT NULL, id_emploi VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, INDEX IDX_74A0B0FA634CC6B3 (id_seance_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enseignant (id INT AUTO_INCREMENT NOT NULL, matricule VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, grade VARCHAR(255) NOT NULL, specialite VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enseignant_matiere (enseignant_id INT NOT NULL, matiere_id INT NOT NULL, INDEX IDX_33D1A024E455FCC0 (enseignant_id), INDEX IDX_33D1A024F46CD258 (matiere_id), PRIMARY KEY(enseignant_id, matiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, classe_id INT DEFAULT NULL, matricule VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, lieu_naissance VARCHAR(255) NOT NULL, cin VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, INDEX IDX_717E22E38F5EA509 (classe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, id_etudiant_id INT DEFAULT NULL, id_matiere_id INT DEFAULT NULL, semestre INT NOT NULL, date_inscription DATE NOT NULL, groupe INT DEFAULT NULL, INDEX IDX_5E90F6D6C5F87C54 (id_etudiant_id), INDEX IDX_5E90F6D651E6528F (id_matiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, code_ue_id INT NOT NULL, id_matiere VARCHAR(255) NOT NULL, lebelle VARCHAR(255) NOT NULL, coefficient INT NOT NULL, volhtd INT NOT NULL, libelle VARCHAR(255) NOT NULL, volhtp INT NOT NULL, volhcours INT NOT NULL, INDEX IDX_9014574A8EBD9AFD (code_ue_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, id_etudiant_id INT DEFAULT NULL, id_matiere_id INT DEFAULT NULL, type_note VARCHAR(255) NOT NULL, annee DATE NOT NULL, note DOUBLE PRECISION DEFAULT NULL, INDEX IDX_CFBDFA14C5F87C54 (id_etudiant_id), INDEX IDX_CFBDFA1451E6528F (id_matiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, id_parcours_id INT NOT NULL, id_option VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_5A8600B0762A0D2C (id_parcours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parcours (id INT AUTO_INCREMENT NOT NULL, id_parcours VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle (id INT AUTO_INCREMENT NOT NULL, id_salle VARCHAR(255) NOT NULL, lebelle VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, capacite INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seance (id INT AUTO_INCREMENT NOT NULL, id_matiere_id INT DEFAULT NULL, id_enseignant_id INT DEFAULT NULL, id_salle_id INT DEFAULT NULL, id_seance VARCHAR(255) NOT NULL, type_seance VARCHAR(255) NOT NULL, jour DATE NOT NULL, heure_debut TIME NOT NULL, heure_fin TIME NOT NULL, INDEX IDX_DF7DFD0E51E6528F (id_matiere_id), INDEX IDX_DF7DFD0E5A7D2DA5 (id_enseignant_id), INDEX IDX_DF7DFD0E8CEBACA0 (id_salle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE support_cours (id INT AUTO_INCREMENT NOT NULL, id_enseignant_id INT DEFAULT NULL, id_matiere_id INT DEFAULT NULL, id_support VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, nom_fichier VARCHAR(255) NOT NULL, INDEX IDX_F709A445A7D2DA5 (id_enseignant_id), INDEX IDX_F709A4451E6528F (id_matiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE traveaux_rendu (id INT AUTO_INCREMENT NOT NULL, id_depot_id INT DEFAULT NULL, id_etudiant_id INT DEFAULT NULL, nom_fichier VARCHAR(255) NOT NULL, date_rendu DATE NOT NULL, INDEX IDX_BD4AC6CD5CB384B (id_depot_id), INDEX IDX_BD4AC6CC5F87C54 (id_etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unite_enseignement (id INT AUTO_INCREMENT NOT NULL, code_ue VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, coefficient INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, id_user VARCHAR(25) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE absence ADD CONSTRAINT FK_765AE0C9C5F87C54 FOREIGN KEY (id_etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE absence ADD CONSTRAINT FK_765AE0C9634CC6B3 FOREIGN KEY (id_seance_id) REFERENCES seance (id)');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF96762A0D2C FOREIGN KEY (id_parcours_id) REFERENCES parcours (id)');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF9627F1A148 FOREIGN KEY (id_option_id) REFERENCES `option` (id)');
        $this->addSql('ALTER TABLE depot_traveaux ADD CONSTRAINT FK_4D951D945A7D2DA5 FOREIGN KEY (id_enseignant_id) REFERENCES enseignant (id)');
        $this->addSql('ALTER TABLE depot_traveaux ADD CONSTRAINT FK_4D951D9451E6528F FOREIGN KEY (id_matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE discussion ADD CONSTRAINT FK_C0B9F90F5A7D2DA5 FOREIGN KEY (id_enseignant_id) REFERENCES enseignant (id)');
        $this->addSql('ALTER TABLE discussion ADD CONSTRAINT FK_C0B9F90F51E6528F FOREIGN KEY (id_matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE emploi ADD CONSTRAINT FK_74A0B0FA634CC6B3 FOREIGN KEY (id_seance_id) REFERENCES seance (id)');
        $this->addSql('ALTER TABLE enseignant_matiere ADD CONSTRAINT FK_33D1A024E455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enseignant_matiere ADD CONSTRAINT FK_33D1A024F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E38F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6C5F87C54 FOREIGN KEY (id_etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D651E6528F FOREIGN KEY (id_matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574A8EBD9AFD FOREIGN KEY (code_ue_id) REFERENCES unite_enseignement (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14C5F87C54 FOREIGN KEY (id_etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA1451E6528F FOREIGN KEY (id_matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE `option` ADD CONSTRAINT FK_5A8600B0762A0D2C FOREIGN KEY (id_parcours_id) REFERENCES parcours (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E51E6528F FOREIGN KEY (id_matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E5A7D2DA5 FOREIGN KEY (id_enseignant_id) REFERENCES enseignant (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E8CEBACA0 FOREIGN KEY (id_salle_id) REFERENCES salle (id)');
        $this->addSql('ALTER TABLE support_cours ADD CONSTRAINT FK_F709A445A7D2DA5 FOREIGN KEY (id_enseignant_id) REFERENCES enseignant (id)');
        $this->addSql('ALTER TABLE support_cours ADD CONSTRAINT FK_F709A4451E6528F FOREIGN KEY (id_matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE traveaux_rendu ADD CONSTRAINT FK_BD4AC6CD5CB384B FOREIGN KEY (id_depot_id) REFERENCES depot_traveaux (id)');
        $this->addSql('ALTER TABLE traveaux_rendu ADD CONSTRAINT FK_BD4AC6CC5F87C54 FOREIGN KEY (id_etudiant_id) REFERENCES etudiant (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E38F5EA509');
        $this->addSql('ALTER TABLE traveaux_rendu DROP FOREIGN KEY FK_BD4AC6CD5CB384B');
        $this->addSql('ALTER TABLE depot_traveaux DROP FOREIGN KEY FK_4D951D945A7D2DA5');
        $this->addSql('ALTER TABLE discussion DROP FOREIGN KEY FK_C0B9F90F5A7D2DA5');
        $this->addSql('ALTER TABLE enseignant_matiere DROP FOREIGN KEY FK_33D1A024E455FCC0');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E5A7D2DA5');
        $this->addSql('ALTER TABLE support_cours DROP FOREIGN KEY FK_F709A445A7D2DA5');
        $this->addSql('ALTER TABLE absence DROP FOREIGN KEY FK_765AE0C9C5F87C54');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6C5F87C54');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14C5F87C54');
        $this->addSql('ALTER TABLE traveaux_rendu DROP FOREIGN KEY FK_BD4AC6CC5F87C54');
        $this->addSql('ALTER TABLE depot_traveaux DROP FOREIGN KEY FK_4D951D9451E6528F');
        $this->addSql('ALTER TABLE discussion DROP FOREIGN KEY FK_C0B9F90F51E6528F');
        $this->addSql('ALTER TABLE enseignant_matiere DROP FOREIGN KEY FK_33D1A024F46CD258');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D651E6528F');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA1451E6528F');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E51E6528F');
        $this->addSql('ALTER TABLE support_cours DROP FOREIGN KEY FK_F709A4451E6528F');
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY FK_8F87BF9627F1A148');
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY FK_8F87BF96762A0D2C');
        $this->addSql('ALTER TABLE `option` DROP FOREIGN KEY FK_5A8600B0762A0D2C');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E8CEBACA0');
        $this->addSql('ALTER TABLE absence DROP FOREIGN KEY FK_765AE0C9634CC6B3');
        $this->addSql('ALTER TABLE emploi DROP FOREIGN KEY FK_74A0B0FA634CC6B3');
        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY FK_9014574A8EBD9AFD');
        $this->addSql('DROP TABLE absence');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE depot_traveaux');
        $this->addSql('DROP TABLE discussion');
        $this->addSql('DROP TABLE emploi');
        $this->addSql('DROP TABLE enseignant');
        $this->addSql('DROP TABLE enseignant_matiere');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE `option`');
        $this->addSql('DROP TABLE parcours');
        $this->addSql('DROP TABLE salle');
        $this->addSql('DROP TABLE seance');
        $this->addSql('DROP TABLE support_cours');
        $this->addSql('DROP TABLE traveaux_rendu');
        $this->addSql('DROP TABLE unite_enseignement');
        $this->addSql('DROP TABLE user');
    }
}
