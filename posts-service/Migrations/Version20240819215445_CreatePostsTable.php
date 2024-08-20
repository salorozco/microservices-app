<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240819215445_CreatePostsTable extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create Posts Tabled';
    }

    public function up(Schema $schema): void
    {
        // Drop the table if it exists
        $this->addSql('DROP TABLE IF EXISTS posts');

        // Create the posts table
        $this->addSql('
            CREATE TABLE posts (
                id INT UNSIGNED AUTO_INCREMENT NOT NULL,
                title VARCHAR(255) NOT NULL,
                content TEXT NOT NULL,
                user_id INT UNSIGNED NOT NULL,
                created_at DATETIME NOT NULL,
                updated_at DATETIME NOT NULL,
                PRIMARY KEY(id),
                KEY user_id (user_id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
        ');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE posts');
    }
}
