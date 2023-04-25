<?php

namespace App\Controller;

use App\Model\ArticleManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->selectLastThreeArticles();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['logOut'])) {
                $_SESSION['admin'] = false;
                header("location: /");
            }
        }

        return $this->twig->render('Home/index.html.twig', ['articles' => $articles]);
    }
}
