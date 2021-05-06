<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210506180415 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE oauth2_access_tokens ADD access_token_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE oauth2_access_tokens ADD CONSTRAINT FK_D247A21BD16FA632 FOREIGN KEY (access_token_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D247A21BD16FA632 ON oauth2_access_tokens (access_token_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE oauth2_access_tokens DROP FOREIGN KEY FK_D247A21BD16FA632');
        $this->addSql('DROP INDEX IDX_D247A21BD16FA632 ON oauth2_access_tokens');
        $this->addSql('ALTER TABLE oauth2_access_tokens DROP access_token_user_id');
    }
}
