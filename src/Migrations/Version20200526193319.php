<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200526193319 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE actus ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE actus ADD CONSTRAINT FK_835F9CB4FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_835F9CB4FB88E14F ON actus (utilisateur_id)');
        $this->addSql('ALTER TABLE bilan ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bilan ADD CONSTRAINT FK_F4DF4F44FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_F4DF4F44FB88E14F ON bilan (utilisateur_id)');
        $this->addSql('ALTER TABLE menu ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_7D053A93FB88E14F ON menu (utilisateur_id)');
        $this->addSql('ALTER TABLE profil ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B297FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_E6D6B297FB88E14F ON profil (utilisateur_id)');
        $this->addSql('ALTER TABLE question ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_B6F7494EFB88E14F ON question (utilisateur_id)');
        $this->addSql('ALTER TABLE reponse ADD utilisateur_id INT DEFAULT NULL, ADD question_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC71E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('CREATE INDEX IDX_5FB6DEC7FB88E14F ON reponse (utilisateur_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5FB6DEC71E27F6BF ON reponse (question_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE actus DROP FOREIGN KEY FK_835F9CB4FB88E14F');
        $this->addSql('DROP INDEX IDX_835F9CB4FB88E14F ON actus');
        $this->addSql('ALTER TABLE actus DROP utilisateur_id');
        $this->addSql('ALTER TABLE bilan DROP FOREIGN KEY FK_F4DF4F44FB88E14F');
        $this->addSql('DROP INDEX IDX_F4DF4F44FB88E14F ON bilan');
        $this->addSql('ALTER TABLE bilan DROP utilisateur_id');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93FB88E14F');
        $this->addSql('DROP INDEX IDX_7D053A93FB88E14F ON menu');
        $this->addSql('ALTER TABLE menu DROP utilisateur_id');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B297FB88E14F');
        $this->addSql('DROP INDEX IDX_E6D6B297FB88E14F ON profil');
        $this->addSql('ALTER TABLE profil DROP utilisateur_id');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494EFB88E14F');
        $this->addSql('DROP INDEX IDX_B6F7494EFB88E14F ON question');
        $this->addSql('ALTER TABLE question DROP utilisateur_id');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7FB88E14F');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC71E27F6BF');
        $this->addSql('DROP INDEX IDX_5FB6DEC7FB88E14F ON reponse');
        $this->addSql('DROP INDEX UNIQ_5FB6DEC71E27F6BF ON reponse');
        $this->addSql('ALTER TABLE reponse DROP utilisateur_id, DROP question_id');
    }
}
