<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230606124314 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire ADD id_trajet_id INT NOT NULL, ADD id_utilisateur_id INT NOT NULL, ADD id_reservation_id INT NOT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC8D271404 FOREIGN KEY (id_trajet_id) REFERENCES trajet (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC85542AE1 FOREIGN KEY (id_reservation_id) REFERENCES reservation (id)');
        $this->addSql('CREATE INDEX IDX_67F068BC8D271404 ON commentaire (id_trajet_id)');
        $this->addSql('CREATE INDEX IDX_67F068BCC6EE5C49 ON commentaire (id_utilisateur_id)');
        $this->addSql('CREATE INDEX IDX_67F068BC85542AE1 ON commentaire (id_reservation_id)');
        $this->addSql('ALTER TABLE reservation ADD id_trajet_id INT NOT NULL, ADD id_utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849558D271404 FOREIGN KEY (id_trajet_id) REFERENCES trajet (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_42C849558D271404 ON reservation (id_trajet_id)');
        $this->addSql('CREATE INDEX IDX_42C84955C6EE5C49 ON reservation (id_utilisateur_id)');
        $this->addSql('ALTER TABLE trajet ADD id_conducteur_id INT NOT NULL');
        $this->addSql('ALTER TABLE trajet ADD CONSTRAINT FK_2B5BA98C4F479BA3 FOREIGN KEY (id_conducteur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_2B5BA98C4F479BA3 ON trajet (id_conducteur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC8D271404');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCC6EE5C49');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC85542AE1');
        $this->addSql('DROP INDEX IDX_67F068BC8D271404 ON commentaire');
        $this->addSql('DROP INDEX IDX_67F068BCC6EE5C49 ON commentaire');
        $this->addSql('DROP INDEX IDX_67F068BC85542AE1 ON commentaire');
        $this->addSql('ALTER TABLE commentaire DROP id_trajet_id, DROP id_utilisateur_id, DROP id_reservation_id');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849558D271404');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955C6EE5C49');
        $this->addSql('DROP INDEX IDX_42C849558D271404 ON reservation');
        $this->addSql('DROP INDEX IDX_42C84955C6EE5C49 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP id_trajet_id, DROP id_utilisateur_id');
        $this->addSql('ALTER TABLE trajet DROP FOREIGN KEY FK_2B5BA98C4F479BA3');
        $this->addSql('DROP INDEX IDX_2B5BA98C4F479BA3 ON trajet');
        $this->addSql('ALTER TABLE trajet DROP id_conducteur_id');
    }
}
