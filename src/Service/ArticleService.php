<?php

namespace App\Service;

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
            $this->errors[] = "Pensez au titre";
        }

        if (isset($article['title']) && strlen($article['title']) > 29) {
            $this->errors[] = "Le titre est trop long";
        }

        if (!isset($article['extract']) || empty($article['extract'])) {
            $this->errors[] = "Pensez à l'accroche";
        }

        if (isset($article['extract']) && strlen($article['extract']) > 58) {
            $this->errors[] = "L'accroche est trop longue";
        }
    }

        /**
     * Second function to filter the article form and return errors
     */
    public function secondFormFilterErrors($article): void
    {
        if (!isset($article['content']) || empty($article['content'])) {
            $this->errors[] = "Pensez à écrire du contenu";
        }

        if (!isset($article['author']) || empty($article['author'])) {
            $this->errors[] = "Pensez à vous identifier";
        }

        if (!isset($article['date']) || empty($article['date'])) {
            $this->errors[] = "Pensez à indiquer la date de publication";
        }
    }

            /**
     *  function to filter the photo from the article form and return errors
     */
    public function photoFormFilterErrors($article): void
    {
        if (!isset($article['photo']) || empty($article['photo'])) {
            $this->errors[] = "Pensez à ajouter une photo";
        }
        if (filter_var($article['photo'], FILTER_VALIDATE_URL) === false) {
            $this->errors[] = "Le lien de la photo n'est pas valide";
        }
    }
}
