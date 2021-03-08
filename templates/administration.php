<?php $this->title = 'Administration'; ?>
<link href="../public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<!-- Custom styles for this template-->
<link href="../public/admin/css/sb-admin-2.css" rel="stylesheet">

</head>
<h2 class="mb-5"> Mon espace administration</h2>
<h3 class="mb-5"> Mes articles</h3>
<?= $this->session->show('add_article'); ?>
<?= $this->session->show('edit_article'); ?>
<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('delete_comment'); ?>
<?= $this->session->show('delete_user'); ?>
<div class="collapse show" id="recentPostsCard">
    <div class="card-body">
        <table class="table table-hover table-responsive">
            <thead>
              <tr>
                <th scope="col" class="responsive-table-custom">Id</th>
                <th scope="col">Titre</th>
                <th scope="col">chapo</th>
                <th scope="col">Contenu</th>
                <th scope="col">Auteur</th>
                <th scope="col" class="responsive-table-custom">Date de modification</th>
                <th scope="col">status</th>
                <th scope="col">actions</th>
                <th scope="col">changer status</th>
              </tr>
            </thead>
                  <tbody>
                    <?php
                      foreach ($articles as $article)
                         {
                    ?>
                      <th scope="row"  class="responsive-table-custom"><?= htmlspecialchars($article->getIdArticle(), ENT_QUOTES); ?></th>
                        <td><?= htmlspecialchars($article->getTitle(), ENT_QUOTES); ?></td>
                        <td><?= htmlspecialchars($article->getChapo(), ENT_QUOTES); ?></td>
                        <td><?= substr(htmlspecialchars($article->getContent(), ENT_QUOTES), 0, 50); ?>...</td>
                        <td><?= htmlspecialchars($article->getAuthor(), ENT_QUOTES); ?></td>
                        <td class="responsive-table-custom"><?= $article->getUpdateDate(); ?></td>
                        <td><?= htmlspecialchars($article->getStatus(), ENT_QUOTES); ?></td>
                        <td>
                            <a href="../public/index.php?route=editArticle&articleId=<?= htmlspecialchars ($article->getIdArticle(), ENT_QUOTES); ?>" class="btn btn-outline-dark btn-sm" title="Modifier">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="../public/index.php?route=deleteArticle&articleId=<?= htmlspecialchars ($article->getIdArticle(), ENT_QUOTES); ?>" class="btn btn-outline-dark btn-sm" title="Supprimer">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                        <td>
                          <?php
                            if ($article->getstatus() == 1)
                            {
                          ?>
                           <div>
                              <a href="../public/index.php?route=nopublishArticle&articleId=<?=htmlspecialchars ($article->getIdArticle(), ENT_QUOTES); ?>"> <input type="button" class="btn btn-primary btn-lg" value="Mettre en attente"> </a>
                           </div>
                          <?php 
                            } 
                          ?>
                          <?php
                             if ($article->getstatus() == 2)
                            {
                          ?>
                           <div>
                              <a href="../public/index.php?route=publishArticle&articleId=<?=htmlspecialchars ($article->getIdArticle(), ENT_QUOTES); ?>"> <input type="button" class="btn btn-primary btn-lg" value="Publier"> </a>
                           </div>
                          <?php
                            } 
                          ?>
                       </td>      
                  </tbody>
                <?php
                  }
                ?>
         </table>
    </div>
</div>
<h3 class="mb-5">Utilisateurs</h3>
<div class="collapse show" id="recentPostsCard">
   <div class="card-body">
      <table class="table table-hover table-responsive">
          <thead>
              <tr>
                <th scope="col" class="responsive-table-custom">Id</th>
                <th scope="col">pseudo</th>
                <th scope="col">role</th>
                <th scope="col">Action</th>
              </tr>
          </thead>
          <tbody>
           <?php
             foreach ($users as $user)
            {
           ?>
            <th scope="row"  class="responsive-table-custom"><?= htmlspecialchars($user->getIdUser(), ENT_QUOTES); ?></th>
               <td><?= htmlspecialchars($user->getPseudo(), ENT_QUOTES); ?></td>
               <td><?= htmlspecialchars($user->getRole(), ENT_QUOTES); ?></td>
               <td>
           
                 <?php
                  if($user->getRole() != 'admin') {
                 ?>
                   <a href="../public/index.php?route=deleteUser&userId=<?= htmlspecialchars($user->getIdUser(), ENT_QUOTES); ?>" class="btn btn-outline-dark btn-sm" title="Supprimer">
                             <i class="fas fa-trash-alt"></i>
                <?php
                 }
                else{
                ?>
                Suppression impossible
                <?php
                 }
                ?>
               </td>                              
          </tbody>
            <?php
             }
             ?>
      </table>
    </div>
</div>

<h2>Commentaires</h2>
  <div class="collapse show" id="recentPostsCard">
    <div class="card-body">
        <table class="table table-hover table-responsive">
          <thead>
            <tr>
              <th scope="col" class="responsive-table-custom">Id</th>
              <th scope="col">message</th>
              <th scope="col" class="responsive-table-custom">Date de création</th>
              <th scope="col">status</th>
              <th scope="col">Action</th>
              <th scope="col">changer le status</th>
              </tr>
          </thead>
          <tbody>
            <?php
             foreach ($comments as $comment)
               {
            ?>
              <th scope="row"class="responsive-table-custom"><?= htmlspecialchars($comment->getIdComment(), ENT_QUOTES); ?></th>
                <td><?= htmlspecialchars($comment->getContent(), ENT_QUOTES); ?></td>
                <td><?= htmlspecialchars($comment->getCommentDate(), ENT_QUOTES); ?></td>
                <td><?= htmlspecialchars($comment->getStatus(), ENT_QUOTES); ?></td>
                <td>
                <a href="../public/index.php?route=deleteComment&commentId=<?=htmlspecialchars($comment->getIdComment(),ENT_QUOTES); ?>" class="btn btn-outline-dark btn-sm" title="Supprimer">
                <i class="fas fa-trash-alt"></i>
                </td>
                <td>
                  <?php
                      if ($comment->getstatus() == 1)
                      {
                  ?>
                     <div>
                       <a href="../public/index.php?route=nopublishComment&commentId=<?=htmlspecialchars($comment->getIdComment(),ENT_QUOTES);?>"> <input type="button" class="btn btn-primary btn-lg" value="Mettre en attente"> </a>
                     </div>
                     <?php
                      } 
                     ?>
                     <?php
                       if ($comment->getstatus() == 2)
                       {
                     ?>
                      <div>
                        <a href="../public/index.php?route=publishComment&commentId=<?=htmlspecialchars($comment->getIdComment(),ENT_QUOTES);?>"> <input type="button" class="btn btn-primary btn-lg" value="Publier"> </a>
                      </div>
                      <?php 
                        }
                      ?>
                </td> 
          </tbody>
          <?php
           }
          ?>
       </table>
    </div>
</div>