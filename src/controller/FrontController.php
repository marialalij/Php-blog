<?php
namespace App\src\controller;
use App\config\Parameter;


class FrontController extends Controller
{

    public function home()
    {
        return $this->view->render('about_me');
    }

    public function about()
    {
        $articles = $this->articleManager->getArticles();
        return $this->view->render('blog', [
            'articles' => $articles
        ]);
    }

    public function article($articleId)
    {
        $article = $this->articleManager->getArticle($articleId);
        $comments = $this->commentManager->getComments($articleId);
        return $this->view->render('single', [
            'article' => $article,
            'comments' => $comments
        ]);
    }
    public function addComment(Parameter $post, $articleId)
    {
        $article = $this->articleManager->getArticle($articleId);
        $comments = $this->commentManager->getComments($articleId);

        //Si formulaire POST soumis, on insère le commentaire si les données sont valides
        if ($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Comment');
            if (!$errors) {
                $this->commentManager->addComment($post, $articleId);
                $this->session->set('add_comment', 'Le commentaire à bien été ajouté');
                header('Location: ../public/index.php?route=article&articleId=' . $articleId);
            } else {
                $this->view->render('single', [
                    'article' => $article,
                    'comments' => $comments,
                    'errors' => $errors,
                    'post' => $post
                ]);
            }
        } else {
            //Si aucun formulaire soumis, redirection vers home
            header('Location: ../public/index.php');
        }
    }







    public function register(Parameter $post)
    {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'User');
            if($this->userManager->checkUser($post)) {
                $errors['pseudo'] = $this->userManager->checkUser($post);
            }
            if(!$errors) {
                $this->userManager->register($post);
                $this->session->set('register', 'Votre inscription a bien été effectuée');
                header('Location: ../public/index.php');
            }
            return $this->view->render('register', [
                'post' => $post,
                'errors' => $errors
            ]);

        }
        return $this->view->render('register');
    }


    public function login(Parameter $post)
    {
        if($post->get('submit')) {
            $result = $this->userManager->login($post);
            if($result && $result['isPasswordValid']) {
                $this->session->set('login', 'Content de vous revoir');
                $this->session->set('iduser', $result['result']['iduser']);
                $this->session->set('role', $result['result']['role']);
                $this->session->set('pseudo', $post->get('pseudo'));
                header('Location: ../public/index.php');
            }
            else {
                $this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects');
                return $this->view->render('login', [
                    'post'=> $post
                ]);
            }
        }
        return $this->view->render('login');
    }

    
    public function contact()
    {
        return $this->view->render('contact_me');
    }

    
}

   

