<?php
function chargerClasse($classe)
{
  require $classe . '.php';
}

spl_autoload_register('chargerClasse');
session_start() ;
if (!isset($_SESSION['utilisateur']))
{
    header('location:login.php?nc=1') ;
    exit() ;
}
else
{
  $utilisateur=$_SESSION['utilisateur'] ;
}
include 'db_init.php';
$managerProjet = new ProjectManager($db) ;
$listProduits = $managerProjet->getAllProducts() ;
$managerUtilisateur = new UtilisateurManager($db) ;
$listeUtilisateurs = $managerUtilisateur->getAllUsers() ;
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
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

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
                <img src="<?php echo $utilisateur->Imgsrc()?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenue,</span>
                <h2><?php echo $utilisateur->NomUti()?></h2>
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
                  <li><a><i class="fa fa-cog"></i> Paramètres </a>
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
                    <img src="<?php echo $utilisateur->Imgsrc()?>" alt=""><?php echo $utilisateur->NomUti()?>
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
                <h3>Créer un nouveau projet</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 ">
                <div class="x_panel">
                  <div class="x_title">
                      <h2>Formulaire détails de projet</h2>
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
                       
                       <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="crea_projet_sub.php" method="POST">

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numEcr">Numéro d'ECR <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="numECR" type="text" id="numEcr" required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div> 

                            <div class=" form-group" > 
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dateCrea">Date de création <span class="required">*</span>
                              </label>                        
                              <fieldset>
                                <div class="control-group">
                                  <div class="controls">
                                    <div class="col-md-3 xdisplay_inputx form-group has-feedback">
                                      <input name="dateCrea" type="text" class="form-control has-feedback-left" id="single_cal1" placeholder="Date de création" aria-describedby="inputSuccess2Status">
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                      <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                    </div>
                                  </div>
                                </div>
                              </fieldset>
                            </div>  

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desModif">Description de la modification <span class="required">*</span>
                              </label> 
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="desModif" type="text" id="desModif" required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cota4M"> Cotation 4M <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                 <label for="cota4M">information client:</label>
                                  <select name="cota" id="cota4M" class="form-control" required>
                                    <option value="">Choisir..</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                  </select>  
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                 <label for="cota4M">Validation documentaire :</label>
                                  <select name ="4M" id="cota4M" class="form-control" required>
                                    <option value="">Choisir..</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                  </select>  
                                </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Activité"> Activité <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="activite" id="Activité" class="form-control" required>
                                  <option value="">Choisir..</option>
                                  <option value="ITC">ITC</option>
                                  <option value="ISC">ISC</option>
                                </select>  
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Produit">Produit <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="produit" id="Produit" class="form-control" required>
                                  <option value="">Choisir..</option>
                                  <?php 
                                  foreach ($listProduits as $value) {
                                    echo '<option value="'.$value.'">'.$value.'</option>' ;
                                  }
                                  ?>
                                </select>                        
                              </div>
                            </div> 

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="QPTM"> QPTM chargé <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select name="nomUti" id="QPTM" class="form-control" required>
                                    <option value="">Choisir..</option>
                                    <?php 
                                    foreach ($listeUtilisateurs as $value) {
                                      echo '<option value="'.$value.'">'.$value.'</option>' ;
                                    }
                                    ?>
                                  </select>  
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                  <button class="btn btn-primary" type="button" data-toggle="modal" data-target=".annulerProjet">Annuler</button>

                                    <div class="modal fade annulerProjet" tabindex="-1" role="dialog" aria-hidden="true">
                                      <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fermer"><span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="labelpopup1">Annuler la création</h4>
                                          </div>
                                          <div class="modal-body">
                                            <h4>Terminer votre création ?</h4>
                                            <p> Si vous quittez la page maintenant, les données ne seront pas enregistrés </p>
                                            <p></p>
                                          </div>
                                          <div class="modal-footer">
                                            <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-8">
                                              <a href="profil.php" type="button" class="btn btn-danger" > Annuler </a>  
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <button  class="btn btn-primary" type="reset">Reinitialiser</button>
                                  <button id="valider_btn" type="submit" class="btn btn-success">Valider</button>
                                </div>
                            </div>                    
                        
                       </form>  
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
   <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
   <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <?php
    if (isset($_GET['ex']))
      {
    ?>
        <script type="text/javascript">


          $(document).ready(function () {
            PNotify.removeAll() ;
            new PNotify({
                      title: 'Attention',
                      text: 'Ce projet existe deja',
                      type: 'warning',
                      styling: 'bootstrap3'
                    }) ;
           });
        </script>
    <?php 
      }
    else
    {
      ?>
      <script type="text/javascript">


          $(document).ready(function () {
            PNotify.removeAll() ;
          });
      </script>
      <?php 
    }
    ?>
  </body>
</html>
