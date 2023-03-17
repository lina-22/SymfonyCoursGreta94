<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230227092227 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE delegue ADD nom VARCHAR(30) NOT NULL, ADD prenom VARCHAR(30) NOT NULL, ADD adresse VARCHAR(255) NOT NULL, ADD cp VARCHAR(30) NOT NULL, ADD ville VARCHAR(255) NOT NULL, ADD tel VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE secteur ADD delegue_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE secteur ADD CONSTRAINT FK_8045251FC283956F FOREIGN KEY (delegue_id) REFERENCES delegue (id)');
        $this->addSql('CREATE INDEX IDX_8045251FC283956F ON secteur (delegue_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE delegue DROP nom, DROP prenom, DROP adresse, DROP cp, DROP ville, DROP tel');
        $this->addSql('ALTER TABLE secteur DROP FOREIGN KEY FK_8045251FC283956F');
        $this->addSql('DROP INDEX IDX_8045251FC283956F ON secteur');
        $this->addSql('ALTER TABLE secteur DROP delegue_id');
    }
}
