<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181014150513 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE ig_action ADD view_counter INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ig_action ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE ig_action ALTER value TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE ig_action ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE ig_action ALTER COLUMN  id SET DEFAULT NEXTVAL(\'ig_action_id_seq\')');
        $this->addSql('ALTER TABLE ig_adjective ADD view_counter INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ig_adjective ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE ig_adjective ALTER value TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE ig_adjective ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE ig_adjective ALTER COLUMN  id SET DEFAULT NEXTVAL(\'ig_adjective_id_seq\')');
        $this->addSql('ALTER TABLE ig_noun ADD view_counter INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ig_noun ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE ig_noun ALTER value TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE ig_noun ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE ig_noun ALTER COLUMN  id SET DEFAULT NEXTVAL(\'ig_noun_id_seq\')');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX "primary"');
        $this->addSql('ALTER TABLE ig_action DROP view_counter');
        $this->addSql('CREATE SEQUENCE ig_action_id_seq');
        $this->addSql('SELECT setval(\'ig_action_id_seq\', (SELECT MAX(id) FROM ig_action))');
        $this->addSql('ALTER TABLE ig_action ALTER id SET DEFAULT nextval(\'ig_action_id_seq\')');
        $this->addSql('ALTER TABLE ig_action ALTER value TYPE VARCHAR(255)');
        $this->addSql('DROP INDEX "primary"');
        $this->addSql('ALTER TABLE ig_adjective DROP view_counter');
        $this->addSql('CREATE SEQUENCE ig_adjective_id_seq');
        $this->addSql('SELECT setval(\'ig_adjective_id_seq\', (SELECT MAX(id) FROM ig_adjective))');
        $this->addSql('ALTER TABLE ig_adjective ALTER id SET DEFAULT nextval(\'ig_adjective_id_seq\')');
        $this->addSql('ALTER TABLE ig_adjective ALTER value TYPE VARCHAR(255)');
        $this->addSql('DROP INDEX "primary"');
        $this->addSql('ALTER TABLE ig_noun DROP view_counter');
        $this->addSql('CREATE SEQUENCE ig_noun_id_seq');
        $this->addSql('SELECT setval(\'ig_noun_id_seq\', (SELECT MAX(id) FROM ig_noun))');
        $this->addSql('ALTER TABLE ig_noun ALTER id SET DEFAULT nextval(\'ig_noun_id_seq\')');
        $this->addSql('ALTER TABLE ig_noun ALTER value TYPE VARCHAR(255)');
    }
}
