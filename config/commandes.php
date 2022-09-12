<?php


/* Cette fonction ajouterUser me permet d'ajouter un utilisateur en BDD  */ 
function ajouterUser($nom, $prenom, $email, $motdepasse)
{
  /* Dans cette condition if je dit que si la connexion en bdd et bien effectuer et que l'ajout de User demander et bien accepter alors il faut l'ajouter dans l'ajouter dans la table utilisateur grace à la commande MYSQL INSERT INTO utilisateurs d'ou le nom, le prenom, l'email et le mot de passe correponde à chaque valeurs rentrée et si cette commande et bien effecuer alors elle me retourne un tableau de $nom, $prenom, $email, $motdepasse */ 
  if(require("connexion.php"))
  {
    $req = $access->prepare("INSERT INTO utilisateurs (nom, prenom, email, motdepasse) VALUES (?, ?, ?, ?)");

    $req->execute(array($nom, $prenom, $email, $motdepasse));

    return true;

    $req->closeCursor();
  }
}

// function getUsers($email, $password){
  
//   if(require("connexion.php")){

//     $req = $access->prepare("SELECT * FROM utilisateur ");

//     $req->execute();

//     if($req->rowCount() == 1){
      
//       $data = $req->fetchAll(PDO::FETCH_OBJ);

//       foreach($data as $i){
//         $mail = $i->email;
//         $mdp = $i->motdepasse;
//       }

//       if($mail == $email AND $mdp == $password)
//       {
//         return $data;
//       }
//       else{
//           return false;
//       }

//     }

//   }

// }

function modifier($image, $nom, $prix, $desc, $id)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("UPDATE produits SET `image` = ?, nom = ?, prix = ?, description = ? WHERE id=?");

    $req->execute(array($image, $nom, $prix, $desc, $id));

    $req->closeCursor();
  }
}

function afficherUnProduit($id)
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM produits WHERE id=?");

        $req->execute(array($id));

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}


/* Cette fonction ajouter me permet d'ajouter un produit en BDD avec une image, un nom, un prix et une descritpion  */ 
  function ajouter($image, $nom, $prix, $desc)
  {
    /* Dans cette condition if je dit que si la connexion en bdd et bien effectuer alors je peux insert dans la table produits grace au commande MYSQL INSERT INTO une image, un nom, un prix et une description de valeur rentrée et si cette commande et bien effecuer alors elle me retourne un tableau de $image, $nom, $prix, $desc */ 
    if(require("connexion.php"))
    {
      $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES (?, ?, ?, ?)");

      $req->execute(array($image, $nom, $prix, $desc));

      $req->closeCursor();
    }
  }

  
/* Cette fonction afficher me permet d'afficher toute mes en table produit de ma BDD */ 
function afficher()
{

  /* Dans cette condition if je dit que si la connexion en bdd et bien effectuer alors je veux qu'il m'affiche tout mes produit en table produits par identifiant par ordre décroissant grace a la commande MYSQL SELECT * FROM produits ORDER BY id DESC */
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM produits ORDER BY id DESC");

        $req->execute();

        /* la variables $data je stock les donnée de $req en fetchAll sous forme d'object PDO */
        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}


/* Cette fonction supprimer me permet de supprimer toute mes produits de ma BDD grace à leur id */ 
function supprimer($id)
{

  
  /* Dans cette condition if je dit que si la connexion en bdd et bien effectuer alors je peux supprimer depuis la table produits en bdd mes produit par leur i avec la commande MYSQL DELETE FROM produits WHERE id */
	if(require("connexion.php"))
	{
		$req=$access->prepare("DELETE FROM produits WHERE id=?");

		$req->execute(array($id));

		$req->closeCursor();
	}
}


/* Dans cette function getAdmin je vérifie si la connexion à bien été effectuer alors je peux preparer un access qui me verifiera grace à ma commande MYSQL SELECT * FROM admin WHERE id=33 la bonne selection de mon id qui à pour valeur 33 */

function getAdmin($email, $password){
  
  if(require("connexion.php")){

    $req = $access->prepare("SELECT * FROM admin WHERE id=33");

    $req->execute();

    /* si un utilisateur correspond à ce que je viens de fournir plus en haut alors je vais retourner grace à ma variable $data ses information en fetchAll sous forme d'object PDO */
    if($req->rowCount() == 1){
      
      $data = $req->fetchAll(PDO::FETCH_OBJ);

      foreach($data as $i){
        $mail = $i->email;
        $mdp = $i->motdepasse;
      }

      if($mail == $email AND $mdp == $password)
      {
        return $data;
      }
      else{
          return false;
      }

    }

  }

}

?>