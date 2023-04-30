<?php

namespace App\Controller;

use App\Model\CategoryManager;

class CategoryController extends AbstractController
{ 
    public function index(): string   
    {
    $categoryManager = new CategoryManager();
    $categories = $categoryManager->selectAll();

    return $this->twig->render('Article/index.html.twig', ['categories' => $categories]);
    }
}