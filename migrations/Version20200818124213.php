<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200818124213 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE destination (id INT AUTO_INCREMENT NOT NULL, lieu VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, date_ouverture DATE DEFAULT NULL, nb_star INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sejour (id INT AUTO_INCREMENT NOT NULL, type_logement VARCHAR(255) NOT NULL, nb_personne INT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, activite1 VARCHAR(255) NOT NULL, activite2 VARCHAR(255) NOT NULL, activite3 VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE destination');
        $this->addSql('DROP TABLE sejour');
    }
}
