<?php 
abstract class Utilisateur 
{
	protected $idUti ; 
	protected $nomUti ; 
	protected $email ; 
	protected $mdp ; 
	protected $priorite ;
	protected $imgsrc ;
	protected $activated ;  


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

	public function activated()
		{
			return $this->activated ; 
		}
	public function Imgsrc()
		{
			return $this->imgsrc ; 
		}
	  
	public function IdUti()
		{
			return $this->idUti ; 
		}

	public function NomUti()  
		{
			return $this->nomUti ; 
		}

	public function Email() 
		{
			return $this->email ; 
		}
	public function Mdp() 
		{
			return $this->mdp ; 
		}
	public function Priorite() 
		{
			return $this->priorite ; 
		}
	public function setNomUti($nomm)
		{
			if (is_string($nomm))
				{
					$this->nomUti = $nomm ; 
				}
		}
	public function setMdp($mdpp)
		{
			$this->mdp = $mdpp ;
		}
	public function setPriorite($prioritee)
		{
			$prioritee =(int) $prioritee ; 
			$this->priorite = $prioritee ;
		}
	public function setEmail($emaill)
		{
			$this->email = $emaill  ; 
		}
	public function setIdUti($IdUti)
		{
			$IdUti = (int) $IdUti ;
			$this->idUti = $IdUti ; 
		}
	public function setImgsrc($imgsrcc)
		{
			$this->imgsrc = $imgsrcc ; 
		}
	public function setActivated($activatedd)
		{
			$activatedd = (int) $activatedd ; 
			if($activatedd == 0 OR $activatedd == 1)
			{
				$this->activated = $activatedd;
			}
		}


}