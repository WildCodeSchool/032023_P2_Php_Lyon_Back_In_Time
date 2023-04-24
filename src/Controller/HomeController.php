<?php

namespace App\Controller;

use App\Model\ArticleManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->selectLastThreeArticles();

        if (isset($_SESSION['admin']) === true) {
            echo "you are admin";
        } else {
            echo "you are not admin";
        }

        return $this->twig->render('Home/index.html.twig', ['articles' => $articles]);
    }
}
