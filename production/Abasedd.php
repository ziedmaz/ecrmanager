<?php 
function chargerClasse($classe)
{
  require $classe . '.php';
}

spl_autoload_register('chargerClasse');

$db = new PDO('mysql:host=localhost;dbname=ecrmanager', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


$manager = new UtilisateurManager($db) ; 

if (isset($_GET['nom']) AND isset($_GET['mdp']) AND isset($_GET['email']))
	{
		$utlisateur = new QPTM(['nom' => $_GET['nom'],
								'mdp' => $_GET['mdp'],
								'email'=> $_GET['email']]) ;
		try
		{
			$manager->ajouter($utlisateur) ;
		}
		catch(Exception $e)
		{
			die('Erreur :'.$e->getMessage()) ;
		}
		unset($utlisateur) ;
		header('location:profil.php');
	}
else 
	{
		header('location:page_404.html') ;
	}