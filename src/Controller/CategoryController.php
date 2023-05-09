<?php

namespace App\Controller;

use App\Model\CategoryManager;
use App\Model\ArticleManager;
use App\Service\CategoryService;

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
            $categories = $categoryManager->selectCategory();
            return $this->twig->render('Article/categoryList.html.twig', [
                'categories_numbers_articles' => $categories
            ]);
        } else {
            header("location:/");
            die();
        }
    }

    public function addCategory(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $category = array_map('trim', $_POST);
            $categoryService = new CategoryService();
            $categoryService->categoryTitleErrors($category);
            $categoryService->categoryPhotoErrors($category);

            if (empty($categoryService->errors)) {
                $categoryManager = new CategoryManager();
                $categoryManager->insertCategory($category);
                header('Location:/');
                die();
            }
            return $this->twig->render('Article/addCategory.html.twig', ['errors' => $categoryService->errors]);
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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $category = array_map('trim', $_POST);
            $categoryService = new CategoryService();
            $categoryService->categoryTitleErrors($category);
            $categoryService->categoryPhotoErrors($category);

            if (empty($categoryService->errors)) {
                $categoryManager = new CategoryManager();
                $categoryManager->updateCategory($category);
                header('Location:/category/list');
                die();
            }
            return $this->twig->render('Article/editCategory.html.twig', [
                'category' => $category,
                'errors' => $categoryService->errors
            ]);
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

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $categoryManager = new CategoryManager();
            $articleManager = new ArticleManager();
            if (empty($articleManager->selectArticlesByCategory((int)$id))) {
                $categoryManager->delete((int)$id);
                header('Location:/category/list');
                die();
            } else {
                $categoryManager = new CategoryManager();
                $categories = $categoryManager->selectCategory();
                $error = "Vous avez toujours des articles dans cette catégorie,
                Veuillez supprimer ou changer de catégorie les articles";
                return $this->twig->render('Article/categoryList.html.twig', [
                    'categories_numbers_articles' => $categories,
                    'error' => $error
                ]);
            }
        }
    }
}
