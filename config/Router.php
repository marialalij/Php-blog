<?php

namespace App\config;
use App\src\controller\HomeController;
use App\src\controller\ErrorController;
use App\src\controller\ArticleController;
use App\src\controller\UserController;
use App\src\controller\CommentController;
use Exception;

class Router
{
    private $homeController;
    private $errorController;
    private $request;
    private $articleController;
    private $userController;
    private $commentController;

    public function __construct()
    {
        $this->request = new Request();
        $this->homeController = new HomeController();
        $this->errorController = new ErrorController();
        $this->articleController = new ArticleController();
        $this->commentController = new CommentController();
        $this->userController = new UserController();
    }

    public function run()
    {
        $route = $this->request->getGet()->get('route');
        $articleId = $this->request->getGet()->get('articleId');
        $post = $this->request->getPost();
        try{
            if(isset($route))
            {
                if($route === 'article'){
                    $this->articleController->article($this->request->getGet()->get('articleId'));
                }
                elseif($route === 'about'){
                    $this->homeController->about();
                }
                elseif($route === 'admin'){
                    $this->userController->admin();
                }
                elseif($route === 'addArticle'){
                    $this->articleController->addArticle($post);
                }
                elseif($route === 'editArticle'){
                    $this->articleController->editArticle($post, $articleId);
                }
                elseif($route === 'deleteArticle'){
                    $this->articleController->deleteArticle($articleId);
                }
                elseif($route === 'addComment'){
                    $this->commentController->addComment($post, $articleId);
                }
                elseif($route === 'deleteComment'){
                    $this->commentController->deleteComment($this->request->getGet()->get('commentId'));
                }
                elseif($route === 'register'){
                      $this->userController->register($post);
                }
                elseif($route === 'contact'){
                    $this->homeController->contact();
              }
                elseif($route === 'login'){
                    $this->userController->login($post);
                }
                elseif($route === 'profile'){
                    $this->userController->profile();
                }
                elseif($route === 'updatePassword'){
                    $this->userController->updatePassword($this->request->getPost());
                }
                elseif($route === 'publishArticle'){
                    $this->articleController->publishArticle($articleId);
                }
                elseif($route === 'nopublishArticle'){
                    $this->articleController->nopublishArticle($articleId);
                }
                elseif($route === 'publishComment'){
                    $this->commentController->publishComment($this->request->getGet()->get('commentId'));
                }
                elseif($route === 'nopublishComment'){
                    $this->commentController->nopublishComment($this->request->getGet()->get('commentId'));
                }
                elseif($route === 'logout'){
                    $this->userController->logout();
                }
                elseif($route === 'deleteAccount'){
                    $this->userController->deleteAccount();
                }
                elseif($route === 'deleteUser'){
                    $this->userController->deleteUser($this->request->getGet()->get('userId'));
                }
                elseif($route === 'administration'){
                    $this->homeController->administration();
                }
                else{
                    $this->errorController->errorNotFound();
                }
            }
            else{
                $this->homeController->home();
            }
        }
        catch (Exception $e)
        {
            $this->errorController->errorServer();
        }
    }
}