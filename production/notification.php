<?php 
class notification 
{
	protected $typeNotif,
						$textNotif ;

	const AVAILABLE_TYPES = ['success','info','warning','danger'] ;// Different type d'alertes

	public function __construct($donnees)
	{
		$this -> hydrate($donnees) ;
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

  public function TypeNotif()
  {
  	return $this->typeNotif ;
  }

  public function TextNotif()
  {
  	return $this->textNotif ; 
  }

  public function setTypeNotif($typee)
  {
  	$message = '<div class="alert alert-%type% alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Attention</strong>%text%
                  </div>' ;
    if(in_array($typee, self::AVAILABLE_TYPES))
    	{
    		$moc=array('%type%') ;
		    $tru=array($typee);
		    $message=str_replace($moc,$tru,$message) ;
      	$this->typeNotif = $typee ;
    	}
    else 
    {
    	$this->typeNotif = 'info' ;
    }
  }

  public function setTextNotif($textt)
  {
  	$message = '<div class="alert alert-%type% alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Attention</strong>%text%
                  </div>' ;

    $moc=array('%text%') ;
    $tru=array($textt);
    $message=str_replace($moc,$tru,$message) ;


  	$this->textNotif =$message ; 
  }

}