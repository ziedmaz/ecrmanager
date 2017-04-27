<?php
function chargerClasse($classe)
{
  require $classe . '.php';
}

spl_autoload_register('chargerClasse');

include 'db_init.php';
$manager = new UtilisateurManager($db) ;

if(!$manager->existe2Connect($_POST['nomUti'],$_POST['mdp']))
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
		// si le compte de l'utilisateur n'est pas encore activé on le redirige vers la page du login  
		if ($utilisateur->Activated()==0)
		{
			header('location:login.php?na=1') ;
		}
		else
		{
			session_start();
			$_SESSION['utilisateur'] = $utilisateur;
			header('location:profil.php?ft=1');
			exit();	
		}

	}
