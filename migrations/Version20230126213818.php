<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230126213818 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contenu_panier (id INT AUTO_INCREMENT NOT NULL, panier_id INT DEFAULT NULL, quantité INT NOT NULL, date DATETIME DEFAULT NULL, INDEX IDX_80507DC0F77D927C (panier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contenu_panier ADD CONSTRAINT FK_80507DC0F77D927C FOREIGN KEY (panier_id) REFERENCES panier (id)');
        $this->addSql('ALTER TABLE produit ADD contenu_panier_id INT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2761405BF FOREIGN KEY (contenu_panier_id) REFERENCES contenu_panier (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC2761405BF ON produit (contenu_panier_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2761405BF');
        $this->addSql('ALTER TABLE contenu_panier DROP FOREIGN KEY FK_80507DC0F77D927C');
        $this->addSql('DROP TABLE contenu_panier');
        $this->addSql('DROP INDEX IDX_29A5EC2761405BF ON produit');
        $this->addSql('ALTER TABLE produit DROP contenu_panier_id');
    }
}
