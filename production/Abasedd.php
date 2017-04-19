<?php 
if (isset($_GET['username']) && isset($_GET['password']) && isset($_GET['Email']))
	{
		//creation objet base de donnée
		$db = new PDO('mysql:host=localhost;dbname=ecrmanager', 'root', '');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		//requête
		$q=$db->prepare('INSERT INTO `utilisateur`(`idUti`, `nomUti`, `email`, `mdp`, `priorite`) VALUES (:nomUti , :email ,:mdp , 0)') ;
		$q->bindValue(':nomUti',$_GET['username']) ;
		$q->bindValue(':email',$_GET['Email']) ;
		$q->bindValue(':mdp',$_GET['password']) ;
		$q->execute() ;
		header('location:espace_projet.php') ;
	}
else 
	{
		header('location:page_404.html') ;
	}