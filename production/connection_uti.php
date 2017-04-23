<?php
try
	{
		$db = new PDO('mysql:host=localhost;dbname=ecrmanager','root','');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$req = $db->prepare('SELECT nomUti,email,priorite FROM utilisateur WHERE nomUti=? AND mdp =?');
		$req->execute(array($_POST['username'] ,sha1($_POST['mdp'])));	
	}
catch(Exception $e)
	{
		die('Erreur :'.$e->getMessage());
	}


$resultat = $req->fetch();

if (!$resultat)	
	{
		header('location:login.php?con=0#signin');
		exit();
	}
else
	{	
		session_start();
		$_SESSION['username']=$resultat['nomUti'] ;
		$_SESSION['email']=$resultat['email'] ;
		$_SESSION['priorite']=$resultat['priorite'] ;
		header('location:profil.php?ft=1');
		exit();
	}
