 <html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Core theme CSS (includes Bootstrap)-->
        
        <link href="../../style/boost/css/styles.css" rel="stylesheet"/>

        
    </head>
   <div class="masthead connexionSection">
    <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center">
            <h1 class="mx-auto mb-3 text-uppercase">Welcome!</h1>
            <h2 class="text-white-50 mx-auto mt-2 mb-3">Se connecter | S'inscrire</h2>
            <form class="form-inline d-flex flex-column" >
                <input type="text" name="pseudo" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" placeholder="Votre pseudo " required>
                <input type="email" name="email" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" placeholder="Votre adresse" required>
                <input type="password" name="pass1" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" placeholder="Votre mot de passe" required>
                <input type="password" name="pass2" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" placeholder="Retapez votre mot de passe" required>
                <button type="submit" class="btn  btn-info mx-auto">S'inscrire</button>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="confidentiality" id="confidentiality" required/>
                    <label class="form-check-label text-white-50" for="confidentiality" >* J'ai lu et j'accepte la <a href="index.php?action=confidentiality"> Politique de confidentialité des données personnelles</a></label>
                </div>
                <p class="text-white-50">Vous avez déjà un compte ? <a href="index.php?action=connexionView">Connectez-vous !</a></p>
            </form>
        </div>
    </div>
</div>
</html>