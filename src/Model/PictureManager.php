<?php

namespace App\Model;

use PDO;

class PictureManager extends AbstractManager
{
    public const TABLE = 'picture';

    /**
     * Insert new picture in database
     */
    public function insert(array $picture): void
    {
        $query = "INSERT INTO " . self::TABLE . " (url, article_id)
                VALUES (:url, :article_id);";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':url', $picture['url'], PDO::PARAM_STR);
        $statement->bindValue(':article_id', $picture['article_id'], PDO::PARAM_STR);


        $statement->execute();
    }

        /**
     * Get one row from database by ID.
     */
    public function selectPictureByArticleId(int $id): array|false
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT  p.url FROM " . static::TABLE . " as p
        INNER JOIN article as a on p.article_id=a.id WHERE p.article_id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }
}
