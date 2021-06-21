<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210606134621 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet ADD type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9C54C8C93 FOREIGN KEY (type_id) REFERENCES type_projet (id)');
        $this->addSql('CREATE INDEX IDX_50159CA9C54C8C93 ON projet (type_id)');
        $this->addSql('ALTER TABLE type_projet DROP FOREIGN KEY FK_73C2F791597A6CB7');
        $this->addSql('DROP INDEX IDX_73C2F791597A6CB7 ON type_projet');
        $this->addSql('ALTER TABLE type_projet DROP projets_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9C54C8C93');
        $this->addSql('DROP INDEX IDX_50159CA9C54C8C93 ON projet');
        $this->addSql('ALTER TABLE projet DROP type_id');
        $this->addSql('ALTER TABLE type_projet ADD projets_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE type_projet ADD CONSTRAINT FK_73C2F791597A6CB7 FOREIGN KEY (projets_id) REFERENCES projet (id)');
        $this->addSql('CREATE INDEX IDX_73C2F791597A6CB7 ON type_projet (projets_id)');
    }
}
