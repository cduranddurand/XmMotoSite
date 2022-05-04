<?php
/*Fonction de verification admin*/
if(!isset($_SESSION['login'])){
    header('location:login.php');
    exit();
}

/*Fonction d'ajout dans la base de donnée*/
function ajouter($nom, $quantite, $prix, $photo ,$reference, $categorie)
{
   if(require("accessbase.php"))
   {
     $req = $dbh->prepare("INSERT INTO photo4you.article (nom_article, quantite, prix_article, photoArticle, reference, categorie) VALUES ('$nom', '$quantite', $prix, '$photo', '$reference', '$categorie')");

     $req->execute(array($nom, $quantite, $prix, $photo, $reference));

     $req->closeCursor();
   }
}

/*Fonction d'affichage d'information*/
function afficher()
{
    if(require("accessbase.php"))
    {
        $req = $dbh->prepare("SELECT * FROM photo4you.article ORDER BY id_article DESC");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
    }
}

/*Fonction qui permet de supprimer un article via l'id_article*/
function supprimer($id)
{
    if(require("accessbase.php"))
    {
        $req = $dbh->prepare("DELETE FROM photo4you.article WHERE id_article=?");

        $req->execute(array($id));

        $req->closeCursor();
    }
}

?>