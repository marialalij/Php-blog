
<?php
$route = isset($post) && $post->get('idarticle') ? 'editComment' : 'addComment';
$submit = $route === 'addComment' ? 'Ajouter' : 'Mettre à jour';
?>
<form action="../public/index.php?route=<?= $route; ?>&articleId=<?= htmlspecialchars($article->getIdArticle()) ?>"
      method="post">
    <label for="content">
        <textarea name="content" id="content" cols="30" rows="10" placeholder="Votre commentaire"><?= isset($post) ? htmlspecialchars($post->get('content')): ''; ?></textarea>
        <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    </label><br>
    <input type="submit" value="<?= $submit; ?>" name="submit" id="submit">
</form>