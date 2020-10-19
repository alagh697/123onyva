<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190821124418 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservation ADD confirm TINYINT(1) NOT NULL');
        
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE etape_voyage DROP FOREIGN KEY FK_88904FEAA73F0036');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495571A51189');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495568C9E5AF');
        $this->addSql('ALTER TABLE reservation DROP confirm');
        $this->addSql('CREATE INDEX ville_code_commune ON ville (ville_code_commune)');
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D8955F16F4AC6');
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D8955497832A6');
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D895534AC9A4B');
    }
}
