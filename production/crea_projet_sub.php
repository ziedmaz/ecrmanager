<?php
function chargerClasse($classe)
{
  require $classe . '.php';
}

spl_autoload_register('chargerClasse');
include 'db_init.php';
// appel au objets de gestion 
$managerProjet = new ProjectManager($db) ;
$managerUtilisateur  = new UtilisateurManager($db) ;
// loading de variables 
$numECR = $_POST['numECR'] ;
$desModif = $_POST['desModif'] ;
$dateCrea =	$_POST['dateCrea'] ;
$cota4M = strval( $_POST['cota'].$_POST['4M']) ;
$activite = $_POST['activite'] ;
$produit = $_POST['produit'] ;
$idUti = $managerUtilisateur->getIdUti($_POST['nomUti']) ;
// creation d'un objet projet 
$projet = new Projet (['numECR' => $numECR,
											 'desModif' => $desModif,
											 'dateCrea' => $dateCrea,
											 'cot4M' => $cota4M,
											 'activite' => $activite,
											 'produit' => $produit,
											 'idUti' => $idUti
											 ]);
//ajout de l'objet dans la BDD
try 
{
$managerProjet->ajouterP($projet) ; 	
}
catch(Exception $e)
{
	die('Erreur'.$e->getMessage()) ;
}
echo 'OK !' ;