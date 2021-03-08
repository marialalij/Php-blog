<?php
namespace App\src\model;
use App\config\Parameter;
use App\src\entity\Article;
use App\src\model\UserManager;

/**
 * Class ArticleManager manages the operations carried out on the articles.
 * Inherits from the Manager class
 */

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
        $article->setStatus($row['status']);
        return $article;
    }
      
/**
* Returns the result of the query for all articles
* sorted in descending order according to the idarticle.
* @return array Array of Database Article
*/
    public function getArticles()
    {
        $sql = 'SELECT article.idarticle, article.title, article.chapo, article.content, user.pseudo, article.update_date, article.status FROM article INNER JOIN user ON article.user_iduser = user.iduser and article.status =1  ORDER BY article.update_date DESC';
        $result = $this->createQuery($sql);
        $articles = [];
        foreach ($result as $row){
            $articleId = $row['idarticle'];
            $articles[$articleId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $articles;
    }

    //display all articles
    public function getalladministration()
    {
        $sql = 'SELECT article.idarticle, article.title, article.chapo, article.content, user.pseudo, article.update_date, article.status FROM article INNER JOIN user ON article.user_iduser = user.iduser ORDER BY article.update_date DESC';
        $result = $this->createQuery($sql);
        $articles = [];
        foreach ($result as $row){
            $articleId = $row['idarticle'];
            $articles[$articleId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $articles;
    }
    
/**
* Retrieval of an article following  idarticle in the database
* @param $articleId int Identifier of the article concerned
* @return Article Insntace of Article retrieved from the database
*/

    public function getArticle($articleId)
    {
        $sql = 'SELECT article.idarticle, article.title, article.chapo, article.content, user.pseudo, article.update_date, article.status  FROM article INNER JOIN user ON article.user_iduser = user.iduser WHERE article.idarticle = ?';
        $result = $this->createQuery($sql,[$articleId]);
        $article = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($article);
    }


    /**
    * Addition of an article in the database
    * @param $post Parameter Data of the article to be inserted in the database
    */
    public function addArticle(Parameter $post)
    {
        $sql = 'INSERT INTO article (title, chapo, content, update_date, author, user_iduser, article.status)
         VALUES (?, ?, ?, NOW(),?,?,2)';
        $this->createQuery($sql, [$post->get('title'), $post->get('chapo'), 
        $post->get('content'), $post->get('author'), $_SESSION['iduser'] ]);
    }

//publish Article for admin
    public function publishArticle($articleId)
    {
       $sql = 'UPDATE article SET article.status = 1 WHERE idarticle = ?';
       $this->createQuery($sql,[$articleId]);
   
    }
// no  publish Article for admin
    public function nopublishArticle($articleId)
    {
     $sql = 'UPDATE article SET article.status = 2 WHERE idarticle = ?';
     $this->createQuery($sql, [$articleId]);  
    }

/**
* Update of an article in the database with the data received
* @param Parameter $post Data updated
*/
    public function editArticle(Parameter $post, $articleId)
    {
        $sql = 'UPDATE article SET title=:title, chapo=:chapo, content=:content, update_date = NOW() WHERE idarticle=:articleId';
        $this->createQuery($sql, [
            'title' => $post->get('title'),
            'chapo' => $post->get('chapo'),
            'content' => $post->get('content'),
            'articleId' => $articleId,
        ]);
    }
   
/**
* Deletion of an article in the database
* Attention, an fk associates the articles with the comments
* So you have to delete the comments and the article to delete an article
* @param $articleId int Identifier of the article
*/
    public function deleteArticle($articleId)
    {
        $sql = 'DELETE FROM comment WHERE article_idarticle = ?';
        $this->createQuery($sql, [$articleId]);
        $sql = 'DELETE FROM article WHERE idarticle = ?';
        $this->createQuery($sql, [$articleId]);
    }
}

