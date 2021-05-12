<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210512090732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE doc (id INT AUTO_INCREMENT NOT NULL, parcours_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, path VARCHAR(255) DEFAULT NULL, INDEX IDX_8641FD646E38C0DB (parcours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE doc ADD CONSTRAINT FK_8641FD646E38C0DB FOREIGN KEY (parcours_id) REFERENCES parcours (id)');
        $this->addSql('ALTER TABLE documents ADD doc_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE documents ADD CONSTRAINT FK_A2B07288895648BC FOREIGN KEY (doc_id) REFERENCES doc (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A2B07288895648BC ON documents (doc_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE documents DROP FOREIGN KEY FK_A2B07288895648BC');
        $this->addSql('DROP TABLE doc');
        $this->addSql('DROP INDEX UNIQ_A2B07288895648BC ON documents');
        $this->addSql('ALTER TABLE documents DROP doc_id');
    }
}
