<?php

namespace App\src\controller;


use App\src\model\ArticleManager;
use App\src\constraint\Validation;
use App\src\model\CommentManager;
use App\src\model\UserManager;
use App\src\view\View;
use App\config\Request;

abstract class Controller
{
    protected $articleManager;
    protected $commentManager;
    protected $view;
    protected $userManager;
    protected $request;
    protected $get;
    protected $post;
    protected $session;
    protected $validation;

    public function __construct()
    {
        $this->articleManager = new ArticleManager();
        $this->commentManager = new CommentManager();
        $this->userManager = new UserManager();
        $this->view = new View();
        $this->validation = new Validation();
        $this->request = new Request();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
    }
}