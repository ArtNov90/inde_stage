<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231023140337 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donateur ADD adresse VARCHAR(255) NOT NULL, ADD parrainage_enfant_ou_familles TINYINT(1) NOT NULL, ADD peut_se_rendre_en_inde TINYINT(1) NOT NULL, ADD motivation LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donateur DROP adresse, DROP parrainage_enfant_ou_familles, DROP peut_se_rendre_en_inde, DROP motivation');
    }
}
