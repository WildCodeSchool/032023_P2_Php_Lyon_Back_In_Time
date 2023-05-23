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
     * Filter the picture form and return errors
     */
    public function pictureFormFilter($picture): void
    {
        $picturesUrl = explode("\n", $picture['url']);
        foreach ($picturesUrl as $url) {
            $url = trim($url); // remove whitespace
            if (filter_var($url, FILTER_VALIDATE_URL) === false) {
                $this->errors[] = "Le lien de la photo n'est pas valide";
            }
        }
    }
}
