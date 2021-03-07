<?php
namespace App\src\model;
use App\config\Parameter;
use App\src\entity\Comment;


/**
 * Class that manages comments on the site.
 */
class CommentManager extends Manager
{
private function buildObject($row)
    {
        $comment = new Comment();
        $comment->setIdComment($row['idcomment']);
        $comment->setContent($row['content']);
        $comment->setCommentDate($row['comment_date']);
        $comment->setStatus($row['status']);
        return $comment;
    }
  
/**
*Retrieval of comments associated with an article
*/

    public function getComments($articleId)
    {
        $sql = 'SELECT idcomment, content, comment_date, status FROM comment WHERE article_idarticle= ? and comment.status = 1 ORDER BY comment_date DESC';
        $result = $this->createQuery($sql, [$articleId]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['idcomment'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }
   
    /**
    * Addition of an article in the database
    */

    public function addComment(Parameter $post, $articleId)
    {
        $sql = 'INSERT INTO comment (content, comment_date, article_idarticle, comment.status) VALUES (?, NOW(), ?,2)';
        $this->createQuery($sql, [$post->get('content'), $articleId]);
    }


    /**
    * Deletion of the comment with identifier commentId in the database
    * @param $commentId mixed Identifier of the comment concerned
    */

    public function deleteComment($commentId)
    {
        $sql = 'DELETE FROM comment WHERE idcomment = ?';
        $this->createQuery($sql, [$commentId]);
    }

    // display all comments 

    public function getAllComments()
    {
        $sql = 'SELECT idcomment, content, comment_date, status FROM comment ORDER BY comment_date DESC';
        $result = $this->createQuery($sql);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['idcomment'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;    
}
//publish comment
public function publishComment($commentId)
{
   $sql = 'UPDATE comment SET comment.status = 1 WHERE idcomment = ?';
   $this->createQuery($sql,[$commentId]);

}
//np publish comment
public function nopublishComment($commentId)
{
 $sql = 'UPDATE comment SET comment.status = 2 WHERE idcomment = ?';
 $this->createQuery($sql, [$commentId]); 
}

}