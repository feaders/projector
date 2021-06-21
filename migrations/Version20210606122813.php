<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210606122813 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE budget (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE budget_participant (budget_id INT NOT NULL, participant_id INT NOT NULL, INDEX IDX_A1952D4E36ABA6B8 (budget_id), INDEX IDX_A1952D4E9D1C3019 (participant_id), PRIMARY KEY(budget_id, participant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participant_projet (participant_id INT NOT NULL, projet_id INT NOT NULL, INDEX IDX_E26922289D1C3019 (participant_id), INDEX IDX_E2692228C18272 (projet_id), PRIMARY KEY(participant_id, projet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, date_crea DATE NOT NULL, date_rappel DATE DEFAULT NULL, date_fin_prev DATE DEFAULT NULL, date_fin_reele DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_projet (id INT AUTO_INCREMENT NOT NULL, projets_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_73C2F791597A6CB7 (projets_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE budget_participant ADD CONSTRAINT FK_A1952D4E36ABA6B8 FOREIGN KEY (budget_id) REFERENCES budget (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE budget_participant ADD CONSTRAINT FK_A1952D4E9D1C3019 FOREIGN KEY (participant_id) REFERENCES participant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE participant_projet ADD CONSTRAINT FK_E26922289D1C3019 FOREIGN KEY (participant_id) REFERENCES participant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE participant_projet ADD CONSTRAINT FK_E2692228C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE type_projet ADD CONSTRAINT FK_73C2F791597A6CB7 FOREIGN KEY (projets_id) REFERENCES projet (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE budget_participant DROP FOREIGN KEY FK_A1952D4E36ABA6B8');
        $this->addSql('ALTER TABLE budget_participant DROP FOREIGN KEY FK_A1952D4E9D1C3019');
        $this->addSql('ALTER TABLE participant_projet DROP FOREIGN KEY FK_E26922289D1C3019');
        $this->addSql('ALTER TABLE participant_projet DROP FOREIGN KEY FK_E2692228C18272');
        $this->addSql('ALTER TABLE type_projet DROP FOREIGN KEY FK_73C2F791597A6CB7');
        $this->addSql('DROP TABLE budget');
        $this->addSql('DROP TABLE budget_participant');
        $this->addSql('DROP TABLE participant');
        $this->addSql('DROP TABLE participant_projet');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE type_projet');
    }
}
