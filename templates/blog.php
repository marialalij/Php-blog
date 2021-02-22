<?php $this->_title = 'liste des posts'; ?>
<?= $this->session->show('add_article'); ?>
<?= $this->session->show('edit_article'); ?>
<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('add_comment'); ?>
<?= $this->session->show('flag_comment'); ?>
<?= $this->session->show('delete_comment'); ?>
<?= $this->session->show('register'); ?>
<?= $this->session->show('login'); ?>

      <?php

      foreach ($articles as $article)
       {
        ?>
 <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
       
         <h2 class="post-title"><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getIdArticle());?>"></h2>
         <?= htmlspecialchars($article->getTitle());?></a></h2>
         <h3 class="post-subtitle"><?= htmlspecialchars($article->getChapo());?></h3>
         <p><?= htmlspecialchars($article->getContent());?></p>
         <p class="post-meta"><?= htmlspecialchars($article->getUpdateDate());?></p>

        </div>
    </div>
 </div>
</div>
 <?php
}
?>

