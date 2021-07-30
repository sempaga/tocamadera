<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210729181148 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE subcategoria ADD categoria_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE subcategoria ADD CONSTRAINT FK_DA7FB9143397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('CREATE INDEX IDX_DA7FB9143397707A ON subcategoria (categoria_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE subcategoria DROP FOREIGN KEY FK_DA7FB9143397707A');
        $this->addSql('DROP INDEX IDX_DA7FB9143397707A ON subcategoria');
        $this->addSql('ALTER TABLE subcategoria DROP categoria_id');
    }
}
