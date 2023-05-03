<?php

namespace App\Controller;

use App\Model\CategoryManager;
use App\Model\ArticleManager;

class CategoryController extends AbstractController
{
    public function show(int $id): string
    {
        $categoryManager = new CategoryManager();
        $category = $categoryManager->selectOneById($id);

        $articleManager = new ArticleManager();
        $articles = $articleManager->selectArticlesByCategory($id);

        return $this->twig->render('Article/category.html.twig', [
            'category' => $category,
            'articles' => $articles
        ]);
    }
}
