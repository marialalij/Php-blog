<?php $this->title = "Article" ;?>
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
          <h2 class="post-title"><?= htmlspecialchars($article->getTitle());?></h2>
          <p class="post-meta"><?= htmlspecialchars($article->getChapo());?></p>
          <p class="post-meta"><?= htmlspecialchars($article->getContent());?></p>
          <p class="post-meta"><?= htmlspecialchars($article->getCreateDate());?></p>
          <p class="post-meta"><?= htmlspecialchars($article->getAuthor());?></p>
          <p class="post-meta"><?= htmlspecialchars($article->getUpdateDate());?></p>
       </div> 
       <br>

        <div class="post-preview">
          <?php include('form_comment.php'); ?> 
          <br>
            <h4>Commentaires</h4>
           <br>
           <?php
            foreach ($comments as $comment)
            {
           ?>
             <h5 class="post-title"><?= htmlspecialchars($comment->getContent());?></h5>
             <p class="post-meta">Posté le <?= htmlspecialchars($comment->getCommentDate());?></p>
           <?php       
            }   
           ?>
        </div>       
      </div>
   </div>
</div
