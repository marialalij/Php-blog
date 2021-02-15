<?php $this->title = 'Accueil'; ?>
<h1>Mon blog</h1>
<p>En construction</p>
<?= $this->session->show('add_article'); ?>
<?= $this->session->show('edit_article'); ?>
<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('add_comment'); ?>
<?= $this->session->show('delete_comment'); ?>
<?= $this->session->show('register'); ?>
<?= $this->session->show('login'); ?>
<?= $this->session->show('logout'); ?>
<?php
if ($this->session->get('pseudo')) {
    ?>
    <a href="../public/index.php?route=logout">Déconnexion</a>
    <a href="../public/index.php?route=profile">Profil</a>
    <a href="../public/index.php?route=addArticle">Nouvel article</a>
    <?php
} else {
    ?>
    <a href="../public/index.php?route=register">Inscription</a>
    <a href="../public/index.php?route=login">Connexion</a>
    <?php
}
?>
<?php

foreach ($articles as $article)
{
    ?>

    <div>
       
       <h2><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getIdArticle());?>"></h2>
       <?= htmlspecialchars($article->getTitle());?></a></h2>
       <p><?= htmlspecialchars($article->getChapo());?></p>
       <p><?= htmlspecialchars($article->getContent());?></p>
       <p><?= htmlspecialchars($article->getCreateDate());?></p>
       <p><?= htmlspecialchars($article->getUpdateDate());?></p>

   </div>
    <br>
    <?php
}
?>
