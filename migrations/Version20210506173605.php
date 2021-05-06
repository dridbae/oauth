<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210506173605 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE oauth2_access_tokens (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, access_token_token VARCHAR(255) NOT NULL, access_token_expires_at INT NOT NULL, access_token_scope VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_D247A21B667C2854 (access_token_token), INDEX IDX_D247A21B19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oauth2_auth_codes (id INT AUTO_INCREMENT NOT NULL, auth_code_client_id INT NOT NULL, auth_code_token VARCHAR(255) NOT NULL, auth_code_expires_at INT NOT NULL, auth_code_scope VARCHAR(255) DEFAULT NULL, auth_code_redirect_uri LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_A018A10DAD67B5C3 (auth_code_token), INDEX IDX_A018A10DA81E92A1 (auth_code_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oauth2_clients (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', client_random_id VARCHAR(50) NOT NULL, client_redirect_uris LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', client_secret VARCHAR(50) DEFAULT NULL, client_allowed_grant_types LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oauth2_refresh_tokens (id INT AUTO_INCREMENT NOT NULL, refresh_token_client_id INT NOT NULL, refresh_token_token VARCHAR(255) NOT NULL, refresh_token_expires_at INT DEFAULT NULL, refresh_token_scope VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_D394478C3392044D (refresh_token_token), INDEX IDX_D394478C1F786C35 (refresh_token_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE oauth2_access_tokens ADD CONSTRAINT FK_D247A21B19EB6921 FOREIGN KEY (client_id) REFERENCES oauth2_clients (id)');
        $this->addSql('ALTER TABLE oauth2_auth_codes ADD CONSTRAINT FK_A018A10DA81E92A1 FOREIGN KEY (auth_code_client_id) REFERENCES oauth2_clients (id)');
        $this->addSql('ALTER TABLE oauth2_refresh_tokens ADD CONSTRAINT FK_D394478C1F786C35 FOREIGN KEY (refresh_token_client_id) REFERENCES oauth2_clients (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE oauth2_access_tokens DROP FOREIGN KEY FK_D247A21B19EB6921');
        $this->addSql('ALTER TABLE oauth2_auth_codes DROP FOREIGN KEY FK_A018A10DA81E92A1');
        $this->addSql('ALTER TABLE oauth2_refresh_tokens DROP FOREIGN KEY FK_D394478C1F786C35');
        $this->addSql('DROP TABLE oauth2_access_tokens');
        $this->addSql('DROP TABLE oauth2_auth_codes');
        $this->addSql('DROP TABLE oauth2_clients');
        $this->addSql('DROP TABLE oauth2_refresh_tokens');
    }
}
