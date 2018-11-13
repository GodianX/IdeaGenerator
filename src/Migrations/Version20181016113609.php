<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20181016113609 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {$sql = <<<SQL
INSERT INTO ig_action (value)
VALUES
('Сделать'),('Написать'),('Придумать'),('Создать'),('Нарисовать'),('Переписать'),('Собрать'),('Разобрать'),('Сконструировать'),('Описать'),('Разработать'),('Сочинить'),('Купить'),('Продать'),('Скопировать')
SQL;

        $this->addSql($sql);

        $sql = <<<SQL
INSERT INTO ig_adjective (value)
VALUES
('умный'),('запутанный'),('быстрый'),('временный'),('креативный'),('функциональный'),('надежный'),('простой'),('дешевый'),('дорогой'),('творческий'),('красивый'),('разносторонний'),('сложный'),('долговечный')
SQL;

        $this->addSql($sql);

        $sql = <<<SQL
INSERT INTO ig_noun (value)
VALUES
('корабль'),('сценарий'),('алгоритм'),('мозг'),('ключ'),('провод'),('процессор'),('провод'),('монитор'),('телевизор'),('Wi-Fi'),('планшет'),('смартфон'),('микроконтроллер'),('наушник')
SQL;

        $this->addSql($sql);
    }

    public function down(Schema $schema) : void
    {
    }
}
