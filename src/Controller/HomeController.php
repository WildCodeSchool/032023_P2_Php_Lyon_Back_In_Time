<?php

namespace App\Controller;

use App\Model\ArticleManager;
use App\Model\CategoryManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->selectLastThreeArticles();

        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAll('id');

        return $this->twig->render('Home/index.html.twig', [
            'articles' => $articles,
            'categories' => $categories,
        ]);
    }
}
