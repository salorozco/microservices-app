<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240820043311_UsersSeeder extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Seed the users table with two users';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("
            INSERT INTO users (id, name, email, created_at, updated_at)
            VALUES
            (1, 'User One', 'user1@example.com', NOW(), NOW()),
            (2, 'User Two', 'user2@example.com', NOW(), NOW())
        ");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DELETE FROM users WHERE id IN (1, 2)');

    }
}
