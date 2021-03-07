<?php
namespace App\src\controller;
use App\config\Parameter;
class CommentController extends Controller
{
    
/**
* If add comment data received and data validated, insertion in DB
* If not
* @param Parameter $post
* @param $articleId
*/
   public function addComment(Parameter $post, $articleId)
    {
        $article = $this->articleManager->getArticle($articleId);
        $comments = $this->commentManager->getComments($articleId);
        
// If POST form submitted, we insert the comment if the data is valid
        if ($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Comment');
            if (!$errors) {
                $this->commentManager->addComment($post, $articleId);
                $this->session->set('add_comment', 'Le commentaire à bien été ajouté');
                header('Location: ../public/index.php?route=article&articleId=' . $articleId);
            }
                $this->view->render('single', [
                    'article' => $article,
                    'comments' => $comments,
                    'errors' => $errors,
                    'post' => $post
                ]);
        }
          // If no form submitted, redirect to home    
            header('Location: ../public/index.php');
     
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

      
/**
* Deletion of a comment in the database
* @param $commentId mixed Identifier of the comment to delete
*/

    public function deleteComment($commentId)
    {
        $this->commentManager->deleteComment($commentId);
        $this->session->set('delete_comment', 'Le commentaire a bien été supprimé');
        header('Location: ../public/index.php?route=administration');
    }
}