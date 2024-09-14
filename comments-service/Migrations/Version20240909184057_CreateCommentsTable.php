<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240909184057_CreateCommentsTable extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create Comments Table';
    }

    public function up(Schema $schema): void
    {
        // Drop the table if it exists
        $this->addSql('DROP TABLE IF EXISTS comments');

        // Create the comments table
        $this->addSql('
            CREATE TABLE comments (
                id INT UNSIGNED AUTO_INCREMENT NOT NULL,
                post_id INT UNSIGNED NOT NULL,
                content TEXT NOT NULL,
                created_at DATETIME NOT NULL,
                updated_at DATETIME NOT NULL,
                PRIMARY KEY(id),
                KEY post_id (post_id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
        ');

    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE comments');

    }
}
