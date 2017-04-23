<?php
session_start() ;
if (isset($_SESSION['username']) && isset($_SESSION['email']) && isset($_SESSION['priorite']))
  {
    $Nutilisateur = $_SESSION['username'] ;
    $email = $_SESSION['email'] ;
    $priorite = $_SESSION['priorite'] ;    
  }
else
  {
    header('location:login.php?nc=1') ;
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ECR Manager</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.custom.min.css" rel="stylesheet">
    <!--Kartik-->
    <link href="../vendors/kartik/fileinput.min.css" rel="stylesheet" media="all" type="text/css">


    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>ECR Manager</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenue,</span>
                <h2><?php echo $Nutilisateur ?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-dashboard"></i> Tableau de bord </a>
                  </li>
                  <li><a href="profil.php"><i class="fa fa-home"></i> Profil </a>
                  </li>
                  <li><a href="to_do_list.php"><i class="fa fa-edit"></i> To do list </a>
                  </li>  
                  <li><a href="Calendrier.php"><i class="fa fa-calendar"></i> Calendrier </a>
                  </li>  
                  <li><a href="parametres.php"><i class="fa fa-cog"></i> Paramètres </a>
                  </li>                        
                  <li><a href="login.php"><i class="fa fa-sign-out"></i> Se déconnecter </a>
                  </li>
                                             
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a  href="profil.php" data-toggle="tooltip" data-placement="top" title="Tableau de bord" >
                <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
              </a>
              <a href="to_do_list.php" data-toggle="tooltip" data-placement="top" title="Profil">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
              </a>
              <a href="parametres.php" data-toggle="tooltip" data-placement="top" title="Paramètres">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>              
              <a href="login.php" data-toggle="tooltip" data-placement="top" title="Se déconnecter" >
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?php echo $Nutilisateur ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="profil.php">Profil</a></li>
                    <li><a href="javascript:;"> Paramètres</a></li>
                    <li><a href="login.php"><i class="fa fa-sign-out pull-right"></i> Se déconnecter</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">2</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/amine.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Amine ben Gamra</span>
                          <span class="time">il y'a 3 mins</span>
                        </span>
                        <span class="message">
                          Le projet N°52356 vous a été affecté.
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/gates.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Bill gates</span>
                          <span class="time">il y'a quelques instants</span>
                        </span>
                        <span class="message">
                          Cette application est merveilleuse ! je veux l'acheter, peut importe le prix .. 
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>Voir tous les alertes</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Parametres</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Paramètres du profil</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <br />
                      
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="changerpdp">Changer la photo de profil
                  </label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                  <input id="changerpdp" name="changerpdp[]" type="file" class="file" data-preview-file-type="text" multiple class="file-loading" data-allowed-file-extensions='["jpg", "png"]' data-language="fr">
                  </div>
                  <br/> <br/> <br/><br/>
                    <div class="col-sm-12 col-md-12 col-xs-12">
                      <form id="utidata" data-validate="parsley" class="form-horizontal form-label-left" action="#">

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="changermdp">Changer le mot de passe
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" id="changermdp" class="form-control col-md-7 col-xs-12" placeholder="Mot de passe" >
                          </div>
                        </div>  


                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="changeremail">Changer l'adresse E-mail
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="Email" id="changeremail" class="form-control col-md-7 col-xs-12" placeholder="Adresse Email"  >
                          </div>
                        </div> 

                        <div class="In_solid"></div>
                        <div class="form-group">
                          <div class="col-sm-3 col-md-offset-3 col-xs-12">
                            <button class="btn btn-primary" type="reset">Reinitialiser</button>
                            <button type="submit" class="btn btn-success">Changer</button>
                          </div>
                        </div>

                      </form> 

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
           ECR manager - Progiciel développé par Fares Brahem 
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!--Katrik-->
    <script src="../vendors/kartik/plugins/canvas-to-blob.js" type="text/javascript"></script>
    <script src="../vendors/kartik/fileinput.min.js" type="text/javascript"></script>
    <script src="../vendors/kartik/fr.js" type="text/javascript"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <script src="../vendors/parsleyjs/dist/i18n/fr.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
