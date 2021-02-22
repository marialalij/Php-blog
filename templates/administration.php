
<?php $this->title = 'Administration'; ?>

<h1>Mon blog</h1>
<p>En construction</p>
<h2>Articles</h2>
<?= $this->session->show('add_article'); ?>
<?= $this->session->show('edit_article'); ?>
<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('delete_comment'); ?>
<?= $this->session->show('delete_user'); ?>
<table>
    <tr>
        <td>Id</td>
        <td>Titre</td>
        <td>Contenu</td>
        <td>Auteur</td>
        <td>Date</td>
        <td>Actions</td>
    </tr>
    <?php
    foreach ($articles as $article)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($article->getIdArticle());?></td>
            <td><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getIdArticle());?>"><?= htmlspecialchars($article->getTitle());?></a></td>
            <td><?= substr(htmlspecialchars($article->getContent()), 0, 150);?></td>
            <td><?= htmlspecialchars($article->getAuthor());?></td>
            <td>Créé le : <?= htmlspecialchars($article->getUpdateDate());?></td>
            <td>
                <a href="../public/index.php?route=editArticle&articleId=<?= $article->getIdArticle(); ?>">Modifier</a>
                <a href="../public/index.php?route=deleteArticle&articleId=<?= $article->getIdArticle(); ?>">Supprimer</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>



<h2>Utilisateurs</h2>
<table>
    <tr>
        <td>Id</td>
        <td>Pseudo</td>
        <td>Rôle</td>
        <td>Actions</td>
    </tr>
    <?php
    foreach ($users as $user)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($user->getIdUser());?></td>
            <td><?= htmlspecialchars($user->getPseudo());?></td>
            <td><?= htmlspecialchars($user->getRole());?></td>
            <td>
                <?php
                if($user->getRole() != 'admin') {
                ?>
                <a href="../public/index.php?route=deleteUser&userId=<?= $user->getIdUser(); ?>">Supprimer</a>
                <?php }
                else {
                    ?>
                Suppression impossible
                <?php
                }
                ?>
            </td>
        </tr>
        <?php
    }
    ?>

</table>


<h2>Commentaires</h2>
<table>
    <tr>
        <td>Id</td>
        <td>Message</td>
        <td>Date</td>
        <td>Actions</td>
    </tr>
    <?php
    foreach ($comments as $comment)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($comment->getIdComment());?></td>
            <td><?= substr(htmlspecialchars($comment->getContent()), 0, 150);?></td>
            <td>Créé le : <?= htmlspecialchars($comment->getCommentDate());?></td>
            <td>
                <a href="../public/index.php?route=deleteComment&commentId=<?= $comment->getIdComment(); ?>">Supprimer le commentaire</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

