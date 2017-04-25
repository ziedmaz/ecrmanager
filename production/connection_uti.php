<?php
function chargerClasse($classe)
{
  require $classe . '.php';
}

spl_autoload_register('chargerClasse');

$db = new PDO('mysql:host=localhost;dbname=ecrmanager','root','');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$manager = new UtilisateurManager($db) ;

if(!$manager->existe($_POST['nomUti'],$_POST['mdp']))
	{
		header('location:login.php?con=0#signin');
		exit();
	}
else
	{	
		try
			{
			$utilisateur = $manager->get($_POST['nomUti'],$_POST['mdp']) ;
			}
		catch(Exception $e)
			{
				die('Erreur :'.$e->getMessage());
			}
		session_start();
		$_SESSION['utilisateur'] = $utilisateur;
		header('location:profil.php?ft=1');
		exit();
	}
