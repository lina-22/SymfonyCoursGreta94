<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230217143714 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rapport_visite ADD visiteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rapport_visite ADD CONSTRAINT FK_D1D741717F72333D FOREIGN KEY (visiteur_id) REFERENCES visiteur (id)');
        $this->addSql('CREATE INDEX IDX_D1D741717F72333D ON rapport_visite (visiteur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rapport_visite DROP FOREIGN KEY FK_D1D741717F72333D');
        $this->addSql('DROP INDEX IDX_D1D741717F72333D ON rapport_visite');
        $this->addSql('ALTER TABLE rapport_visite DROP visiteur_id');
    }
}
