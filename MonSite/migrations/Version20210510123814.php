<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210510123814 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE production ADD exercice_id INT DEFAULT NULL, ADD parcours_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE production ADD CONSTRAINT FK_D3EDB1E089D40298 FOREIGN KEY (exercice_id) REFERENCES exercice (id)');
        $this->addSql('ALTER TABLE production ADD CONSTRAINT FK_D3EDB1E06E38C0DB FOREIGN KEY (parcours_id) REFERENCES parcours (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D3EDB1E089D40298 ON production (exercice_id)');
        $this->addSql('CREATE INDEX IDX_D3EDB1E06E38C0DB ON production (parcours_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE production DROP FOREIGN KEY FK_D3EDB1E089D40298');
        $this->addSql('ALTER TABLE production DROP FOREIGN KEY FK_D3EDB1E06E38C0DB');
        $this->addSql('DROP INDEX UNIQ_D3EDB1E089D40298 ON production');
        $this->addSql('DROP INDEX IDX_D3EDB1E06E38C0DB ON production');
        $this->addSql('ALTER TABLE production DROP exercice_id, DROP parcours_id');
    }
}
