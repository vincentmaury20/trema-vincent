<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251027210633 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // Étape 1 : ajouter la colonne name en autorisant les valeurs nulles
        $this->addSql('ALTER TABLE testimony ADD name VARCHAR(5000)');

        // Étape 2 : remplir les anciennes lignes avec une valeur par défaut
        $this->addSql("UPDATE testimony SET name = 'Anonyme' WHERE name IS NULL");

        // Étape 3 : rendre la colonne non nullable
        $this->addSql('ALTER TABLE testimony ALTER COLUMN name SET NOT NULL');
    }


    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE toto');
        $this->addSql('ALTER TABLE testimony ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE testimony DROP name');
        $this->addSql('ALTER TABLE formation ALTER is_published SET DEFAULT false');
        $this->addSql('ALTER TABLE formation ALTER created_at SET DEFAULT \'now()\'');
    }
}
