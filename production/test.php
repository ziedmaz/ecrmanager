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
$managerUtilisateur  = new UtilisateurManager($db) ;

$idUti = $managerUtilisateur->getIdUti('Fares Brahem') ;
echo $idUti ;


