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
				$q=$this->_db->prepare('INSERT INTO utilisateur(nomUti,email,mdp,priorite,imgsrc) VALUES (:nomUti,:email,:mdp,:priorite,:imgsrc)') ;
				$q->bindValue(':nomUti',$utilisateur->NomUti()) ;
				$q->bindValue(':email',$utilisateur->Email()) ;
				$q->bindValue(':mdp',$utilisateur->Mdp()) ;
				$q->bindValue(':priorite',$utilisateur->Priorite(),PDO::PARAM_INT) ;
				$q->bindValue(':imgsrc',$default_imgsrc) ;
				$q->execute() ;

				$utilisateur->hydrate([
					'idUti' => $this->_db->lastInsertId(), 
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

		public function existe($nomUtii,$mdpp)
		{
			$req = $this->_db->prepare('SELECT * FROM utilisateur WHERE nomUti=? AND mdp =?');
			$req->execute(array($nomUtii,sha1($mdpp)));

			return (bool) $req->fetch(PDO::FETCH_ASSOC) ;
		}

	}