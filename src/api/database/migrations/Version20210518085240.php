<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20210518085240 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE planet DROP created_at, DROP updated_at, CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE starship ADD planet_id INT DEFAULT NULL, DROP created_at, DROP updated_at, CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE starship ADD CONSTRAINT FK_C414E64AA25E9820 FOREIGN KEY (planet_id) REFERENCES planet (id)');
        $this->addSql('CREATE INDEX IDX_C414E64AA25E9820 ON starship (planet_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE planet ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL, CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE starship DROP FOREIGN KEY FK_C414E64AA25E9820');
        $this->addSql('DROP INDEX IDX_C414E64AA25E9820 ON starship');
        $this->addSql('ALTER TABLE starship ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL, DROP planet_id, CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL');
    }
}
