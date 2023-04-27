<?php

namespace App\Model;

use PDO;

class ArticleManager extends AbstractManager
{
    public const TABLE = 'article';

    /**
     * Insert new article in database
     */
    public function insert(array $article): void
    {
        $query = "INSERT INTO " . self::TABLE . " (title, extract, content, photo, category, author, date)
                VALUES (:title, :extract, :content, :photo, :category, :author, :date);";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':title', $article['title'], PDO::PARAM_STR);
        $statement->bindValue(':extract', $article['extract'], PDO::PARAM_STR);
        $statement->bindValue(':content', $article['content'], PDO::PARAM_STR);
        $statement->bindValue(':photo', $article['photo'], PDO::PARAM_STR);
        $statement->bindValue(':category', $article['category'], PDO::PARAM_STR);
        $statement->bindValue(':author', $article['author'], PDO::PARAM_STR);
        $statement->bindValue(':date', $article['date'], PDO::PARAM_STR);

        $statement->execute();
    }

    /**
     * Update item in database
     */
    public function update(array $item): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `title` = :title WHERE id=:id");
        $statement->bindValue('id', $item['id'], PDO::PARAM_INT);
        $statement->bindValue('title', $item['title'], PDO::PARAM_STR);

        return $statement->execute();
    }

    /**
     * Get 3 rows from database by most recent date.
     */
    public function selectLastThreeArticles(): array
    {
        // prepared request
        $query = "SELECT * FROM " . static::TABLE . " ORDER BY date DESC LIMIT 3;";
        $statement = $this->pdo->query($query);

        return $statement->fetchAll();
    }

    /**
     * Get the title and the id value of every article.
     */
    public function getAllTitle(): array
    {
        // prepared request
        $query = "SELECT id, title FROM " . static::TABLE . ";";
        $statement = $this->pdo->query($query);

        return $statement->fetchAll();
    }
}
