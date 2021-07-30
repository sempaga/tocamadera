<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210729180907 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE subcategoria (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, imagen VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categoria DROP FOREIGN KEY FK_4E10122D3397707A');
        $this->addSql('DROP INDEX IDX_4E10122D3397707A ON categoria');
        $this->addSql('ALTER TABLE categoria CHANGE categoria_id subcategoria_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categoria ADD CONSTRAINT FK_4E10122D88D3B71A FOREIGN KEY (subcategoria_id) REFERENCES subcategoria (id)');
        $this->addSql('CREATE INDEX IDX_4E10122D88D3B71A ON categoria (subcategoria_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categoria DROP FOREIGN KEY FK_4E10122D88D3B71A');
        $this->addSql('DROP TABLE subcategoria');
        $this->addSql('DROP INDEX IDX_4E10122D88D3B71A ON categoria');
        $this->addSql('ALTER TABLE categoria CHANGE subcategoria_id categoria_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categoria ADD CONSTRAINT FK_4E10122D3397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('CREATE INDEX IDX_4E10122D3397707A ON categoria (categoria_id)');
    }
}
