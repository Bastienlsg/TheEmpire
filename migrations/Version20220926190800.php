<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220926190800 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnage ADD personnage_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486DE953B492 FOREIGN KEY (personnage_type_id) REFERENCES type (id)');
        $this->addSql('CREATE INDEX IDX_6AEA486DE953B492 ON personnage (personnage_type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486DE953B492');
        $this->addSql('DROP INDEX IDX_6AEA486DE953B492 ON personnage');
        $this->addSql('ALTER TABLE personnage DROP personnage_type_id');
    }
}
