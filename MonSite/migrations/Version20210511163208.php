<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210511163208 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE picture ADD application_id INT DEFAULT NULL, ADD exercice_id INT DEFAULT NULL, ADD name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F893E030ACD FOREIGN KEY (application_id) REFERENCES application (id)');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F8989D40298 FOREIGN KEY (exercice_id) REFERENCES exercice (id)');
        $this->addSql('CREATE INDEX IDX_16DB4F893E030ACD ON picture (application_id)');
        $this->addSql('CREATE INDEX IDX_16DB4F8989D40298 ON picture (exercice_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F893E030ACD');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F8989D40298');
        $this->addSql('DROP INDEX IDX_16DB4F893E030ACD ON picture');
        $this->addSql('DROP INDEX IDX_16DB4F8989D40298 ON picture');
        $this->addSql('ALTER TABLE picture DROP application_id, DROP exercice_id, DROP name');
    }
}
