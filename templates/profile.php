<?php $this->title = 'Mon profil'; ?>
<?= $this->session->show('update_password'); ?>
<div>
    <h2><?= $this->session->get('pseudo'); ?></h2>
    <p><?= $this->session->get('iduser'); ?></p>
    <a href="../public/index.php?route=updatePassword">Modifier son mot de passe</a>
</div>
<br>
