<?php

namespace App\config;
use App\src\controller\BackController;
use App\src\controller\ErrorController;
use App\src\controller\FrontController;
use Exception;

class Router
{
    private $frontController;
    private $backController;
    private $errorController;
    private $request;

    public function __construct()
    {
        $this->request = new Request();
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
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
                    $this->frontController->article($this->request->getGet()->get('articleId'));
                }
                elseif($route === 'about'){
                    $this->frontController->about();
                }
                elseif($route === 'admin'){
                    $this->frontController->admin();
                }
                elseif($route === 'addArticle'){
                    $this->backController->addArticle($post);
                }
                elseif($route === 'editArticle'){
                    $this->backController->editArticle($post, $articleId);
                }
                elseif($route === 'deleteArticle'){
                    $this->backController->deleteArticle($articleId);
                }
                elseif($route === 'addComment'){
                    $this->frontController->addComment($post, $articleId);
                }
                elseif($route === 'deleteComment'){
                    $this->backController->deleteComment($this->request->getGet()->get('commentId'));
                }
                elseif($route === 'register'){
                      $this->frontController->register($post);
                }
                elseif($route === 'contact'){
                    $this->frontController->contact();
              }
                elseif($route === 'login'){
                    $this->frontController->login($post);
                }
                elseif($route === 'profile'){
                    $this->backController->profile();
                }
                elseif($route === 'updatePassword'){
                    $this->backController->updatePassword($this->request->getPost());
                }
                elseif($route === 'logout'){
                    $this->backController->logout();
                }
                elseif($route === 'deleteAccount'){
                    $this->backController->deleteAccount();
                }
                elseif($route === 'deleteUser'){
                    $this->backController->deleteUser($this->request->getGet()->get('userId'));
                }
                elseif($route === 'administration'){
                    $this->backController->administration();
                }
                else{
                    $this->errorController->errorNotFound();
                }
            }
            else{
                $this->frontController->home();
            }
        }
        catch (Exception $e)
        {
            $this->errorController->errorServer();
        }
    }
}