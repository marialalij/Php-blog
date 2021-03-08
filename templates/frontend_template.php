<?php
require '../vendor/autoload.php';
use App\src\entity;
use App\src\model\ArticleManager;
use App\src\model\CommentManager;
use App\src\model\UserManager;
use App\config\Parameter;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title><?= $title ?></title>
<!-- Bootstrap core CSS -->
<link href="../../../public/startbootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom fonts for this template -->
<link href="../../../public/startbootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Custom styles for this template -->
<link href="../../../public/startbootstrap/css/clean-blog.css" rel="stylesheet">
<link href="../../../public/startbootstrap/css/clean-blog.min.css" rel="stylesheet">
<link href="../../../public/style/style.css" rel ="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
          <a class="navbar-brand js-scroll-trigger" href="../public/index.php"><i class="fab fa-maxcdn"></i></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              Menu
               <i class="fas fa-bars"></i>
             </button> 
           <div class="collapse navbar-collapse" id="navbarResponsive">
             <ul class="navbar-nav ml-auto">
               <li class="nav-item">
               <a class="nav-link"  href="../../../public/index.php">a propos de moi</a>
               </li>
               <li class="nav-item">
               <a class="nav-link" href="../../../public/index.php?route=about">blog</a>
               </li>
               <li class="nav-item">
               <a class="nav-link" href="../../../public/index.php?route=contact" href="contact.html">Contactez-Moi</a>
               </li>
                <?php 
                if ($this->session->get('pseudo')) {
                ?>

            <li class="nav-item dropdown no-arrow nav-avatar">
               <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Bonjour, <?= htmlspecialchars($session->get('pseudo'), ENT_QUOTES); ?>
               </a>
                              
               <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="../../../public/index.php?route=profile"<?= htmlspecialchars($session->get('iduser'), ENT_QUOTES); ?>>
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Mon profil
                  </a>

                 <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="../../../public/index.php?route=logout">
                   <i class="fas fa-sign-out-alt text-gray-400"></i>
                    deconnexion
                   </a>
  
                 <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../../../public/index.php?route=addArticle">
                  <i class="fas fa-plus-circle text-gray-400"></i>
                   nouvel article
                  </a>  
                  <?php if($this->session->get('role') === 'admin') { ?>  
                  <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="../../../public/index.php?route=administration">
                   <i class="fas fa-users-cog text-gray-400"></i>
                   administartion
                  </a>    
                   <?php
                    }
                   ?>
              </div>
          </li>
          <?php
           } else {
            ?>
           <li class="nav-item">
             <a class="nav-link"  href="../../../public/index.php?route=login">se  connecter</a>
           </li>     
          <?php
            }
          ?>
         </ul>
       </div>
     </div>
    </nav>

 <!-- Page Header -->
 <header class="masthead" style="background-image: url('../../../public/startbootstrap/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Maria lalij</h1>
            <span class="subheading"></span>
            <span class="subheading">Celui qui bloque ta réussite c'est toi même.</span>
          </div>
        </div>
      </div>
    </div>
  </header>
    <div id="content">
        <?= $content ?>
    </div>

      <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="https://www.linkedin.com/in/maria-lalij/"target="_blank">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-linkedin-in fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://github.com/marialalij/" target="_blank">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Your Website 2021</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../../../public/startbootstrap/vendor/jquery/jquery.min.js"></script>
  <script src="../../../public/startbootstrap/vendor/jquery/jquery.min.slim.js"></script>
  <script src="../../../public/startbootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Custom scripts for this template -->
  <script src="../../../public/startbootstrap/js/clean-blog.min.js"></script>
</body>
</html>