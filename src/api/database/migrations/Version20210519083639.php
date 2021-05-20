<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20210519083639 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE planet ADD uuid CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_68136AA5D17F50A6 ON planet (uuid)');
        $this->addSql('ALTER TABLE starship ADD uuid CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C414E64AD17F50A6 ON starship (uuid)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_68136AA5D17F50A6 ON planet');
        $this->addSql('ALTER TABLE planet DROP uuid, CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('DROP INDEX UNIQ_C414E64AD17F50A6 ON starship');
        $this->addSql('ALTER TABLE starship DROP uuid, CHANGE id id INT AUTO_INCREMENT NOT NULL');
    }
}
