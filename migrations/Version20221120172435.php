<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221120172435 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE soldProperty (id VARCHAR(255) NOT NULL, street VARCHAR(60) NOT NULL, housenumber INT DEFAULT NULL, housenumber_add VARCHAR(20) DEFAULT NULL, zipcode VARCHAR(10) DEFAULT NULL, city VARCHAR(60) DEFAULT NULL, municipality VARCHAR(40) DEFAULT NULL, type_of_property VARCHAR(30) DEFAULT NULL, ask_price INT NOT NULL, amount_of_rooms INT DEFAULT NULL, living_area INT DEFAULT NULL, plot_size INT DEFAULT NULL, status TINYINT(1) NOT NULL, date_sold DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE soldProperty');
    }
}
