<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230301111805 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE delegue ADD secteur_id INT NOT NULL');
        $this->addSql('ALTER TABLE delegue ADD CONSTRAINT FK_C89E71DD9F7E4405 FOREIGN KEY (secteur_id) REFERENCES secteur (id)');
        $this->addSql('CREATE INDEX IDX_C89E71DD9F7E4405 ON delegue (secteur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE delegue DROP FOREIGN KEY FK_C89E71DD9F7E4405');
        $this->addSql('DROP INDEX IDX_C89E71DD9F7E4405 ON delegue');
        $this->addSql('ALTER TABLE delegue DROP secteur_id');
    }
}
