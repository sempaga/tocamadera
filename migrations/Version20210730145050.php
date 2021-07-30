<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210730145050 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE productos DROP FOREIGN KEY FK_767490E63397707A');
        $this->addSql('DROP INDEX IDX_767490E63397707A ON productos');
        $this->addSql('ALTER TABLE productos ADD subcategoria_id INT DEFAULT NULL, DROP categoria_id');
        $this->addSql('ALTER TABLE productos ADD CONSTRAINT FK_767490E688D3B71A FOREIGN KEY (subcategoria_id) REFERENCES subcategoria (id)');
        $this->addSql('CREATE INDEX IDX_767490E688D3B71A ON productos (subcategoria_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE productos DROP FOREIGN KEY FK_767490E688D3B71A');
        $this->addSql('DROP INDEX IDX_767490E688D3B71A ON productos');
        $this->addSql('ALTER TABLE productos ADD categoria_id INT NOT NULL, DROP subcategoria_id');
        $this->addSql('ALTER TABLE productos ADD CONSTRAINT FK_767490E63397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('CREATE INDEX IDX_767490E63397707A ON productos (categoria_id)');
    }
}
