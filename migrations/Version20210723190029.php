<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210723190029 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cliente DROP FOREIGN KEY FK_F41C9B254854653A');
        $this->addSql('DROP INDEX IDX_F41C9B254854653A ON cliente');
        $this->addSql('ALTER TABLE cliente DROP pedido_id');
        $this->addSql('ALTER TABLE pedido ADD cliente_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pedido ADD CONSTRAINT FK_C4EC16CEDE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id)');
        $this->addSql('CREATE INDEX IDX_C4EC16CEDE734E51 ON pedido (cliente_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cliente ADD pedido_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cliente ADD CONSTRAINT FK_F41C9B254854653A FOREIGN KEY (pedido_id) REFERENCES pedido (id)');
        $this->addSql('CREATE INDEX IDX_F41C9B254854653A ON cliente (pedido_id)');
        $this->addSql('ALTER TABLE pedido DROP FOREIGN KEY FK_C4EC16CEDE734E51');
        $this->addSql('DROP INDEX IDX_C4EC16CEDE734E51 ON pedido');
        $this->addSql('ALTER TABLE pedido DROP cliente_id');
    }
}
