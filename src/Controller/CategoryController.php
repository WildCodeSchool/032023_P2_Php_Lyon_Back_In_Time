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

    public function list(): string
    {
        if (isset($_SESSION['admin']) === true) {
            $categoryManager = new CategoryManager();
            $category = $categoryManager->selectAll();

            return $this->twig->render('Article/categoryList.html.twig', [
                'category' => $category
            ]);
        } else {
            header("location:/");
            die();
        }
    }

    public function addCategory(): string
    {
        // $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $category = array_map('trim', $_POST);

            // TODO security

            $categoryManager = new CategoryManager();
            $categoryManager->insertCategory($category);
            header('Location:/');
            die();
        }
        if (isset($_SESSION['admin']) === true) {
            return $this->twig->render('Article/addCategory.html.twig');
        } else {
            header("location:/category/list");
            die();
        }
    }

    public function editCategory(int $id): ?string
    {
        $categoryManager = new categoryManager();
        $category = $categoryManager->selectOneById($id);

        // $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $category = array_map('trim', $_POST);

            // TODO security

            $categoryManager->updateCategory($category);
            header('Location:/category/list');
            die();

            // return $this->twig->render('Category/editCategory.html.twig', [
            //     'category' => $category,
            //     'errors' => $categoryService->errors
            // ]);
        }

        if (isset($_SESSION['admin']) === true) {
            return $this->twig->render('Article/editCategory.html.twig', [
                'category' => $category
            ]);
        } else {
            header("location:/");
            die();
        }
    }

    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $categoryManager = new CategoryManager();
            $categoryManager->delete((int)$id);

            header('Location:/category/list');
        }
    }
}
