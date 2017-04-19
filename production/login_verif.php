<?php 
require '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
//objet BDD
$db = new PDO('mysql:host=localhost;dbname=ecrmanager', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$q=$db->prepare('SELECT COUNT(*) FROM utilisateur WHERE nomUti = ? ') ;
$q->execute(array($_POST['username'])) ;
$resultat = $q->fetchColumn();
//Condition check
if ($_POST['mdp'] != $_POST['verif_mdp'])
	{
		header('location:login.php?mdpm=0#signup') ;
	}
elseif($resultat!=0)
	{
		header('location:login.php?mdpm=2#signup');
	}
else
	{ 
		$mailer = new PHPMailer;
		$mailer->IsSMTP(); 
    $mailer->IsHTML=TRUE;
    $mailer->Username = "ecrmanagernotify";
    $mailer->Password = "dream4ever!";
    $mailer->Host = "smtp.gmail.com";
    $mailer->Port = 465; 
    $mailer->SMTPSecure = 'ssl'; 
    $mailer->SMTPAuth = true; 

		$mailer->setFrom('ecrmanagernotify@gmail.com', 'ECR Manager');
		$mailer->addAddress('fares.brhem@gmail.com', 'SuperUser');
		$mailer->Subject  = 'Confirmation de création de compte';
		$mailer->isHTML(true);
		$mailer->Body     = 'Hi! This is my first e-mail sent through PHPMailer.';

	if(!$mailer->send())
	 	{
	  echo 'Le Message n\'a pas été envoyé';
	  echo 'Erreur: ' . $mailer->ErrorInfo;
		} 
	else 
		{
		  header('location:login.php?mdpm=1#signin') ;
		}
	}