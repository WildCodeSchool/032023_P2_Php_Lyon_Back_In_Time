<?php

namespace App\Controller;

use App\Model\ArticleManager;
use App\Model\PictureManager;
use App\Service\ArticleService;

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
        $pictures = $pictureManager->selectPictureByArticleId($id);


       //var_dump($pictures);die();

        return $this->twig->render('Article/show.html.twig', [
            'article' => $article,
            'pictures' => $pictures
        ]);
    }

    /**
     * Edit a specific item
     */
    public function edit(int $id): ?string
    {
        $itemManager = new ArticleManager();
        $item = $itemManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $item = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, update and redirection
            $itemManager->update($item);

            header('Location: /items/show?id=' . $id);

            // we are redirecting so we don't want any content rendered
            return null;
        }

        return $this->twig->render('Item/edit.html.twig', [
            'item' => $item,
        ]);
    }

    /**
     * Add a new article
     */
    public function add(): string
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $article = array_map('trim', $_POST);

            $articleService = new ArticleService();
            $articleService->formFilterErrors($article);
            $articleService->secondFormFilterErrors($article);
            $errors = $articleService->errors;

            if (empty($errors)) {
                $articleManager = new ArticleManager();
                $articleManager->insert($article);

                header('Location:/Accueil');
                die();
            }
        }

        if ($_SESSION['admin'] === true) {
            return $this->twig->render('Article/addArticle.html.twig');
        } else {
            header("location: /");
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
            $itemManager = new ArticleManager();
            $itemManager->delete((int)$id);

            header('Location:/items');
        }
    }

        /**
     * comment later.
     */
    public function createPhotoGallery(): string
    {
        $articleManager = new ArticleManager();
        $titles = $articleManager->getAllTitle();

        //$errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $picture = array_map('trim', $_POST);

            $pictureManager = new PictureManager();
            $pictureManager->insert($picture);

            header('Location:/Accueil');
            die();
        }


        return $this->twig->render('Article/addGallery.html.twig', ['titles' => $titles]);
    }
}
