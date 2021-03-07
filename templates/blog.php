<?php $this->_title = 'liste des posts'; ?>
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
              <p><?= htmlspecialchars($article->getAuthor());?></p>
              <p class="post-meta"><?= htmlspecialchars($article->getUpdateDate());?></p>
        </div>
      </div>
   </div>
 </div>

 <?php
  }
 ?>

