<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927090428 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE operation_rechargement (id INT AUTO_INCREMENT NOT NULL, id_contrat_id INT DEFAULT NULL, date_heure_debut DATETIME NOT NULL, date_heure_fin DATETIME NOT NULL, nmkw_heures DOUBLE PRECISION NOT NULL, INDEX IDX_AE04855CBDA986C8 (id_contrat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE supporter (id INT AUTO_INCREMENT NOT NULL, id_modelbatterie_id INT DEFAULT NULL, INDEX IDX_3F06E55AF0F9371 (id_modelbatterie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_charge (id INT AUTO_INCREMENT NOT NULL, libelle_type_chargeur VARCHAR(255) NOT NULL, puissance_type_charge VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE operation_rechargement ADD CONSTRAINT FK_AE04855CBDA986C8 FOREIGN KEY (id_contrat_id) REFERENCES contrat (id)');
        $this->addSql('ALTER TABLE supporter ADD CONSTRAINT FK_3F06E55AF0F9371 FOREIGN KEY (id_modelbatterie_id) REFERENCES model_batterie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operation_rechargement DROP FOREIGN KEY FK_AE04855CBDA986C8');
        $this->addSql('ALTER TABLE supporter DROP FOREIGN KEY FK_3F06E55AF0F9371');
        $this->addSql('DROP TABLE operation_rechargement');
        $this->addSql('DROP TABLE supporter');
        $this->addSql('DROP TABLE type_charge');
    }
}
