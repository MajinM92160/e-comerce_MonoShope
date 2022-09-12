<?php

try {

	/* Je crée ici la ligne de commande pour pouvoir me connecter à la base de donnée en localhost */ 
		$access=new pdo("mysql:host=localhost;dbname=e-commshop;charset=utf8", "root", "");

		
	/* la ligne de commande ici me permet de récuperer les erreur si elles apparaissent dans mon code */ 
		$access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

} catch (Exception $e) 
{
	$e->getMessage();
}
    
    


?>