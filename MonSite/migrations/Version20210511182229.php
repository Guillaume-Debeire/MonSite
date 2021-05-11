<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210511182229 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE software_application (software_id INT NOT NULL, application_id INT NOT NULL, INDEX IDX_F9127E76D7452741 (software_id), INDEX IDX_F9127E763E030ACD (application_id), PRIMARY KEY(software_id, application_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE software_application ADD CONSTRAINT FK_F9127E76D7452741 FOREIGN KEY (software_id) REFERENCES software (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE software_application ADD CONSTRAINT FK_F9127E763E030ACD FOREIGN KEY (application_id) REFERENCES application (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE software_application');
    }
}
