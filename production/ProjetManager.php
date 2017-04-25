<?php 
 class ProjectManager
  {
	 	private $_db ; 

	 	public function __construct($db)
			{
				$this->setDb($db) ;
			}

		public function setDb($db)
			{
				$this->_db=$db ;
			}

		public function ajouterP(Projet $projet)
		{
			$q=$this->_db->prepare('INSERT INTO `projet`(`numECR`, `desModif`, `cot4m`, `statut`, `dateCrea`, `Activite`, `produit`, `idUti`) VALUES (:numECR,:desModif, :cot4m,:statut,:dateCrea,:Activite,:produit,:idUti)') ;
			$q->bindValue('numEcr',$projet->NumECR(),PDO::PARAM_INT) ;
			$q->bindValue('desModif',$projet->DesModif()) ;
			$q->bindValue('cot4m',$projet->Cot4M()) ;
			$q->bindValue('statut',$projet->Statut()) ;
			$q->bindValue('dateCrea',$projet->DateCrea()) ;
			$q->bindValue('Activite',$projet->Activite()) ;
			$q->bindValue('produit',$projet->Produit()) ;
			$q->bindValue('idUti',$projet->IdUti()) ;
			$q->execute() ;

			$projet->hydrate([ 'progres' => 0, 
				'idP' => $this->_db->lastInsertId()
				]) ;
		}

		public function supprimerP($id)
		{
			$q=$this->_db->prepare('DELETE * FROM projet WHERE idP = :idP ') ;
			$q->bindValue(':idP',$id) ;
			$q->execute() ;
		}

		public function modifierStatut($id,$statutt)
		{
			$q=$this->_db->prepare('UPDATE projet SET statut = :statut WHERE idP = :idP ') ;
			$q->bindValue(':statut' ,$statutt) ;
			$q->bindValue(':idP',$id) ;
			$q->execute() ;
		}

		public function modifierProgres($id,$progress) 
		{
			$q=$this->_db->prepare('UPDATE projet SET progres = :progres WHERE idP = :idP') ;
			$q->bindValue(':progres',$progress) ;
			$q->bindValue(':idP',$id) ;
			$q->execute() ;
		}

 		public function getList(Utilisateur $utilisateur)
 		{
 			$projets =[] ;
 			if($utilisateur->Priorite()==0)
 			{
	 			$q=$this->_db->prepare('SELECT * FROM projet WHERE statut = `En cours` AND idUti = ? ') ;
 				$q->execute(array($utilisateur->IdUti())) ;
 			}
 			else
 			{
 				$q = $this->_db->query('SELECT * FROM projet WHERE statut = `En cours`');
 			}

 			while ($donnees=$q->fetch(PDO::FETCH_ASSOC))
 			{
 				$projets[] = new Projet($donnees) ;
 			}

 			return $projets ;
 		}

 		public function get($id)
 		{
 			$donnees = $q=$this->_db->query('SELECT * FROM projet WHERE idP ='.$id)->fetch(PDO::FETCH_ASSOC) ;
 			return new Projet($donnees) ;
 		}

 		
  }