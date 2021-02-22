<?php $this->_title = 'Contactez moi'; ?>
<?php include 'sendemail.php'; ?>

<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Contact Me</h1>
            <span class="subheading">Have questions? I have answers.</span>
          </div>
        </div>
      </div>
</div>

<?php echo $alert; ?>

<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
        <form class="contact" action="" method="post">

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Name</label>
              <input type="text" name="name" class="form-control" placeholder="Your Name" required>
              <p class="help-block text-danger"></p>
            </div>
          </div>
            
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email Address</label>
              <input type="email" name="email" class="form-control" placeholder="Your Email" required>
              <p class="help-block text-danger"></p>
            </div>
          </div>
      
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Message</label>
              <textarea name="message" rows="5"  class="form-control" placeholder="Your Message" required></textarea>
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

  <script type="text/javascript">
    if(window.history.replaceState){
      window.history.replaceState(null, null, window.location.href);
    }
    </script>


