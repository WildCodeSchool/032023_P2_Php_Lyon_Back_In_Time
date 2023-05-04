<?php

namespace App\Controller;

use App\Model\AdminManager;
use App\Model\ArticleManager;
use App\Model\CategoryManager;
use App\Service\AdminService;

class AdminController extends AbstractController
{
    public function connexion(): string
    {
        $adminService = new AdminService();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = array_map('trim', $_POST);

            $adminService->issetAndNotEmpty($data);
            $adminService->loginVerification($data);

            return $this->twig->render('Admin/connexionAdmin.html.twig', ['errors' => $adminService->errors]);
        }
        return $this->twig->render('Admin/connexionAdmin.html.twig');
    }

    public function adminManagementPage(): string
    {

        if (isset($_SESSION['admin']) === true) {
            $articlesManager = new ArticleManager();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['delete'])) {
                    $articlesManager->delete($_POST['id']);
                    header('Location: /../admin/management');
                    die();
                }
            }
            $articles = $articlesManager->selectAllArticles();
            return $this->twig->render('Admin/adminContentManagement.html.twig', [
                'articles' => $articles,
            ]);
        } else {
            header("location:/");
            die();
        }
    }
}
