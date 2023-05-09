<?php

namespace App\Model;

use PDO;

class ArticleManager extends AbstractManager
{
    public const TABLE = 'article';
    public const TABLE2 = 'category';
    public const TABLE3 = 'picture';
    public const TABLE4 = 'writer';
    /**
     * Insert new article in database
     */
    public function insert(array $article): void
    {
        $query = "INSERT INTO " . self::TABLE . " (title, extract, content, photo, category_id, writer_id, date)
                VALUES (:title, :extract, :content, :photo, :category_id, :writer_id, :date);";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':title', $article['title'], PDO::PARAM_STR);
        $statement->bindValue(':extract', $article['extract'], PDO::PARAM_STR);
        $statement->bindValue(':content', $article['content'], PDO::PARAM_STR);
        $statement->bindValue(':photo', $article['photo'], PDO::PARAM_STR);
        $statement->bindValue(':category_id', $article['category_id'], PDO::PARAM_STR);
        $statement->bindValue(':writer_id', $article['writer_id'], PDO::PARAM_STR);
        $statement->bindValue(':date', $article['date'], PDO::PARAM_STR);

        $statement->execute();
    }

    public function selectAllArticles(): array
    {
        $query = 'SELECT a.id, a.title, a.extract, w.firstname, a.date, c.name
        FROM ' . static::TABLE . ' as a
            INNER JOIN ' . static::TABLE4 . ' as w on a.writer_id=w.id
            INNER JOIN ' . static::TABLE2 . ' as c on a.category_id=c.id ORDER BY date DESC;';

        return $this->pdo->query($query)->fetchAll();
    }


    /**
     * Get 3 rows from database by most recent date.
     */
    public function selectLastThreeArticles(): array
    {
        // prepared request
        $query = "SELECT * , w.firstname FROM " . static::TABLE . " as a
        INNER JOIN " . static::TABLE4 . " as w on a.writer_id=w.id WHERE date <= CURDATE() ORDER BY date DESC LIMIT 3;";
        $statement = $this->pdo->query($query);

        return $statement->fetchAll();
    }

    /**
     * Get the title and the id value of every article.
     */
    public function getAllTitles(): array
    {
        // prepared request
        $query = "SELECT id, title FROM " . static::TABLE . ";";
        $statement = $this->pdo->query($query);

        return $statement->fetchAll();
    }

    /**
     * Get the list of articles by category
     */

    public function selectArticlesByCategory(int $id): array|false
    {
        $statement = $this->pdo->prepare("SELECT *, c.id as categoryId, a.id as articleId  
        FROM " . static::TABLE . " as a 
        INNER JOIN " . static::TABLE4 . " as w on a.writer_id=w.id
        INNER JOIN " . static::TABLE2 . " as c ON 
        a.category_id=c.id WHERE date <= CURDATE() AND c.id=:id");
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }

    /**
     * Get one article with joined database
     * */

    public function selectOneWithCategory(int $id): array|false
    {
        $statement = $this->pdo->prepare("SELECT *, c.id as categoryId, a.id as articleId 
        FROM " . static::TABLE . " as a INNER JOIN " . static::TABLE2 . " as c ON
        a.category_id=c.id WHERE a.id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }

    /**
     * Delete article and pictures from an ID
     */
    public function deleteFullArticle(int $id): void
    {
        // prepared request
        $statement = $this->pdo->prepare("DELETE article , picture FROM " . static::TABLE . " LEFT 
        JOIN " . static::TABLE3 . " on picture.article_id = article.id WHERE article.id=:id;");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }

    public function updateArticle(array $article): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " 
        SET 
            `title` = :title,
            `extract` = :extract,
            `content` = :content,
            `photo` = :photo,
            `category_id` = :category_id,
            `writer_id` = :writer_id,
            `date` = :date
        WHERE 
            id=:id");
        $statement->bindValue(':title', $article['title'], PDO::PARAM_STR);
        $statement->bindValue(':extract', $article['extract'], PDO::PARAM_STR);
        $statement->bindValue(':content', $article['content'], PDO::PARAM_STR);
        $statement->bindValue(':photo', $article['photo'], PDO::PARAM_STR);
        $statement->bindValue(':category_id', $article['category_id'], PDO::PARAM_STR);
        $statement->bindValue(':writer_id', $article['writer_id'], PDO::PARAM_STR);
        $statement->bindValue(':date', $article['date'], PDO::PARAM_STR);
        $statement->bindValue(':id', $article['id'], PDO::PARAM_STR);

        return $statement->execute();
    }


    public function selectWriterByArticleId(int $id): array|false
    {

        $statement = $this->pdo->prepare("SELECT w.firstname, w.presentation 
        FROM " . static::TABLE . " as a
        INNER JOIN " . static::TABLE4 . " as w on a.writer_id=w.id WHERE a.id=:id;");

        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}
