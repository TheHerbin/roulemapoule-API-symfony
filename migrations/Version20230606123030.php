<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230606123030 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur ADD id_authentification_id INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B32BC298F0 FOREIGN KEY (id_authentification_id) REFERENCES authentification (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B32BC298F0 ON utilisateur (id_authentification_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B32BC298F0');
        $this->addSql('DROP INDEX UNIQ_1D1C63B32BC298F0 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP id_authentification_id');
    }
}
