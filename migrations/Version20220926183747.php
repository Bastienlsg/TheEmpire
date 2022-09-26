<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220926183747 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE personnage_competence (personnage_id INT NOT NULL, competence_id INT NOT NULL, INDEX IDX_F81B36A5E315342 (personnage_id), INDEX IDX_F81B36A15761DAB (competence_id), PRIMARY KEY(personnage_id, competence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personnage_competence ADD CONSTRAINT FK_F81B36A5E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_competence ADD CONSTRAINT FK_F81B36A15761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnage_competence DROP FOREIGN KEY FK_F81B36A5E315342');
        $this->addSql('ALTER TABLE personnage_competence DROP FOREIGN KEY FK_F81B36A15761DAB');
        $this->addSql('DROP TABLE personnage_competence');
    }
}
