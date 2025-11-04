<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251104083904 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE social_link_id_seq CASCADE');
        $this->addSql('DROP TABLE social_link');
        $this->addSql('ALTER TABLE formation ALTER is_published DROP DEFAULT');
        $this->addSql('ALTER TABLE formation ALTER created_at DROP DEFAULT');
        $this->addSql('ALTER TABLE testimony ADD author VARCHAR(5000)');
        $this->addSql("UPDATE testimony SET author = 'Inconnu' WHERE author IS NULL");
        $this->addSql('ALTER TABLE testimony ALTER COLUMN author SET NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE social_link_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE social_link (id SERIAL NOT NULL, title VARCHAR(255) NOT NULL, link VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE testimony DROP author');
        $this->addSql('ALTER TABLE formation ALTER is_published SET DEFAULT false');
        $this->addSql('ALTER TABLE formation ALTER created_at SET DEFAULT \'now()\'');
    }
}
