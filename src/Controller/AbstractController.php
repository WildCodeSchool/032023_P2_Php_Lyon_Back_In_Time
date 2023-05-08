<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;
use App\Model\CategoryManager;
use App\Model\WriterManager;

/**
 * Initialized some Controller common features (Twig...)
 */
abstract class AbstractController
{
    protected Environment $twig;
    public bool $admin = false;

    public function __construct()
    {
        $loader = new FilesystemLoader(APP_VIEW_PATH);
        $this->twig = new Environment(
            $loader,
            [
                'cache' => false,
                'debug' => true,
            ]
        );

        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAll('id');
        $articleManager = new WriterManager();
        $writers = $articleManager->selectAll('id');

        $this->twig->addExtension(new DebugExtension());
        $this->twig->addGlobal('session', $_SESSION);
        $this->twig->addGlobal('categories', $categories);
        $this->twig->addGlobal('writers', $writers);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['logOut'])) {
                session_destroy();
                header("location: /");
                die();
            }
        }
    }
}
