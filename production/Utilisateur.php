<?php 
abstract class Utilisateur 
{
	protected $idUti ; 
	protected $nom ; 
	protected $email ; 
	protected $mdp ; 
	protected $priorite ;
	protected $imgsrc ; 

	public function __construct(array $donnees)
		{
			$this->hydrate($donnees) ;
			$this->setPriorite(static::PRIORITE) ;
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

	public function getImgsrc()
		{
			return $this->imgsrc ; 
		}
	  
	public function getIdUti()
		{
			return $this->IdUti ; 
		}

	public function getNom() ; 
		{
			return $this->$nom ; 
		}

	public function getEmail() ; 
		{
			return $this->$email ; 
		}
	public function getMdp() ; 
		{
			return $this->$mdp ; 
		}
	public function getPriorite() ; 
		{
			return $this->$priorite ; 
		}
	public function setNom($nomm)
		{
			if (is_string($nomm))
				{
					$this->$nom = $nomm ; 
				}
		}
	public function setMdp($mdpp)
		{
			$mdpp = sha1($mdpp) ;
			$this->$mdp = $mdpp ;
		}
	public function setPriorite($prioritee)
		{
			$prioritee =(int) $prioritee ; 
			$this->$priorite = $prioritee ;
		}
	public function setEmail($emaill)
		{
			$this->$email = $emaill  ; 
		}
	public function setIdUti($IdUti)
		{
			$IdUti = (int) $IdUti ;
			$this->$idUti = $IdUti ; 
		}
	public function setImgsrc($imgsrcc)
		{
			$this->$imgsrc = $imgsrcc ; 
		}


}