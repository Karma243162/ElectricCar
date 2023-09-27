<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927091118 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE born (id INT AUTO_INCREMENT NOT NULL, code_type_charge_id INT DEFAULT NULL, id_station_id INT DEFAULT NULL, date_mise_en_service DATETIME NOT NULL, date_dernier_revision DATETIME NOT NULL, INDEX IDX_44E33BA2AAD7CFFE (code_type_charge_id), INDEX IDX_44E33BA2843732E2 (id_station_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE station (id INT AUTO_INCREMENT NOT NULL, latitude VARCHAR(255) NOT NULL, longitude VARCHAR(255) NOT NULL, adresse_rue VARCHAR(255) NOT NULL, adresseville VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE born ADD CONSTRAINT FK_44E33BA2AAD7CFFE FOREIGN KEY (code_type_charge_id) REFERENCES type_charge (id)');
        $this->addSql('ALTER TABLE born ADD CONSTRAINT FK_44E33BA2843732E2 FOREIGN KEY (id_station_id) REFERENCES station (id)');
        $this->addSql('ALTER TABLE supporter ADD code_type_charge_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE supporter ADD CONSTRAINT FK_3F06E55AAD7CFFE FOREIGN KEY (code_type_charge_id) REFERENCES type_charge (id)');
        $this->addSql('CREATE INDEX IDX_3F06E55AAD7CFFE ON supporter (code_type_charge_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE born DROP FOREIGN KEY FK_44E33BA2AAD7CFFE');
        $this->addSql('ALTER TABLE born DROP FOREIGN KEY FK_44E33BA2843732E2');
        $this->addSql('DROP TABLE born');
        $this->addSql('DROP TABLE station');
        $this->addSql('ALTER TABLE supporter DROP FOREIGN KEY FK_3F06E55AAD7CFFE');
        $this->addSql('DROP INDEX IDX_3F06E55AAD7CFFE ON supporter');
        $this->addSql('ALTER TABLE supporter DROP code_type_charge_id');
    }
}
