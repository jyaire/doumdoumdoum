<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210801183624 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE file (id INT AUTO_INCREMENT NOT NULL, song_id INT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, download INT NOT NULL, is_open TINYINT(1) NOT NULL, INDEX IDX_8C9F3610A0BDB2F3 (song_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE song (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, author VARCHAR(255) DEFAULT NULL, period VARCHAR(255) DEFAULT NULL, lyrics VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE target (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE target_song (target_id INT NOT NULL, song_id INT NOT NULL, INDEX IDX_FEF5F810158E0B66 (target_id), INDEX IDX_FEF5F810A0BDB2F3 (song_id), PRIMARY KEY(target_id, song_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_song (type_id INT NOT NULL, song_id INT NOT NULL, INDEX IDX_E4E22BA9C54C8C93 (type_id), INDEX IDX_E4E22BA9A0BDB2F3 (song_id), PRIMARY KEY(type_id, song_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F3610A0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (id)');
        $this->addSql('ALTER TABLE target_song ADD CONSTRAINT FK_FEF5F810158E0B66 FOREIGN KEY (target_id) REFERENCES target (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE target_song ADD CONSTRAINT FK_FEF5F810A0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE type_song ADD CONSTRAINT FK_E4E22BA9C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE type_song ADD CONSTRAINT FK_E4E22BA9A0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F3610A0BDB2F3');
        $this->addSql('ALTER TABLE target_song DROP FOREIGN KEY FK_FEF5F810A0BDB2F3');
        $this->addSql('ALTER TABLE type_song DROP FOREIGN KEY FK_E4E22BA9A0BDB2F3');
        $this->addSql('ALTER TABLE target_song DROP FOREIGN KEY FK_FEF5F810158E0B66');
        $this->addSql('ALTER TABLE type_song DROP FOREIGN KEY FK_E4E22BA9C54C8C93');
        $this->addSql('DROP TABLE file');
        $this->addSql('DROP TABLE song');
        $this->addSql('DROP TABLE target');
        $this->addSql('DROP TABLE target_song');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE type_song');
    }
}
