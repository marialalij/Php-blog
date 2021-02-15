<?php
namespace App\src\controller;

use App\config\Parameter;


class BackController extends Controller
{
    public function addArticle(Parameter $post)
    {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Article');
            if(!$errors) {
                $this->articleManager->addArticle($post);
                $this->session->set('add_article', 'Le nouvel article a bien été ajouté');
                header('Location: ../public/index.php');
            }
            return $this->view->render('add_article', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('add_article');
    }

    public function editArticle(Parameter $post, $articleId)
    {
        $article = $this->articleManager->getArticle($articleId);
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Article');
            if(!$errors) {
                $this->articleManager->editArticle($post, $articleId);
                $this->session->set('edit_article', 'L\' article a bien été modifié');
                header('Location: ../public/index.php');
            }
            return $this->view->render('edit_article', [
                'post' => $post,
                'errors' => $errors
            ]);

        }
        $post->set('idicleart', $article->getIdArticle());
        $post->set('title', $article->getTitle());
        $post->set('chapo', $article->getChapo());
        $post->set('content', $article->getContent());
       

        return $this->view->render('edit_article', [
            'post' => $post
        ]);
    }

    public function deleteArticle($articleId)
    {
        $this->articleManager->deleteArticle($articleId);
        $this->session->set('delete_article', 'L\' article a bien été supprimé');
        header('Location: ../public/index.php');
    }


    public function deleteComment($commentId)
    {
        $this->commentManager->deleteComment($commentId);
        $this->session->set('delete_comment', 'Le commentaire a bien été supprimé');
        header('Location: ../public/index.php');
    }


    public function logout()
    {
        $this->session->stop();
        $this->session->start();
        $this->session->set('logout', 'À bientôt');
        header('Location: ../public/index.php');
    }
}
