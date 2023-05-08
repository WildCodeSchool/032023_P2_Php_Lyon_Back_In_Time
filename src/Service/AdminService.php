<?php

namespace App\Service;

use App\Model\AdminManager;

class AdminService
{
    public array $errors;

    public function __construct()
    {
        $this->errors = [];
    }

    public function issetAndNotEmpty(array $data): void
    {
        if (!isset($data['username']) || empty($data['username'])) {
            $this->errors[] = "vous devez renseigner votre nom d'utilisateur";
        }
        if (!isset($data['password']) || empty($data['password'])) {
            $this->errors[] = "vous devez renseigner votre mots de passe";
        }
    }

    public function loginVerification(array $data): void
    {
        $adminManager = new AdminManager();
        $admin = $adminManager->selectOneById(1);

        if (empty($this->errors)) {
            if ($admin['username'] == $data['username'] && password_verify($data['password'], $admin['password'])) {
                $_SESSION['admin'] = true;
                header("location: /admin/management");
            } else {
                $this->errors[] = "Mauvais nom d'utilisateur ou mots de passe";
            }
        }
    }
}
