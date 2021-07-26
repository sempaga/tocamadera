<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210723184930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE factura ADD pedido_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE factura ADD CONSTRAINT FK_F9EBA0094854653A FOREIGN KEY (pedido_id) REFERENCES pedido (id)');
        $this->addSql('CREATE INDEX IDX_F9EBA0094854653A ON factura (pedido_id)');
        $this->addSql('ALTER TABLE pedido DROP FOREIGN KEY FK_C4EC16CEF04F795F');
        $this->addSql('DROP INDEX IDX_C4EC16CEF04F795F ON pedido');
        $this->addSql('ALTER TABLE pedido DROP factura_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE factura DROP FOREIGN KEY FK_F9EBA0094854653A');
        $this->addSql('DROP INDEX IDX_F9EBA0094854653A ON factura');
        $this->addSql('ALTER TABLE factura DROP pedido_id');
        $this->addSql('ALTER TABLE pedido ADD factura_id INT NOT NULL');
        $this->addSql('ALTER TABLE pedido ADD CONSTRAINT FK_C4EC16CEF04F795F FOREIGN KEY (factura_id) REFERENCES factura (id)');
        $this->addSql('CREATE INDEX IDX_C4EC16CEF04F795F ON pedido (factura_id)');
    }
}
