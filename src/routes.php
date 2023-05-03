<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)

// 'PAGE NAME IN NAV => ['CONTROLLER NAME', 'CALLED FUNCTION',]
return [
    '' => ['HomeController', 'index',],
    'items' => ['ItemController', 'index',],
    'items/edit' => ['ItemController', 'edit', ['id']],
    'items/show' => ['ItemController', 'show', ['id']],
    'items/add' => ['ItemController', 'add',],
    'items/delete' => ['ItemController', 'delete',],
    'newPage' => ['ArticleController', 'newPage',],
    'Accueil' => ['HomeController', 'index',],
    'articles/liste' => ['ArticleController', 'articleList',],
    'articles/show' => ['ArticleController', 'show', ['id']],
    'articles/add' => ['ArticleController', 'add',],
    'admin/connection' => ['AdminController', 'connexion',],
    'articles/galerie' => ['ArticleController', 'createPhotoGallery',],
    'admin/management' => ['AdminController', 'adminManagementPage',],
    'articles/delete' => ['ArticleController', 'delete'],
];
