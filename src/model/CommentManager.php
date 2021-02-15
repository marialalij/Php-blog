<?php
namespace App\src\model;


use App\config\Parameter;
use App\src\entity\Comment;

class CommentManager extends Manager
{
private function buildObject($row)
    {
        $comment = new Comment();
        $comment->setIdComment($row['idcomment']);
        $comment->setContent($row['content']);
        $comment->setCommentDate($row['comment_date']);
        return $comment;
    }

    public function getComments($postId)
    {
        $sql = 'SELECT idcomment, content, comment_date FROM comment WHERE article_idarticle= ? ORDER BY comment_date DESC';
        $result = $this->createQuery($sql, [$postId]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['idcomment'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }


    public function addComment(Parameter $post, $articleId)
    {
        $sql = 'INSERT INTO comment (content, comment_date, article_idarticle) VALUES (?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('content'), $articleId]);
    }



    public function deleteComment($commentId)
    {
        $sql = 'DELETE FROM comment WHERE idcomment = ?';
        $this->createQuery($sql, [$commentId]);
    }
}