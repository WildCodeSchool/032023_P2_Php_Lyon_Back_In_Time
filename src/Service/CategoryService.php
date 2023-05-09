<?php

namespace App\Service;

class CategoryService
{
    public array $errors;

    public function __construct()
    {
        $this->errors = [];
    }
    public function categoryTitleErrors($category): void
    {
        if (!isset($category['name']) || empty($category['name'])) {
            $this->errors[] = "Pensez au nom de la catégorie";
        }

        if (isset($category['name']) && strlen($category['name']) > 29) {
            $this->errors[] = "Le nom de la catégorie est trop long";
        }
    }

    public function categoryPhotoErrors($category): void
    {
        if (!isset($category['url']) || empty($category['url'])) {
            $this->errors[] = "Pensez à ajouter une photo";
        }
        if (filter_var($category['url'], FILTER_VALIDATE_URL) === false) {
            $this->errors[] = "Le lien de la photo n'est pas valide";
        }
    }
}
