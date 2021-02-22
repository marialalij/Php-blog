<?php $this->title = "Article" ;?>
<div>
        <h2><?= htmlspecialchars($article->getTitle());?></h2>
        <p><?= htmlspecialchars($article->getChapo());?></p>
        <p><?= htmlspecialchars($article->getContent());?></p>
        <p><?= htmlspecialchars($article->getCreateDate());?></p>
        <p><?= htmlspecialchars($article->getUpdateDate());?></p>
    </div>
<br>
<div class="actions">
    <a href="../public/index.php?route=editArticle&articleId=<?= $article->getIdArticle(); ?>">Modifier</a>
    <a href="../public/index.php?route=deleteArticle&articleId=<?= $article->getIdArticle(); ?>">Supprimer</a>
</div>
<br>
<a href="../public/index.php">Retour à l'accueil</a>
<div id="comments" class="text-left" style="margin-left: 50px">
    <?php include('form_comment.php'); ?>
    <h3>Commentaires</h3>
    <?php
    foreach ($comments as $comment)
    {
        ?>
        <h4><?= htmlspecialchars($comment->getContent());?></h4>
        <p>Posté le <?= htmlspecialchars($comment->getCommentDate());?></p>
        <?php
        
    }
    
     ?>
       <p><a href="../public/index.php?route=deleteComment&commentId=<?= $comment->getIdComment(); ?>">Supprimer le commentaire</a></p>
        <br>

</div>
