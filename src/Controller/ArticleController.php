<?php

namespace App\Controller;

use App\Model\ArticleManager;

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

        return $this->twig->render('Article/show.html.twig', ['article' => $article]);
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $article = array_map('trim', $_POST);

            //TODO - Add some security controls

            $articleManager = new ArticleManager();
            $articleManager->insert($article);

            header('Location:/Accueil');
            die();
        }
        return $this->twig->render('Article/addArticle.html.twig');
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
}
