<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200819085319 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activity_sejour (activity_id INT NOT NULL, sejour_id INT NOT NULL, INDEX IDX_C483C02881C06096 (activity_id), INDEX IDX_C483C02884CF0CF (sejour_id), PRIMARY KEY(activity_id, sejour_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE destination_sejour (destination_id INT NOT NULL, sejour_id INT NOT NULL, INDEX IDX_C4CCBFBF816C6140 (destination_id), INDEX IDX_C4CCBFBF84CF0CF (sejour_id), PRIMARY KEY(destination_id, sejour_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activity_sejour ADD CONSTRAINT FK_C483C02881C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activity_sejour ADD CONSTRAINT FK_C483C02884CF0CF FOREIGN KEY (sejour_id) REFERENCES sejour (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE destination_sejour ADD CONSTRAINT FK_C4CCBFBF816C6140 FOREIGN KEY (destination_id) REFERENCES destination (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE destination_sejour ADD CONSTRAINT FK_C4CCBFBF84CF0CF FOREIGN KEY (sejour_id) REFERENCES sejour (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sejour ADD category_id INT DEFAULT NULL, DROP activite1, DROP activite2, DROP activite3');
        $this->addSql('ALTER TABLE sejour ADD CONSTRAINT FK_96F5202812469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_96F5202812469DE2 ON sejour (category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activity_sejour DROP FOREIGN KEY FK_C483C02881C06096');
        $this->addSql('ALTER TABLE sejour DROP FOREIGN KEY FK_96F5202812469DE2');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE activity_sejour');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE destination_sejour');
        $this->addSql('DROP INDEX IDX_96F5202812469DE2 ON sejour');
        $this->addSql('ALTER TABLE sejour ADD activite1 VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD activite2 VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD activite3 VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP category_id');
    }
}
