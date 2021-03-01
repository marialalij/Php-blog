<?php $this->title = 'Administration'; ?>
<link href="../public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../public/admin/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom css -->

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

</head>
<h2> Mon espace administration</h2>
<h3> Mes articles</h3>

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
                            <th scope="col" class="responsive-table-custom">Date de création</th>
                            <th scope="col">Action</th>
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
                                <td>
                                
                           
                                    <a href="../public/index.php?route=editArticle&articleId<?= $article->getIdArticle() ?>" class="btn btn-outline-dark btn-sm" title="Modifier">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="../public/index.php?route=deleteArticle&articleId=<?= $article->getIdArticle(); ?>" class="btn btn-outline-dark btn-sm" title="Supprimer">
                                        <i class="fas fa-trash-alt"></i>
            
                                    </a>
                                  
                                </td>
                           
                        </tbody>
                        <?php
                            }
                            ?>
                    </table>
                </div>
            </div>
<h3>Utilisateurs</h3>
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
                <a href="../public/index.php?route=deleteUser&userId=<?= $user->getIdUser(); ?>" class="btn btn-outline-dark btn-sm" title="Supprimer">
                             <i class="fas fa-trash-alt"></i>
                <?php }
                else {
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
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
    <?php
    foreach ($comments as $comment)
    {
        ?>
       <th scope="row"  class="responsive-table-custom"><?= htmlspecialchars($comment->getIdComment(), ENT_QUOTES); ?></th>
        <td><?= htmlspecialchars($comment->getContent(), ENT_QUOTES); ?></td>
        <td><?= htmlspecialchars($comment->getCommentDate(), ENT_QUOTES); ?></td>
        <td>
            
                
                <a href="../public/index.php?route=deleteComment&commentId=<?= $comment->getIdComment(); ?>" class="btn btn-outline-dark btn-sm" title="Supprimer">
                             <i class="fas fa-trash-alt"></i>
         </td>
         </tbody>
                        <?php
                            }
                            ?>
                    </table>
                </div>
            </div>

<script src="../../public/admin/vendor/jquery/jquery.min.js"></script>
    <script src="../public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../public/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../public/admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../public/admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../public/admin/js/demo/chart-area-demo.js"></script>
    <script src="../public/admin/js/demo/chart-pie-demo.js"></script>

    <!-- Custom JS -->
    <!--<script type="text/javascript" src="public/js/customjs.js" rel="stylesheet" />"></script>-->