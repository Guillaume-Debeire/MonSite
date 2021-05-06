<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210506183309 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE software (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE software_parcours (software_id INT NOT NULL, parcours_id INT NOT NULL, INDEX IDX_6EE5D228D7452741 (software_id), INDEX IDX_6EE5D2286E38C0DB (parcours_id), PRIMARY KEY(software_id, parcours_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE software_production (software_id INT NOT NULL, production_id INT NOT NULL, INDEX IDX_F255041AD7452741 (software_id), INDEX IDX_F255041AECC6147F (production_id), PRIMARY KEY(software_id, production_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE software_parcours ADD CONSTRAINT FK_6EE5D228D7452741 FOREIGN KEY (software_id) REFERENCES software (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE software_parcours ADD CONSTRAINT FK_6EE5D2286E38C0DB FOREIGN KEY (parcours_id) REFERENCES parcours (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE software_production ADD CONSTRAINT FK_F255041AD7452741 FOREIGN KEY (software_id) REFERENCES software (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE software_production ADD CONSTRAINT FK_F255041AECC6147F FOREIGN KEY (production_id) REFERENCES production (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parcours DROP software');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE software_parcours DROP FOREIGN KEY FK_6EE5D228D7452741');
        $this->addSql('ALTER TABLE software_production DROP FOREIGN KEY FK_F255041AD7452741');
        $this->addSql('DROP TABLE software');
        $this->addSql('DROP TABLE software_parcours');
        $this->addSql('DROP TABLE software_production');
        $this->addSql('ALTER TABLE parcours ADD software VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
