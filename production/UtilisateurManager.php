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
				$q->prepare('INSERT INTO utilisateur(`nomUti`,`email`,`mdp`,`priorite`,`imgsrc`) VALUES (:nomUti,:email,:mdp,:priorite)') ;
				$q->bindValue(':nomUti',$utilisateur->getNom()) ;
				$q->bindValue(':email',$utilisateur->getEmail()) ;
				$q->bindValue(':mdp',$utilisateur->getMdp()) ;
				$q->bindValue(':priorite',$utilisateur->getPriorite(),PDO::PARAM_INT) ;
				$q->execute() ;

				$utilisateur->hydrate([
					'idUti' => $this->_db->lastInsertId() ;
					'imgsrc' => '../imagesuti/0.jpg' ;
					]) ;
			}
		public function update(QPTM $utilisateur)
			{
				$q->prepare('UPDATE utilisateur SET mdp = :mdp , email = :email , imgsrc= :imgsrc  WHERE id = :id ') ;
				$q->bindValue(':mdp',$utilisateur->getMdp()) ;
				$q->bindValue(':email',$utilisateur->getEmail()) ; 
				$q->bindValue(':imgsrc',$utilisateur->getImgsrc()) ;
				$q->bindValue(':id',$utilisateur->getIdUti()) ;
				$q->execute() ;
			}


	}