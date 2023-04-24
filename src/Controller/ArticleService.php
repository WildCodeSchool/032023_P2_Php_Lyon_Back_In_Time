<?php

namespace App\Controller;

use App\Model\ArticleManager;
use App\Controller\ArticleController;

class ArticleService
{
    public array $errors;

    public function __construct()
    {
        $this->errors = [];
    }
    /**
     * Filters the article form and return errors
     */
    public function formFilterErrors($article): void
    {
        if (!isset($article['title']) || empty($article['title'])) {
            $this->errors[] = "Pensez au tire";
        }

        if (!isset($article['content']) || empty($article['content'])) {
            $this->errors[] = "Pensez à écrire du contenu";
        }

        if (!isset($article['photo']) || empty($article['photo'])) {
            $this->errors[] = "Pensez à ajouter une photo";
        }
    }

        /**
     * Second function to filter the article form and return errors
     */
    public function secondFormFilterErrors($article): void
    {
        if (filter_var($article['photo'], FILTER_VALIDATE_URL) === false) {
            $this->errors[] = "Le lien de la photo n'est pas valide";
        }

        if (!isset($article['author']) || empty($article['author'])) {
            $this->errors[] = "Pensez à vous identifier";
        }

        if (!isset($article['date']) || empty($article['date'])) {
            $this->errors[] = "Pensez à indiquer la date de publication";
        }
    }
}
