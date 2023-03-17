<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230217151729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE region_visiteur (region_id INT NOT NULL, visiteur_id INT NOT NULL, INDEX IDX_3D62834A98260155 (region_id), INDEX IDX_3D62834A7F72333D (visiteur_id), PRIMARY KEY(region_id, visiteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE region_visiteur ADD CONSTRAINT FK_3D62834A98260155 FOREIGN KEY (region_id) REFERENCES region (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE region_visiteur ADD CONSTRAINT FK_3D62834A7F72333D FOREIGN KEY (visiteur_id) REFERENCES visiteur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE region_visiteur DROP FOREIGN KEY FK_3D62834A98260155');
        $this->addSql('ALTER TABLE region_visiteur DROP FOREIGN KEY FK_3D62834A7F72333D');
        $this->addSql('DROP TABLE region_visiteur');
    }
}
