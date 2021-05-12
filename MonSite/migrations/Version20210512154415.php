<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210512154415 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE application ADD url VARCHAR(255) DEFAULT NULL, ADD repo_url VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE doc ADD application_id INT DEFAULT NULL, ADD exercice_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE doc ADD CONSTRAINT FK_8641FD643E030ACD FOREIGN KEY (application_id) REFERENCES application (id)');
        $this->addSql('ALTER TABLE doc ADD CONSTRAINT FK_8641FD6489D40298 FOREIGN KEY (exercice_id) REFERENCES exercice (id)');
        $this->addSql('CREATE INDEX IDX_8641FD643E030ACD ON doc (application_id)');
        $this->addSql('CREATE INDEX IDX_8641FD6489D40298 ON doc (exercice_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE application DROP url, DROP repo_url');
        $this->addSql('ALTER TABLE doc DROP FOREIGN KEY FK_8641FD643E030ACD');
        $this->addSql('ALTER TABLE doc DROP FOREIGN KEY FK_8641FD6489D40298');
        $this->addSql('DROP INDEX IDX_8641FD643E030ACD ON doc');
        $this->addSql('DROP INDEX IDX_8641FD6489D40298 ON doc');
        $this->addSql('ALTER TABLE doc DROP application_id, DROP exercice_id');
    }
}
