<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210728185806 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entrega ADD pedido_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entrega ADD CONSTRAINT FK_E56D596B4854653A FOREIGN KEY (pedido_id) REFERENCES pedido (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E56D596B4854653A ON entrega (pedido_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entrega DROP FOREIGN KEY FK_E56D596B4854653A');
        $this->addSql('DROP INDEX UNIQ_E56D596B4854653A ON entrega');
        $this->addSql('ALTER TABLE entrega DROP pedido_id');
    }
}
