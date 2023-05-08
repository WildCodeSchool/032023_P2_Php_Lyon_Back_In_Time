<?php

namespace App\Model;

use PDO;

class WriterManager extends AbstractManager
{
    public const TABLE = 'writer';

    public function tete(int $id): array
    {

        $statement = $this->pdo->prepare("SELECT * 
        FROM " . static::TABLE . " as w
        INNER JOIN article a on a.writer_id=w.id WHERE a.writer_id=:id;");

        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }
}
