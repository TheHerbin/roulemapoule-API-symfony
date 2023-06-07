<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230606123216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE authentification ADD id_utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE authentification ADD CONSTRAINT FK_9DE7CD62C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9DE7CD62C6EE5C49 ON authentification (id_utilisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE authentification DROP FOREIGN KEY FK_9DE7CD62C6EE5C49');
        $this->addSql('DROP INDEX UNIQ_9DE7CD62C6EE5C49 ON authentification');
        $this->addSql('ALTER TABLE authentification DROP id_utilisateur_id');
    }
}
