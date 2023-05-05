<?php

namespace App\Controller;

use App\Model\ArticleManager;
use App\Model\PictureManager;
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

        $articleManager = new ArticleManager();
        $pixcategory = $articleManager->selectOneWithCategory($id);

        return $this->twig->render('Article/show.html.twig', [
            'article' => $article,
            'pictures' => $pictures,
            'pixcategory' => $pixcategory
        ]);
    }

    /**
     * Edit a specific item
     */
    public function editArticle(int $id): ?string
    {
        $articleManager = new ArticleManager();
        $article = $articleManager->selectOneById($id);

        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $article = array_map('trim', $_POST);

            $articleService = new ArticleService();
            $articleService->formFilterErrors($article);
            $articleService->secondFormFilterErrors($article);
            $articleService->photoFormFilterErrors($article);
            $errors = $articleService->errors;

            if (empty($errors)) {
                $articleManager->updateArticle($article);
                header('Location:/articles/show?id=' . $article["id"]);
                die();
            }
            return $this->twig->render('Article/editArticle.html.twig', [
                'article' => $article,
                'errors' => $articleService->errors
            ]);
        }

        if (isset($_SESSION['admin']) === true) {
            return $this->twig->render('Article/editArticle.html.twig', [
                'article' => $article
            ]);
        } else {
            header("location:/");
            die();
        }
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
            $articleService->photoFormFilterErrors($article);
            $errors = $articleService->errors;

            if (empty($errors)) {
                $articleManager = new ArticleManager();
                $articleManager->insert($article);

                header('Location:/articles/galerie?id=' . $article["id"]);
                die();
            }
            return $this->twig->render('Article/addArticle.html.twig', ['errors' => $articleService->errors]);
        }

        if (isset($_SESSION['admin']) === true) {
            return $this->twig->render('Article/addArticle.html.twig');
        } else {
            header("location:/");
            die();
        }
    }


    /**
     * Add a picture to the article gallery
     */
    public function createPhotoGallery(int $id): string
    {
        $articleManager = new ArticleManager();
        $article = $articleManager->selectOneById($id);

        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $picture = array_map('trim', $_POST);
            $pictureService = new PictureService();
            $pictureService->pictureFormFilter($picture);
            $errors = $pictureService->errors;

            if (empty($errors)) {
                $pictureManager = new PictureManager();
                $pictureManager->insert($picture);

                header('Location:/articles/show?id=' . $picture['article_id']);
                die();
            }
        }
        if (isset($_SESSION['admin']) === true) {
            return $this->twig->render('Article/addGallery.html.twig', ['article' => $article]);
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

    public function showGallery(int $id): string
    {
        $articleManager = new ArticleManager();
        $article = $articleManager->selectOneById($id);

        $pictureManager = new PictureManager();
        $pictures = $pictureManager->selectPicturesByArticleId($id);


        return $this->twig->render('Article/editGallery.html.twig', [
            'article' => $article,
            'pictures' => $pictures
        ]);
    }


    public function deleteOnePicture(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = array_map('trim', $_POST);
            $pictureManager = new PictureManager();
            $pictureManager->deletePicture((int)$id['picture_id']);

            header('Location:/gallery/edit?id=' . $id['article_id']);
        }
    }
}
