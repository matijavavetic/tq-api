<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;
use LaravelDoctrine\Migrations\Schema\Table;
use LaravelDoctrine\Migrations\Schema\Builder;

class Version20210518083634 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        (new Builder($schema))->create('planet', function (Table $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('population');
            $table->string('gravity');
            $table->timestamps();
        });
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        (new Builder($schema))->drop('planet');
    }
}
