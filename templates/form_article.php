<?php
/**
 * Si existance d'un article, alors on affiche ses données pré-remplies => modification
 * Sinon champs vide => insertion
 * Affichage des erreurs de validation des données sous les champs correspondants
 *
 * La route générée est :
 * Si données POST : edition donc editArticle pour modification
 * Si pas de données POST : addArticle pour ajout
 */

$route = isset($post) && $post->get('idarticle') ? 'editArticle&articleId=' . $post->get('idarticle') : 'addArticle';
$title = isset($post) ? htmlspecialchars($post->get('title')) : '';
$chapo = isset($post) ? htmlspecialchars($post->get('chapo')) : '';
$content = isset($post) ? htmlspecialchars($post->get('content')) : '';
$submit = $route === 'addArticle' ? 'Envoyer' : 'Mettre à jour';
?>
<form action="../public/index.php?route=<?= $route; ?>" method="post">
    <label for="title">Titre</label><br>
    <input type="text" id="title" name="title" value="<?= $title; ?>"><br>
    <?= isset($errors['title']) ? $errors['title'] : '' ?>

    <label for="chapo">chapo</label><br>
    <input type="text" id="chapo" name="chapo" value="<?= $chapo; ?>"><br>
    <?= isset($errors['chapo']) ? $errors['chapo'] : '' ?>

    <label for="content">Contenu</label><br>
    <textarea name="content" id="contenu" cols="30" rows="10"><?= $content; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : '' ?>
    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>