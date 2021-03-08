<?php $this->title = 'Mon profil'; ?>
<?= $this->session->show('update_password'); ?>
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
    <p>votre pseudo :<?= $this->session->get('pseudo'); ?></p>
      <p>Le mot de passe de <?= $this->session->get('pseudo'); ?> sera modifié</p>
         <form method="post" action="../public/index.php?route=updatePassword">
         <div class="control-group">
          <div class="form-group floating-label-form-group controls">
             <label for="password">Mot de passe</label><br>
              <input type="password" id="password" name="password"  class="form-control"><br>
              </div>
          </div>
              <input type="submit" value="Mettre à jour" id="submit" class="btn btn-primary" name="submit">      
         </form>
   </div>
</div>
