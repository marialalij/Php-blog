<?php $this->title = "Connexion"; ?>
<?= $this->session->show('error_login'); ?>   

<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Contectez-vous</h1>
          </div>
        </div>
      </div>
</div>
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
  <a href="../public/index.php?route=register">Pas encore inscrit ? C'est par ici</a>

    <form method="post" action="../public/index.php?route=login" id="contactForm">
    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo"class="form-control" placeholder="pseudo" id="name" required data-validation-required-message="Please enter your pseudo."
         value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
         <p class="help-block text-danger"></p>
       </div>
    </div>
    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" class="form-control" placeholder="password" required data-validation-required-message="Please enter your password." name="password"><br>
        <p class="help-block text-danger"></p>
   </div>
    </div>
    <input type="submit" value="Connexion" i class="btn btn-primary" id="submit" name="submit"> 
    </form>
</div>
</div>
</div>

