<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230217154638 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rapport_visite_medicament (id INT AUTO_INCREMENT NOT NULL, rapport_visite_id INT NOT NULL, medicament_id INT NOT NULL, nombre INT NOT NULL, INDEX IDX_DD2399DC2A7FEB5 (rapport_visite_id), INDEX IDX_DD2399DAB0D61F7 (medicament_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rapport_visite_medicament ADD CONSTRAINT FK_DD2399DC2A7FEB5 FOREIGN KEY (rapport_visite_id) REFERENCES rapport_visite (id)');
        $this->addSql('ALTER TABLE rapport_visite_medicament ADD CONSTRAINT FK_DD2399DAB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rapport_visite_medicament DROP FOREIGN KEY FK_DD2399DC2A7FEB5');
        $this->addSql('ALTER TABLE rapport_visite_medicament DROP FOREIGN KEY FK_DD2399DAB0D61F7');
        $this->addSql('DROP TABLE rapport_visite_medicament');
    }
}
