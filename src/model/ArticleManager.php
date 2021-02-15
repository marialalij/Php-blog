<?php
namespace App\src\model;
use App\config\Parameter;
use App\src\entity\Article;


class ArticleManager extends Manager
{

    private function buildObject($row)
    {
        $article = new Article();
        $article->setIdArticle($row['idarticle']);
        $article->setTitle($row['title']);
        $article->setChapo($row['chapo']);
        $article->setContent($row['content']);
        $article->setCreateDate($row['create_date']);
        $article->setUpdateDate($row['update_date']);
        return $article;
    }

    public function getArticles()
    {
        $sql = 'SELECT idarticle, title, chapo, content, create_date, update_date FROM article ORDER BY idarticle DESC';
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
        $sql = 'SELECT idarticle, title, chapo, content, create_date, update_date FROM article WHERE idarticle= ?';
        $result = $this->createQuery($sql,[$articleId]);
        $article = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($article);
    }


    
    public function addArticle($post)
    {
        $sql = 'INSERT INTO article (title, chapo, content, create_date, update_date ) VALUES (?, ?, ?, NOW(), NOW())';
        $this->createQuery($sql, [$post->get('title'), $post->get('chapo'), $post->get('content')]);
    }


    public function editArticle(Parameter $post, $articleId)
    {
        $sql = 'UPDATE article SET title=:title, chapo=:chapo,  content=:content WHERE idarticle=:articleId';
        $this->createQuery($sql, [
            'title' => $post->get('title'),
            'chapo' => $post->get('chapo'),
            'content' => $post->get('content'),
            'idarticle' => $articleId
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

