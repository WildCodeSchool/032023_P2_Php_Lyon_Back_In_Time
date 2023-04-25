<?php

namespace App\Controller;

use App\Model\AdminManager;
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

            return $this->twig->render('Admin/connexionAdmin.html.twig', ['errors' => $adminService->errors],);
        }
        return $this->twig->render('Admin/connexionAdmin.html.twig',);
    }
}
