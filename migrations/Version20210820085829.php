<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210820085829 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cliente_user (cliente_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_D63A1E2EDE734E51 (cliente_id), INDEX IDX_D63A1E2EA76ED395 (user_id), PRIMARY KEY(cliente_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cliente_user ADD CONSTRAINT FK_D63A1E2EDE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cliente_user ADD CONSTRAINT FK_D63A1E2EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cliente_user');
    }
}
