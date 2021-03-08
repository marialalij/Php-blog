<?php
$route = isset($post) && $post->get('idarticle') ? 'editComment' : 'addComment';
$submit = $route === 'addComment' ? 'Ajouter' : 'Mettre à jour';
?>
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <form action="../public/index.php?route=<?= $route; ?>&articleId=<?= htmlspecialchars($article->getIdArticle()) ?>"method="post">
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
           <label for="comment">Votre commentaire</label>
           <textarea name="content" id="content" class="form-control" placeholder="votre commentaire"><?= isset($post) ? htmlspecialchars($post->get('content')): ''; ?></textarea>
           <?= isset($errors['content']) ? $errors['content'] : ''; ?>    
          </div>
       </div>
        <br>
       <input type="submit" value="<?= $submit; ?>" id="submit" class="btn btn-primary" name="submit">
      </form>
    </div>
  </div>
</div>


       
     