<?php

namespace App\Model;

use PDO;

class CategoryManager extends AbstractManager
{
    public const TABLE = 'category';

    public function insertCategory(array $category): void
    {
        $query = "INSERT INTO " . self::TABLE . " (name, url)
                VALUES (:name, :url);";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':name', $category['name'], PDO::PARAM_STR);
        $statement->bindValue(':url', $category['url'], PDO::PARAM_STR);

        $statement->execute();
    }

    public function updateCategory(array $category): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " 
        SET 
            `name` = :name,
            `url` = :url
        WHERE 
            id=:id");
        $statement->bindValue(':name', $category['name'], PDO::PARAM_STR);
        $statement->bindValue(':url', $category['url'], PDO::PARAM_STR);
        $statement->bindValue(':id', $category['id'], PDO::PARAM_STR);


        return $statement->execute();
    }
}
