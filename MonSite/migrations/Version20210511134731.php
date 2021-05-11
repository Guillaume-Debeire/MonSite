<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210511134731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_parcours (skill_id INT NOT NULL, parcours_id INT NOT NULL, INDEX IDX_DB19B3115585C142 (skill_id), INDEX IDX_DB19B3116E38C0DB (parcours_id), PRIMARY KEY(skill_id, parcours_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_exercice (skill_id INT NOT NULL, exercice_id INT NOT NULL, INDEX IDX_A6B0AABF5585C142 (skill_id), INDEX IDX_A6B0AABF89D40298 (exercice_id), PRIMARY KEY(skill_id, exercice_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_application (skill_id INT NOT NULL, application_id INT NOT NULL, INDEX IDX_1A45440D5585C142 (skill_id), INDEX IDX_1A45440D3E030ACD (application_id), PRIMARY KEY(skill_id, application_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_audiovisuel (skill_id INT NOT NULL, audiovisuel_id INT NOT NULL, INDEX IDX_D91194885585C142 (skill_id), INDEX IDX_D911948834C38397 (audiovisuel_id), PRIMARY KEY(skill_id, audiovisuel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE skill_parcours ADD CONSTRAINT FK_DB19B3115585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_parcours ADD CONSTRAINT FK_DB19B3116E38C0DB FOREIGN KEY (parcours_id) REFERENCES parcours (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_exercice ADD CONSTRAINT FK_A6B0AABF5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_exercice ADD CONSTRAINT FK_A6B0AABF89D40298 FOREIGN KEY (exercice_id) REFERENCES exercice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_application ADD CONSTRAINT FK_1A45440D5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_application ADD CONSTRAINT FK_1A45440D3E030ACD FOREIGN KEY (application_id) REFERENCES application (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_audiovisuel ADD CONSTRAINT FK_D91194885585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_audiovisuel ADD CONSTRAINT FK_D911948834C38397 FOREIGN KEY (audiovisuel_id) REFERENCES audiovisuel (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skill_parcours DROP FOREIGN KEY FK_DB19B3115585C142');
        $this->addSql('ALTER TABLE skill_exercice DROP FOREIGN KEY FK_A6B0AABF5585C142');
        $this->addSql('ALTER TABLE skill_application DROP FOREIGN KEY FK_1A45440D5585C142');
        $this->addSql('ALTER TABLE skill_audiovisuel DROP FOREIGN KEY FK_D91194885585C142');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE skill_parcours');
        $this->addSql('DROP TABLE skill_exercice');
        $this->addSql('DROP TABLE skill_application');
        $this->addSql('DROP TABLE skill_audiovisuel');
    }
}
