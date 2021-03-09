<?php $this->_title = 'Contactez moi'; ?>
<?php include 'sendemail.php'; ?>
<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Contact Me</h1>
            <span class="subheading">Avoir des questions? J'ai des réponses..</span>
          </div>
        </div>
      </div>
</div>
<?php echo $alert; ?>
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Vous souhaitez nous contacter? Remplissez le formulaire ci-dessous pour m'envoyer un message et je vous répondrai dans les plus brefs délais!</p>
        <form class="contact" action="" method="post">
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Name</label>
              <input type="text" name="name" class="form-control" placeholder="votre Nom" required>
              <p class="help-block text-danger"></p>
            </div>
          </div>        
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email Address</label>
              <input type="email" name="email" class="form-control" placeholder="votre Email" required>
              <p class="help-block text-danger"></p>
            </div>
          </div>     
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Message</label>
              <textarea name="message" rows="5"  class="form-control" placeholder="votre Message" required></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <input type="submit"  class="btn btn-primary" name="submit" value="Send">
        </form>
      </div>
    </div>
  </div>


