<?php $this->_title = 'liste des posts'; ?>
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <?php

      foreach ($articles as $article)
       {
        ?>

        <div class="post-preview">
       
         <h2 class="post-title"><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getIdArticle());?>"></h2>
         <?= htmlspecialchars($article->getTitle());?></a></h2>
         <p class="post-subtitle"><?= htmlspecialchars($article->getChapo());?></p>
         <p><?= htmlspecialchars($article->getContent());?></p>
         <p class="post-meta"><?= htmlspecialchars($article->getCreateDate());?></p>
         <p class="post-meta"><?= htmlspecialchars($article->getUpdateDate());?></p>

        </div>
    </div>
 </div>
 <?php
}
?>