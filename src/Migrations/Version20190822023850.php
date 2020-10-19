<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190822023850 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        
        $this->addSql('ALTER TABLE reservation ADD paiement_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849552A4C4478 FOREIGN KEY (paiement_id) REFERENCES paiement (id)');
        $this->addSql('CREATE INDEX IDX_42C849552A4C4478 ON reservation (paiement_id)');
        
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849552A4C4478');
        $this->addSql('DROP TABLE paiement');
        $this->addSql('ALTER TABLE etape_voyage DROP FOREIGN KEY FK_88904FEAA73F0036');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495571A51189');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495568C9E5AF');
        $this->addSql('DROP INDEX IDX_42C849552A4C4478 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP paiement_id');
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D8955F16F4AC6');
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D8955497832A6');
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D895534AC9A4B');
    }
}
