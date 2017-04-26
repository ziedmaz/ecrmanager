<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ECR Manager </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">

        <?php 
          if(isset($_GET['mdpm']))
            {
             if($_GET['mdpm']==1)
                {
                ?>
                  <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Succès!</strong></br> Une demande à été envoyée à votre leader.</br> Votre compte sera activé lors de sa confirmation.
                  </div> 
                             
                <?php
                }
            }
          if(isset($_GET['nc']))
            {
              ?>
                <div class="alert alert-warning alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  Veuillez vous connecter avant d'accéder au plateforme. 
                </div> 
                           
              <?php
            }
          if(isset($_GET['con']))
            {
             if($_GET['con']==0)
                {
                ?>
                  <div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Connection interrompue </strong></br> Veuillez verifier vos identifiants et réessayer .
                  </div> 
                             
                <?php
                }
            }
          ?> 

          <section class="login_content">
            <form action="connection_uti.php" method="post">
              <h1>Se Connecter</h1>
              <div>
                <input name="nomUti" type="text" class="form-control" placeholder="Nom d'Utilisateur" required="" />
              </div>
              <div>
                <input name="mdp" type="password" class="form-control" placeholder="Mot de Passe" required="" />
              </div>
              <div>
                <button class="btn btn-default submit" >Se Connecter</button>
                <a class="reset_pass" href="#">Mot de Passe Perdu ?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Nouveau Responsable ?
                  <a href="#signup" class="to_register"> Créer Un Compte </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> ECR Manager</h1>
                  <p>©2017 Tout droits réservés. ECR Manager Est Un Produit Elaboré Par Un Etudiant Enibien !. Confidentialité et Conditions</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">

        <?php 
          if(isset($_GET['mdpm']))
            {
              if($_GET['mdpm']==0)
                {
                ?>
                  <div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Attention</strong> les mot de passe insérés ne sont pas identiques
                  </div> 
                             
                <?php
                }
              elseif ($_GET['mdpm']==2) 
              {
              ?>
                <div class="alert alert-warning alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong>Attention</strong> Cet utilisateur existe déjà ! veuillez changer l'email.
                </div> 
              <?php
              }
            }
          ?> 
          <section class="login_content">
            <form action="register.php" method="post">
              <h1>Créer Un Compte</h1>
              <div>
                <input name="nomUti" type="text" class="form-control" placeholder="Nom d'Utilisateur" required="" />
              </div>
              <div>
                <input name="email" type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input name="mdp" type="password" class="form-control" placeholder="Mot de Passe" required="" />
              </div>
              <div>
                <input name="verif_mdp" type="password" class="form-control" placeholder="Confirmer le Mot de Passe" required="" />
              </div>
              <div>
                <button class="btn btn-default submit">Valider</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Déjà Membre ?
                  <a href="#signin" class="to_register"> Se Connecter </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> ECR manager</h1>
                  <p>©2017 Tout droits réservés. ECR Manager Est Un Produit Elaboré Par Un Etudiant Enibien !. Confidentialité et Conditions</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>
  </body>
</html>
