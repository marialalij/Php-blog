<?php $this->title = "Inscription"; ?>
<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>inscrivez-vous</h1>
          </div>
        </div>
      </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
       <form method="post" action="../public/index.php?route=register">
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label for="pseudo">Pseudo</label><br>
              <input type="text" id="pseudo" name="pseudo" class="form-control" placeholder="pseudo"  required data-validation-required-message="Please enter your pseudo."
               value="<?= isset($post) ? htmlspecialchars($post->get('pseudo'), ENT_QUOTES): ''; ?>"><br>
              <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label for="email">Email</label><br>
              <input type="text" id="email" name="email" class="form-control" placeholder="email"  required data-validation-required-message="Please enter your email."
               value="<?= isset($post) ? htmlspecialchars($post->get('email'), ENT_QUOTES): ''; ?>"><br>
              <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label for="first_name">Prenom</label><br>
              <input type="first_name" id="first_name" name="first_name" class="form-control" placeholder="name"  required data-validation-required-message="Please enter your name."
               value="<?= isset($post) ? htmlspecialchars($post->get('first_name'),ENT_QUOTES): ''; ?>"><br>
              <?= isset($errors['first_name']) ? $errors['first_name'] : ''; ?>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label for="last_name">Nom</label><br>
              <input type="text" id="last_name" name="last_name" class="form-control" placeholder="last name"  required data-validation-required-message="Please enter your last name."
               value="<?= isset($post) ? htmlspecialchars($post->get('last_name'),ENT_QUOTES): ''; ?>"><br>
              <?= isset($errors['last_name']) ? $errors['last_name'] : ''; ?>
            </div>
          </div>  
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label for="password">Mot de passe</label><br>
               <input type="password" id="password" name="password" class="form-control" placeholder="password"  required data-validation-required-message="Please enter your password."><br>
               <?= isset($errors['password']) ? $errors['password'] : ''; ?>
            </div>
          </div>
          <input type="submit" value="Inscription" i class="btn btn-primary" id="submit" name="submit">     
        </form> 
    </div>
  </div>
</div>
