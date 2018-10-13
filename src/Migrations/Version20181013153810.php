<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181013153810 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $sql = <<<SQL
CREATE TABLE ig_action (
  id SERIAL,
  value VARCHAR(255) NOT NULL
)
SQL;

        $this->addSql($sql);

        $sql = <<<SQL
CREATE TABLE ig_adjective (
  id SERIAL,
  value VARCHAR(255) NOT NULL
)
SQL;

        $this->addSql($sql);

        $sql = <<<SQL
CREATE TABLE ig_noun (
  id SERIAL,
  value VARCHAR(255) NOT NULL
);
SQL;

        $this->addSql($sql);

    }

    public function down(Schema $schema) : void
    {
    }
}
