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

    public function addCategory(): string
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $category = array_map('trim', $_POST);
            // $pictureService = new PictureService();
            // $pictureService->pictureFormFilter($picture);
            // $errors = $pictureService->errors;

            if (empty($errors)) {
                $categoryManager = new CategoryManager();
                $categoryManager->insertCategory($category);

                header('Location:/');
                die();
            }
        }
        if (isset($_SESSION['admin']) === true) {
            return $this->twig->render('Article/addCategory.html.twig');
        } else {
            header("location:/");
            die();
        }
    }

    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $CategoryManager = new CategoryManager();
            $CategoryManager->delete((int)$id);

            header('Location:/admin/management');
        }
    }
}
