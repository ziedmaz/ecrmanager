<?php 
//loaders
function chargerClasse($classe)
{
  require $classe . '.php';
}

spl_autoload_register('chargerClasse');
include 'db_init.php';
//creation objet de bdd
$manager = new UtilisateurManager($db) ; 
//activation du compte
if (isset($_GET['nom']) AND isset($_GET['email']))
	{
		if($manager->existe2Register($_GET['nom'],$_GET['email']))
			{
				$perso  = $manager->get2Activate($_GET['nom'],$_GET['email']) ;
				$manager->activate($perso) ;
				header('location:profil.php?scc=1') ;
				exit() ;
			}
		else
		{
			header('location:page_404.html') ;
		}
	}
