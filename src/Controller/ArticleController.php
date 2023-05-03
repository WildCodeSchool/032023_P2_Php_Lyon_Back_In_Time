<?php

namespace App\Controller;

use App\Model\ArticleManager;
use App\Model\PictureManager;
use App\Model\CategoryManager;
use App\Service\ArticleService;
use App\Service\PictureService;

class ArticleController extends AbstractController
{
    /**
     * List articles
     */
    public function articleList(): string
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->selectAll('title');

        return $this->twig->render('Article/articlelist.html.twig', ['articles' => $articles]);
    }

    /**
     * List 3 lastest articles
     */
    public function lastThreeArticle(): string
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->selectLastThreeArticles();

        return $this->twig->render('Article/articlelist.html.twig', ['articles' => $articles]);
    }

    /**
     * new page creation exemple, to be used as an explanation.
     */
    public function newPage(): string
    {
        return $this->twig->render('Article/examplepage.html.twig');
    }

    /**
     * Show informations for a specific item
     */
    public function show(int $id): string
    {
        $articleManager = new ArticleManager();
        $article = $articleManager->selectOneById($id);

        $pictureManager = new PictureManager();
        $pictures = $pictureManager->selectPicturesByArticleId($id);


        return $this->twig->render('Article/show.html.twig', [
            'article' => $article,
            'pictures' => $pictures
        ]);
    }

    /**
     * Edit a specific item
     */
    public function editArticle(int $id): ?string
    {
        $articleManager = new ArticleManager();
        $article = $articleManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $article = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, update and redirection
            $articleManager->updateArticle($article);

            header('Location: ');

            // we are redirecting so we don't want any content rendered
            return null;
        }

        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAll();

        return $this->twig->render('Article/editArticle.html.twig', [
            'article' => $article,
            'categories' => $categories
        ]);
    }

    /**
     * Add a new article
     */
    public function add(): string
    {
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAll();

        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $article = array_map('trim', $_POST);

            $articleService = new ArticleService();
            $articleService->formFilterErrors($article);
            $articleService->secondFormFilterErrors($article);
            $articleService->photoFormFilterErrors($article);
            $errors = $articleService->errors;

            if (empty($errors)) {
                $articleManager = new ArticleManager();
                $articleManager->insert($article);

                header('Location:/articles/galerie');
                die();
            }
        }

        if (isset($_SESSION['admin']) === true) {
            return $this->twig->render('Article/addArticle.html.twig', ['categories' => $categories]);
        } else {
            header("location:/");
            die();
        }
    }


    /**
     * Add a picture to the article gallery
     */
    public function createPhotoGallery(): string
    {
        $articleManager = new ArticleManager();
        $titles = $articleManager->getAllTitles();

        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $picture = array_map('trim', $_POST);

            $pictureService = new PictureService();
            $pictureService->pictureFormFilter($picture);
            $errors = $pictureService->errors;

            if (empty($errors)) {
                $pictureManager = new PictureManager();
                $pictureManager->insert($picture);

                header('Location:/Accueil');
                die();
            }
        }
        if (isset($_SESSION['admin']) === true) {
            return $this->twig->render('Article/addGallery.html.twig', ['titles' => $titles]);
        } else {
            header("location:/");
            die();
        }
    }


    /**
     * Delete a specific item
     */
    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $articleManager = new ArticleManager();
            $articleManager->deleteFullArticle((int)$id);

            header('Location:/admin/management');
        }
    }
}
