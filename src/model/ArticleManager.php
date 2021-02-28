<?php
namespace App\src\model;
use App\config\Parameter;
use App\src\entity\Article;
use App\src\model\UserManager;


class ArticleManager extends Manager
{

    private function buildObject($row)
    {
        $article = new Article();
        $article->setIdArticle($row['idarticle']);
        $article->setTitle($row['title']);
        $article->setChapo($row['chapo']);
        $article->setContent($row['content']);
        $article->setAuthor($row['pseudo']);
        $article->setUpdateDate($row['update_date']);
        return $article;
    }

    public function getArticles()
    {
        $sql = 'SELECT article.idarticle, article.title, article.chapo, article.content, user.pseudo, article.update_date FROM article INNER JOIN user ON article.user_iduser = user.iduser ORDER BY article.idarticle DESC';
        $result = $this->createQuery($sql);
        $articles = [];
        foreach ($result as $row){
            $articleId = $row['idarticle'];
            $articles[$articleId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $articles;
    }

    public function getArticle($articleId)
    {
        $sql = 'SELECT article.idarticle, article.title, article.chapo, article.content, user.pseudo, article.update_date FROM article INNER JOIN user ON article.user_iduser = user.iduser WHERE article.idarticle = ?';
        $result = $this->createQuery($sql,[$articleId]);
        $article = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($article);
    }


    public function addArticle(Parameter $post)
    {
        $sql = 'INSERT INTO article (title, chapo, content, update_date, user_iduser)
         VALUES (?, ?, ?, NOW(),?)';
        $this->createQuery($sql, [$post->get('title'), $post->get('chapo'), 
        $post->get('content'), $_SESSION['iduser'] ]);
    }


    public function editArticle(Parameter $post, $articleId)
    {
        $sql = 'UPDATE article SET title=:title, chapo=:chapo, content=:content WHERE idarticle=:articleId';
        $this->createQuery($sql, [
            'title' => $post->get('title'),
            'chapo' => $post->get('chapo'),
            'content' => $post->get('content'),
            'articleId' => $articleId
        ]);
    }

    public function deleteArticle($articleId)
    {
        $sql = 'DELETE FROM comment WHERE article_idarticle = ?';
        $this->createQuery($sql, [$articleId]);
        $sql = 'DELETE FROM article WHERE idarticle = ?';
        $this->createQuery($sql, [$articleId]);
    }
}

