<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190421155704 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE old_purchase');
        $this->addSql('ALTER TABLE purchase ADD payment_method VARCHAR(10) DEFAULT NULL, ADD payment_method_id VARCHAR(16) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE old_purchase (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, name VARCHAR(1024) NOT NULL COLLATE utf8mb4_unicode_ci, email VARCHAR(1024) NOT NULL COLLATE utf8mb4_unicode_ci, phone VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, size VARCHAR(14) NOT NULL COLLATE utf8mb4_unicode_ci, created_at DATETIME NOT NULL, uid INT NOT NULL, address VARCHAR(1024) NOT NULL COLLATE utf8mb4_unicode_ci, city VARCHAR(1024) NOT NULL COLLATE utf8mb4_unicode_ci, zipcode VARCHAR(1024) NOT NULL COLLATE utf8mb4_unicode_ci, province VARCHAR(1024) NOT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_6117D13B4584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE old_purchase ADD CONSTRAINT FK_6117D13B4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE purchase DROP payment_method, DROP payment_method_id');
    }
}
