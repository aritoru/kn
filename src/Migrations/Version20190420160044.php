<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190420160044 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tour_date ADD city VARCHAR(40) DEFAULT NULL, CHANGE title title VARCHAR(255) NOT NULL, CHANGE description description VARCHAR(2255) DEFAULT NULL, CHANGE place_link place_link VARCHAR(255) DEFAULT NULL, CHANGE pre_price pre_price VARCHAR(10) DEFAULT NULL, CHANGE price price VARCHAR(10) NOT NULL, CHANGE poster poster VARCHAR(40) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tour_date DROP city, CHANGE title title VARCHAR(2255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE description description VARCHAR(2255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE place_link place_link VARCHAR(2255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE pre_price pre_price VARCHAR(2255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE price price VARCHAR(2255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE poster poster VARCHAR(2255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
