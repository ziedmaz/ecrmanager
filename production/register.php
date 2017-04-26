<?php 
// charger les classes 
function chargerClasse($classe)
{
  require $classe . '.php';
}

spl_autoload_register('chargerClasse');
//charger plugin et objet de connexion 
require '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
include 'db_init.php';
// generation de variables 
$manager = new UtilisateurManager($db) ;
$mdp=sha1($_POST['mdp']) ;
$Nutilisateur=$_POST['nomUti'];
$mailUtilisateur=$_POST['email'];
$resultat = $manager->existe2Register($Nutilisateur,$mailUtilisateur) ;
// condition check 
// si l'utilisateur existe : redirection 
if($resultat)
{
	header('location:login.php?mdpm=2#signup') ;
	exit ; 
}
//si les mot de passe ne sont pas égaux : redirection  
elseif($_POST['mdp'] != $_POST['verif_mdp']) 
{
	header('location:login.php?mdpm=0#signup') ;
	exit ; 
}
// fin condition check 
// Insertion dans la base de données 
else
{
	$utilisateur = new QPTM(['nomUti' => $Nutilisateur,
								'mdp' => $mdp,
								'email'=> $mailUtilisateur]) ;
	
	try
		{
			$manager->ajouter($utilisateur) ;
		}
		catch(Exception $e)
		{
			die('Erreur :'.$e->getMessage()) ;
		}
		//preparation du texte de courriel 
    $message=file_get_contents('mail.html');
    $moc=array('%utilisateur%','%Email%') ;
    $tru=array($Nutilisateur,$mailUtilisateur);
    $message=str_replace($moc,$tru,$message) ;
		//Preparation de l'objet de l'envoi 
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
		$mailer->Subject  = 'Confirmation d\'un nouveau compte sur ECR Manager';
    $mailer->isHTML(true);
		$mailer->msgHTML($message)  ;
    $mail->AltBody = 'This is a plain-text message body';



	if(!$mailer->send())
	 	{
	  echo 'Le Message n\'a pas été envoyé';
	  echo 'Erreur: ' . $mailer->ErrorInfo;
		} 
	else 
		{
		// destruction de l'objet 
		unset($utilisateur) ;
		// redirection vers le profil du Leader 
		header('location:login.php?mdpm=1#signin');
		}
}
