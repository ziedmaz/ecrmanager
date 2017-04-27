<?php 
class UtilisateurManager 
	{
		private $_db ;
		 

		public function __construct($db)
			{
				$this->setDb($db) ;
			}

		public function ajouter(QPTM $utilisateur)
			{
				
				$default_imgsrc = 'imagesuti/0.jpg' ;
				$default_activated = 0 ; 
				$q=$this->_db->prepare('INSERT INTO utilisateur(nomUti,email,mdp,priorite,imgsrc,activated) VALUES (:nomUti,:email,:mdp,:priorite,:imgsrc,:activated)') ;
				$q->bindValue(':nomUti',$utilisateur->NomUti()) ;
				$q->bindValue(':email',$utilisateur->Email()) ;
				$q->bindValue(':mdp',$utilisateur->Mdp()) ;
				$q->bindValue(':priorite',$utilisateur->Priorite(),PDO::PARAM_INT) ;
				$q->bindValue(':imgsrc',$default_imgsrc) ;
				$q->bindValue(':activated',$default_activated) ;
				$q->execute() ;

				$utilisateur->hydrate([
					'idUti' => $this->_db->lastInsertId(),
					'activated' => 0  
					]) ;

			}

		public function update(Utilisateur $utilisateur)
			{
				$q=$this->_db->prepare('UPDATE utilisateur SET mdp = :mdp , email = :email , imgsrc= :imgsrc  WHERE idUti = :id ') ;
				$q->bindValue(':mdp',$utilisateur->Mdp()) ;
				$q->bindValue(':email',$utilisateur->Email()) ; 
				$q->bindValue(':imgsrc',$utilisateur->Imgsrc()) ;
				$q->bindValue(':id',$utilisateur->IdUti()) ;
				$q->execute() ;
			}

		public function activate(Utilisateur $utilisateur)
			{
				$q = $this->_db->query('UPDATE utilisateur SET `activated`= 1') ;
			}

		public function setDb($db)
			{
				$this->_db=$db ;
			}

		public function get($nomUtii,$mdpp)
		{
			$req = $this->_db->prepare('SELECT * FROM utilisateur WHERE nomUti=? AND mdp =?');
			$req->execute(array($nomUtii,sha1($mdpp)));

			$donnees = $req->fetch(PDO::FETCH_ASSOC) ;

			switch ($donnees['priorite']) 
			{
				case 1: return new QPTL ($donnees) ;
				case 0: return new QPTM ($donnees) ;
			}
		}

		public function get2Activate($nomUtii,$emaill)
		{
			$req = $this->_db->prepare('SELECT * FROM utilisateur WHERE nomUti=? AND email =?');
			$req->execute(array($nomUtii,$emaill));

			$donnees = $req->fetch(PDO::FETCH_ASSOC) ;

			return new QPTM ($donnees) ;
		}

		public function existe2Register($nomUtii,$emaill)
		{
			$req = $this->_db->prepare('SELECT * FROM utilisateur WHERE nomUti=? AND email =?');
			$req->execute(array($nomUtii,$emaill));

			return (bool) $req->fetch(PDO::FETCH_ASSOC) ;
		}

		public function existe2Connect($nomUtii,$mdpp)
		{
			$req = $this->_db->prepare('SELECT * FROM utilisateur WHERE nomUti=? AND mdp =?');
			$req->execute(array($nomUtii,sha1($mdpp)));

			return (bool) $req->fetch(PDO::FETCH_ASSOC) ;
		}

		public function getAllUsers() 
		{
			$utilisateurs=[] ;
 			$req = $this->_db->query('SELECT `nomUti` FROM utilisateur') ; 
 			while ($donnees = $req->fetchColumn())
 			{
 				$utilisateurs[]=$donnees ; 
 			}
 			return $utilisateurs; 
		}

		public function getIdUti($nomm)
		{
			$a = $this->_db->prepare('SELECT idUti from utilisateur WHERE nomUti = ? ') ;
			$a->execute(array($nomm)) ;
			return $a->fetchColumn() ;
		}


	}