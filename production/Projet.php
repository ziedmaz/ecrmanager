<?php 
class Projet 
{
	protected $idP ,
	 		   		$numECR ,
	 					$desModif , 
	 					$cot4M ,
	 					$statut,
	 					$dateCrea ,
	 					$activite , 
	 					$produit ,
	 					$idUti ,
	 					$progres ;

	public function __construct ($donnees)
		{
			$this->hydrate($donnees) ;
		}
	public function hydrate(array $donnees)
	  {
	    foreach ($donnees as $key => $value)
	    {
	      $method = 'set'.ucfirst($key);
	      
	      if (method_exists($this, $method))
	      {
	        $this->$method($value);
	      }
	    }
	  }
	// GETTERS 
	public function IdP()
	 	{
	 		return $this->idP ; 
	 	}
	public function NumECR()
	 	{
	 		return $this->numECR ; 
	 	}
	public function DesModif()
	 	{
	 		return $this->desModif ; 
	 	}
	public function Cot4M()
	 	{
	 		return $this->cot4M ; 
	 	}
	public function Statut()
	 	{
	 		return $this->statut ; 
	 	}
	public function DateCrea()
	 	{
	 		return $this->dateCrea ; 
	 	}
	public function Activite()
	 	{
	 		return $this->activite ; 
	 	}
	public function Produit()
	 	{
	 		return $this->produit ; 
	 	}
	public function IdUti()
	 	{
	 		return $this->idUti ; 
	 	}
	public function Progres()
	 	{
	 		return $this->progres ; 
	 	}
	//SETTERS
	public function setIdP($idpp)
		{
			$idpp = (int) $idpp ;
			$this->idP = $idpp ; 
		}
	public function setNumECR($numECRR)
		{
			$numECRR = (int) $numECRR ;
			$this->numECR = $numECRR ; 
		}
	public function setDesModif($DesModiff)
		{
			if(is_string($DesModiff))
			{
				$this->desModif = $DesModiff ;
			}
		}
	public function setCot4M ($cota4MM)
		{
			if(strlen($cota4MM)==2)
			{
				$this->cot4M = $cota4MM ;
			}
		}
	public function setStatut ($statutt)
		{
			if(is_string($statutt))
			{
				$this->statut = $statutt ; 
			}
		}
	public function setDateCrea($dateCreaa)
		{
			$dateCreaa =  date('Y-m-d',strtotime($dateCreaa)) ; ;
			$this->dateCrea = $dateCreaa ;
		}
	public function setActivite($activitee)
		{
			$activitee = strval($activitee) ; 
			$this->activite = $activitee ;
		}
	public function setProduit($produitt)
		{
			if(is_string($produitt))
			{
			$this->produit = $produitt ;				
			}
		}
	public function setIdUti($idUtii)
		{
			$idUtii = (int) $idUtii ; 
			$this->idUti = $idUtii ;
		}
	public function setProgres($progress)
		{
			$progress = (int) $progress ;
			$this->progres = $progress ; 
		}
	//END SETTERS 
}