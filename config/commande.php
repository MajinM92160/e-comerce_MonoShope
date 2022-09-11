<?php 

/* cette function me permet d'ajouter en base de donnée l'image, le nom, le prix et la description des élément  */

function ajouter($image, $nom, $prix, $desc){

/* ici grace au if je pose une condition de si la connexion en base de donnée et fonctionnel alors on peut exécuter le require un peu plus en bas  */
    if(require("connexion.php"))
    {

/* Dans cette variable req ici elle permet de crée un acces en base de donnée à chaque ajout de produit directement en base de donnée produits avec les valeur ci dessous "image, nom, prix description" */
        $req=$access->prepare("INSERT INTO produits ( image, nom, prix, description) VALUES ($image, $nom, $prix, $desc)");

/* Dans variable req je cherche à exécuter ma commande d'ajout en base de données sous forme d'un tableau" */
        $req->execute(array($image, $nom, $prix, $desc));

        $req->closeCursor();
    }
}

function afficher(){
    if(require("connexion.php"))
    {
        /* ici grace à la variable req je séléctionne tout depuis la table produits par ordre de l'id par ordre décroissant */
        $req=$access->prepare("SELECT * FROM produits ORDER BY id DESC");

        $req->execute();

        /* ici la variable data va stocker les donnée récuperer par la variable req sous forme d'object */
        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
    }
}


/* dans cette fonction la nous allons supprimer les produit par leur id*/ 
function supprimer($id){

    if (require("connexion.php")) 
    {
        /* ici dans cette variable je supprime tout dans la table produit quand égal à une valeur non définie par l'id */ 
        $req=$access->prepare("DELETE * FROM produits WHERE id=?");

        /* et j'execute ici la requete en tant que table pour qu'elle m'affiche la bonne suppression de l'id  */ 
        $req->execute(array($id));
    }
}

?>