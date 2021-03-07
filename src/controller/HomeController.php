<?php
namespace App\src\controller;
use App\config\Parameter;


class HomeController extends Controller
{  
 
/**
* Administration area
*/
    public function administration()
    {
        $articles = $this->articleManager->getalladministration();
        $users = $this->userManager->getUsers();
        $comments = $this->commentManager->getAllComments();
        return $this->view->render('administration', [
            'articles' => $articles,
            'users' => $users,
            'comments' => $comments 
        ]);
    }

    public function home()
    {
        return $this->view->render('about_me');
    }
//profil about me
    public function about()
    {
        $articles = $this->articleManager->getArticles();
        return $this->view->render('blog', [
            'articles' => $articles
        ]);
    }
    
    //contat
    public function contact()
    {
        return $this->view->render('contact_me');
    }
    
}