<?php
namespace App\src\controller;
use App\config\Parameter;
class CommentController extends Controller
{
    

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