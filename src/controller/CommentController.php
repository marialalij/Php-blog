<?php
namespace App\src\controller;
use App\config\Parameter;


class CommentController extends Controller
{
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

    public function publishComment($commentId)       
    {
          $this->commentManager->publishComment($commentId);
          $this->session->set('comment_publish', 'bien ajouter');
          header('Location: ../public/index.php?route=administration');
     }
 
 
    public function nopublishComment($commentId)
      {
       
         $this->commentManager->nopublishComment($commentId);
          $this->session->set('comment_nopublish', 'non publier');
         header('Location: ../public/index.php?route=administration');
      }

      

    public function deleteComment($commentId)
    {
        $this->commentManager->deleteComment($commentId);
        $this->session->set('delete_comment', 'Le commentaire a bien été supprimé');
        header('Location: ../public/index.php?route=administration');
    }






}