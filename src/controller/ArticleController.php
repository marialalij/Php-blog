<?php
namespace App\src\controller;

use App\config\Parameter;


class ArticleController extends Controller
{   
        /**
         * If a form has been submitted, we add an article with ArticleManager
         * Otherwise no data saved.
         * @param $post Parameter POST data of the form
         */
    
    public function addArticle(Parameter $post)
    {
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Article');
                if (!$errors) {
                    $this->articleManager->addArticle($post);
                    $this->session->set('add_article', 'Le nouvel article à bien été ajouté');
                    header('Location: ../public/index.php?route=administration');
                }
                    $this->view->render('add_article', [
                        'post' => $post,
                        'errors' => $errors
                    ]);             
            }

                $this->view->render('add_article');     
    }
  
    
/**
* Modification of an article in the database
* If post data is transmitted, we update,
* otherwise we display the article modification page
* @param Parameter $post Data updated
* @param $articleId mixed Identifier of the article to modify
*/
    public function editArticle(Parameter $post, $articleId)
    {
            $article = $this->articleManager->getArticle($articleId);

            if ($post->get('submit')) {
                $errors = $this->validation->validate($post,'Article');
                if (!$errors) {
                    $this->articleManager->editArticle($post, $articleId, $this->session->get('idarticle'));
                    $this->session->set('edit_article', 'L\'article à bien été mis à jour');
                    header('Location: ../public/index.php?route=administration');
                } else {
                    $this->view->render('edit_article', [
                        'post' => $post,
                        'errors' => $errors
                    ]);
                }
            } else {
                $post->set('idarticle', $article->getIdArticle());
                $post->set('title', $article->getTitle());
                $post->set('chapo', $article->getChapo());
                $post->set('content', $article->getContent());  
                $post->set('author', $article->getAuthor());      
                $this->view->render('edit_article', [
                    'post' => $post
                ]);
            }
    }
    
/**
* Deletion of an article in the database according to its identifier
* @param $articleId mixed Identifier of the article to delete
*/
    public function deleteArticle($articleId)
    {
        $this->articleManager->deleteArticle($articleId);
        $this->session->set('delete_article', 'L\' article a bien été supprimé');
        header('Location: ../public/index.php?route=administration');
    }

    public function publishArticle($articleId)
    {
         $this->articleManager->publishArticle($articleId);
          $this->session->set('article_publish', 'bien ajouter');
          header('Location: ../public/index.php?route=administration');
     }
 
    public function nopublishArticle($articleId)
      {
         $this->articleManager->nopublishArticle($articleId);
          $this->session->set('article_nopublish', 'non publier');
         header('Location: ../public/index.php?route=administration');
      }
      
/**
* Manage the display of an article and its comments
* @param $articleId mixed Identifier of the targeted article
*/
 
      public function article($articleId)
      {
          $article = $this->articleManager->getArticle($articleId);
          $comments = $this->commentManager->getComments($articleId);
          return $this->view->render('single', [
              'article' => $article,
              'comments' => $comments
          ]);

       }

}