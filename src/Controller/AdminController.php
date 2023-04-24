<?php

namespace App\Controller;

use App\Model\AdminManager;

class AdminController extends AbstractController
{
    public function connexion(): string
    {
        $adminManager = new AdminManager();
        $admin = $adminManager->selectOneById(1);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = [];
            $data = array_map('trim', $_POST);

            if (!isset($data['username']) || empty($data['username'])) {
                $errors[] = "vous devez renseigner votre nom d'utilisateur";
            }
            if (!isset($data['password']) || empty($data['password'])) {
                $errors[] = "vous devez renseigner votre mots de passe";
            }
            if (empty($errors)) {
                if ($admin['username'] == $data['username'] && $admin['password'] == $data['password']) {
                    $_SESSION['admin'] = true;
                    header("location: /");
                } else {
                    $errors[] = "Mauvais nom d'utilisateur ou mots de passe";
                }
            }
        }

        return $this->twig->render('Admin/connexionAdmin.html.twig', ['admin' => $admin]);
    }
}
