<?php
namespace App\src\controller;

use App\config\Parameter;


class BackController extends Controller
{  
    private function checkLoggedIn()
    {
        if(!$this->session->get('pseudo')) {
            $this->session->set('need_login', 'Vous devez vous connecter pour accéder à cette page');
            header('Location: ../public/index.php?route=login');
        } else {
            return true;
        }
    }

    private function checkAdmin()
    {
        $this->checkLoggedIn();
        if(!($this->session->get('role') === 'admin')) {
            $this->session->set('not_admin', 'Vous n\'avez pas le droit d\'accéder à cette page');
            header('Location: ../public/index.php?route=profile');
        } else {
            return true;
        }
    }



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

    public function addArticle(Parameter $post)
    {
        if ($this->checkAdmin()){
            //Si le formulaire d'ajout à été soumis
            if ($post->get('submit')) {
                //Validation des données avant soumission à la BD
                $errors = $this->validation->validate($post, 'Article');
                if (!$errors) {
                    $this->articleManager->addArticle($post, $this->session->getUserInfo('idarticle'));
                    //Création d'un message à afficher dans la session
                    $this->session->set('add_article', 'Le nouvel article à bien été ajouté');
                    //TODO: Redirection vers l'article crée : nécessite de récupérer son id après création
                    header('Location: ../public/index.php?route=administration');
                } else {
                    //Si il y a des erreurs, tjrs en modification avec données et errors en plus
                    $this->view->render('add_article', [
                        'post' => $post,
                        'errors' => $errors
                    ]);
                }
            } else {
                //Si aucune données POST, création d'un article
                $this->view->render('add_article');
            }
        }
    }


    public function editArticle(Parameter $post, $articleId)
    {
        if ($this->checkAdmin()){
            $article = $this->articleManager->getArticle($articleId);

            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Article');
                if (!$errors) {
                    $this->articleManager->editArticle($post, $articleId, $this->session->getUserInfo('idarticle'));
                    $this->session->set('edit_article', 'L\'article à bien été mis à jour');
                    header('Location: ../public/index.php?route=administration');
                } else {
                    //Si il y a des erreurs, affichage avec les données soumises et erreurs
                    $this->view->render('edit_article', [
                        'post' => $post,
                        'errors' => $errors
                    ]);
                }
            } else {
                //Edition d'un article, données brutes de la base
                $post->set('idarticle', $article->getIdArticle());
                $post->set('title', $article->getTitle());
                $post->set('chapo', $article->getChapo());
                $post->set('content', $article->getContent());  
                $post->set('author', $article->getAuthor());      
                //Si le formulaire n'a pas été soumis, on affiche l'article à modifier
                $this->view->render('edit_article', [
                    'post' => $post
                ]);
            }
        }
    }
    public function deleteArticle($articleId)
    {
        $this->articleManager->deleteArticle($articleId);
        $this->session->set('delete_article', 'L\' article a bien été supprimé');
        header('Location: ../public/index.php?route=administration');
    }


    public function deleteComment($commentId)
    {
        $this->commentManager->deleteComment($commentId);
        $this->session->set('delete_comment', 'Le commentaire a bien été supprimé');
        header('Location: ../public/index.php?route=administration');
    }


 
    public function logout()
    {
        if ($this->checkLoggedIn()) {
            $this->session->destroy();
            $this->session->start();
            $this->session->set('logout', 'Déconnexion réussie');
            header('Location: ../public/index.php');
        }
    }

    public function profile()
    {
        return $this->view->render('profile');

    }

    public function updatePassword(Parameter $post)
    {
        if($post->get('submit')) {
            $this->userManager->updatePassword($post, $this->session->get('pseudo'));
            $this->session->set('update_password', 'Le mot de passe a été mis à jour');
            header('Location: ../public/index.php?route=profile');
        }
        return $this->view->render('update_password');
    }
    public function deleteAccount()
    {
        $this->userManager->deleteAccount($this->session->get('pseudo'));
        $this->session->stop();
        $this->session->start();
        $this->session->set('delete_account', 'Votre compte a bien été supprimé');
        header('Location: ../public/index.php');
    }
    public function deleteUser($userId)
    {
        $this->userManager->deleteUser($userId);
        $this->session->set('delete_user', 'L\'utilisateur a bien été supprimé');
        header('Location: ../public/index.php?route=administration');
    }


     public function publishArticle($articleId)
   {
        $this->articleManager->publishArticle($articleId);
         $this->session->set('article_publish', 'bien ajouter');
         header('Location: ../public/index.php?route=administration');
    }


   public function pauseArticle($articleId)
     {
        $this->articleManager->pauseArticle($articleId);
         $this->session->set('article_nopublish', 'non publier');
        header('Location: ../public/index.php?route=administration');
     }


     public function publishComment($commentId)       
     {
           $this->commentManager->publishComment($commentId);
           $this->session->set('comment_publish', 'bien ajouter');
           header('Location: ../public/index.php?route=administration');
      }
  
  
     public function pauseComment($commentId)
       {
        
          $this->commentManager->pauseComment($commentId);
           $this->session->set('comment_nopublish', 'non publier');
          header('Location: ../public/index.php?route=administration');
       }




}