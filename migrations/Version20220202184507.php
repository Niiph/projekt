<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220202184507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE breeder (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, original_name VARCHAR(255) DEFAULT NULL, shortcut VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `group` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plant (id INT AUTO_INCREMENT NOT NULL, breeder_id_id INT DEFAULT NULL, group_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, original_name VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, image_path VARCHAR(255) DEFAULT NULL, chimera TINYINT(1) NOT NULL, INDEX IDX_AB030D72192AAFAF (breeder_id_id), INDEX IDX_AB030D722F68B530 (group_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE plant ADD CONSTRAINT FK_AB030D72192AAFAF FOREIGN KEY (breeder_id_id) REFERENCES breeder (id)');
        $this->addSql('ALTER TABLE plant ADD CONSTRAINT FK_AB030D722F68B530 FOREIGN KEY (group_id_id) REFERENCES `group` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plant DROP FOREIGN KEY FK_AB030D72192AAFAF');
        $this->addSql('ALTER TABLE plant DROP FOREIGN KEY FK_AB030D722F68B530');
        $this->addSql('DROP TABLE breeder');
        $this->addSql('DROP TABLE `group`');
        $this->addSql('DROP TABLE plant');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
