<?php

namespace App\Controller;

use App\Model\ArticleManager;
use App\Controller\ArticleController;

class ArticleService
{
    /**
     * Filters the article form and return errors
     */
    public function formFilterErrors($article): array
    {
        $errors = [];
        if (!isset($article['title']) || empty($article['title'])) {
            $errors[] = "Pensez au tire";
        }

        if (!isset($article['content']) || empty($article['content'])) {
            $errors[] = "Pensez à écrire du contenu";
        }

        if (!isset($article['photo']) || empty($article['photo'])) {
            $errors[] = "Pensez à ajouter une photo";
        }


        return $errors;
    }
}
