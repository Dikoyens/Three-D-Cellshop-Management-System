<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251010133450 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE delivery (id INT AUTO_INCREMENT NOT NULL, customer_name VARCHAR(255) NOT NULL, status VARCHAR(100) NOT NULL, delivery_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, quantity INT NOT NULL, price NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repair_record (id INT AUTO_INCREMENT NOT NULL, dashboard_id INT NOT NULL, part_used_id INT DEFAULT NULL, customer_name VARCHAR(255) NOT NULL, mobile_number VARCHAR(11) NOT NULL, repair_details LONGTEXT NOT NULL, down_payment NUMERIC(10, 2) NOT NULL, INDEX IDX_44F4AF96B9D04D2B (dashboard_id), INDEX IDX_44F4AF9652402CDD (part_used_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE repair_record ADD CONSTRAINT FK_44F4AF96B9D04D2B FOREIGN KEY (dashboard_id) REFERENCES dashboard (id)');
        $this->addSql('ALTER TABLE repair_record ADD CONSTRAINT FK_44F4AF9652402CDD FOREIGN KEY (part_used_id) REFERENCES part (id)');
        $this->addSql('ALTER TABLE dashboard DROP FOREIGN KEY FK_5C94FFF8B9D04D2B');
        $this->addSql('DROP INDEX IDX_5C94FFF8B9D04D2B ON dashboard');
        $this->addSql('ALTER TABLE dashboard CHANGE dashboard_id repair_record_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE dashboard ADD CONSTRAINT FK_5C94FFF8C909715 FOREIGN KEY (repair_record_id) REFERENCES repair_record (id)');
        $this->addSql('CREATE INDEX IDX_5C94FFF8C909715 ON dashboard (repair_record_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dashboard DROP FOREIGN KEY FK_5C94FFF8C909715');
        $this->addSql('ALTER TABLE repair_record DROP FOREIGN KEY FK_44F4AF96B9D04D2B');
        $this->addSql('ALTER TABLE repair_record DROP FOREIGN KEY FK_44F4AF9652402CDD');
        $this->addSql('DROP TABLE delivery');
        $this->addSql('DROP TABLE part');
        $this->addSql('DROP TABLE repair_record');
        $this->addSql('DROP INDEX IDX_5C94FFF8C909715 ON dashboard');
        $this->addSql('ALTER TABLE dashboard CHANGE repair_record_id dashboard_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE dashboard ADD CONSTRAINT FK_5C94FFF8B9D04D2B FOREIGN KEY (dashboard_id) REFERENCES dashboard (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_5C94FFF8B9D04D2B ON dashboard (dashboard_id)');
    }
}
