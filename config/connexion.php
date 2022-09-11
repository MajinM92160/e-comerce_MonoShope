<?php 

try {

/* la variable access signifique qu'en utilisant la fonction PDO je pourrais faire mes transaction et mes partage de donnée avec la base de donnée SQL monoshope */
$access=new PDO(" mysql:host=localhost;dbname=monoshope;charset=utf8", "root", "");

/* Cette variable la me permet de retourner un message d'erreur si la variable du haut n'est pas respecter  */ 
$access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

} catch (Exception $e) 

/* le catch (Exception $e) me permet de récupérer le message d'erreur */

{

    $e->getMessage();
}



?>