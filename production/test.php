<?php
function chargerClasse($classe)
{
  require $classe . '.php';
}

spl_autoload_register('chargerClasse');
session_start() ;
var_dump($_SESSION['utilisateur']) ;
echo $_SESSION['utilisateur']->Imgsrc() ;