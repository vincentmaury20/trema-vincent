<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251026171352 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {

        $this->addSql('ALTER TABLE formation ADD is_published BOOLEAN DEFAULT false NOT NULL');

        $this->addSql("ALTER TABLE formation ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NOW() NOT NULL");
    }


    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE social_link');
        $this->addSql('DROP TABLE toto');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74');
        $this->addSql('ALTER TABLE formation DROP is_published');
        $this->addSql('ALTER TABLE formation DROP created_at');
    }
}
