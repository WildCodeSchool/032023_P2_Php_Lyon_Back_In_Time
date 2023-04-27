<?php

namespace App\Service;

class PictureService
{
    public array $errors;

    public function __construct()
    {
        $this->errors = [];
    }
            /**
     * Second function to filter the article form and return errors
     */
    public function pictureFormFilter($picture): void
    {
        if (filter_var($picture['url'], FILTER_VALIDATE_URL) === false) {
            $this->errors[] = "Le lien de la photo n'est pas valide";
        }
}
}