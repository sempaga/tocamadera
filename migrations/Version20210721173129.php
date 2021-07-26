<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210721173129 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cliente (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, apellido VARCHAR(255) NOT NULL, telefono INT NOT NULL, ciudad VARCHAR(255) NOT NULL, calle VARCHAR(255) NOT NULL, cp INT NOT NULL, npiso INT NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entrega (id INT AUTO_INCREMENT NOT NULL, fecha_entrega DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE factura (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modo_pago (id INT AUTO_INCREMENT NOT NULL, cliente_id INT NOT NULL, ncuenta VARCHAR(255) NOT NULL, ntarjeta INT NOT NULL, INDEX IDX_AB6DCD0BDE734E51 (cliente_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pedido (id INT AUTO_INCREMENT NOT NULL, cliente_id INT NOT NULL, factura_id INT NOT NULL, cantidad INT NOT NULL, preciototal NUMERIC(5, 2) NOT NULL, fecha_solicitud DATETIME NOT NULL, INDEX IDX_C4EC16CEDE734E51 (cliente_id), INDEX IDX_C4EC16CEF04F795F (factura_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pedido_productos (pedido_id INT NOT NULL, productos_id INT NOT NULL, INDEX IDX_6E69BFA44854653A (pedido_id), INDEX IDX_6E69BFA4ED07566B (productos_id), PRIMARY KEY(pedido_id, productos_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE productos (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, stock INT NOT NULL, dimensiones VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, precio NUMERIC(5, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proveedor (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, telefono INT NOT NULL, email VARCHAR(255) NOT NULL, ciudad VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proveedor_productos (proveedor_id INT NOT NULL, productos_id INT NOT NULL, INDEX IDX_C48DC296CB305D73 (proveedor_id), INDEX IDX_C48DC296ED07566B (productos_id), PRIMARY KEY(proveedor_id, productos_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE modo_pago ADD CONSTRAINT FK_AB6DCD0BDE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE pedido ADD CONSTRAINT FK_C4EC16CEDE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE pedido ADD CONSTRAINT FK_C4EC16CEF04F795F FOREIGN KEY (factura_id) REFERENCES factura (id)');
        $this->addSql('ALTER TABLE pedido_productos ADD CONSTRAINT FK_6E69BFA44854653A FOREIGN KEY (pedido_id) REFERENCES pedido (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pedido_productos ADD CONSTRAINT FK_6E69BFA4ED07566B FOREIGN KEY (productos_id) REFERENCES productos (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proveedor_productos ADD CONSTRAINT FK_C48DC296CB305D73 FOREIGN KEY (proveedor_id) REFERENCES proveedor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proveedor_productos ADD CONSTRAINT FK_C48DC296ED07566B FOREIGN KEY (productos_id) REFERENCES productos (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE modo_pago DROP FOREIGN KEY FK_AB6DCD0BDE734E51');
        $this->addSql('ALTER TABLE pedido DROP FOREIGN KEY FK_C4EC16CEDE734E51');
        $this->addSql('ALTER TABLE pedido DROP FOREIGN KEY FK_C4EC16CEF04F795F');
        $this->addSql('ALTER TABLE pedido_productos DROP FOREIGN KEY FK_6E69BFA44854653A');
        $this->addSql('ALTER TABLE pedido_productos DROP FOREIGN KEY FK_6E69BFA4ED07566B');
        $this->addSql('ALTER TABLE proveedor_productos DROP FOREIGN KEY FK_C48DC296ED07566B');
        $this->addSql('ALTER TABLE proveedor_productos DROP FOREIGN KEY FK_C48DC296CB305D73');
        $this->addSql('DROP TABLE cliente');
        $this->addSql('DROP TABLE entrega');
        $this->addSql('DROP TABLE factura');
        $this->addSql('DROP TABLE modo_pago');
        $this->addSql('DROP TABLE pedido');
        $this->addSql('DROP TABLE pedido_productos');
        $this->addSql('DROP TABLE productos');
        $this->addSql('DROP TABLE proveedor');
        $this->addSql('DROP TABLE proveedor_productos');
    }
}
