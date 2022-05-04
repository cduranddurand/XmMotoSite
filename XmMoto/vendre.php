<?php
include "include/entete.inc.php";
require("commarticle.php");

if(!isset($_SESSION['login'])){
    header('location:index.php');
    exit();
}
if($_SESSION['type'] != 'admin'){
	header('location:index.php');
	exit();
}

?>
</br>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Xm Moto</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </head>
  <body>

    <div class="album py-5 bg-light">
      <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          
      <form method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Titre de l'image</label>
          <input type="name" class="form-control" name="photoArticle" required>

        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
          <input type="text" class="form-control" name="nom_article"  required>
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Référence</label>
          <input type="text" class="form-control" name="reference"  required>
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Prix</label>
          <input type="number" step="0.01"class="form-control" name="prix_article" required>
        </div>

        <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Quantité</label>
          <input type="number" class="form-control" name="quantite" required>
        </div>

        <div class="mb-3">
          <fieldset>
          <legend>Catégorie :</legend>
          <div>
            <input type="checkbox" id="Huile" name="categorie" value="Huile">
            <label for="coding">Huile</label>
          </div>
          <div>
            <input type="checkbox" id="Casque" name="categorie" value="Casque">
            <label for="music">Casque</label>
          </div>
          <div>
            <input type="checkbox" id="Bougie" name="categorie" value="Bougie">
            <label for="music">Bougie</label>
          </div>
          <div>
            <input type="checkbox" id="Gants" name="categorie" value="Gants">
            <label for="music">Gants</label>
          </div>
          <div>
            <input type="checkbox" id="Vestes" name="categorie" value="Vestes">
            <label for="music">Vestes</label>
          </div>
        </fieldset>
        </div>

        <button type="submit" name="valider" class="btn btn-primary">Ajouter un nouveau produit</button>
      </form>

        </div></div></div>

      
  </body>
</html>

<?php

  //Fonction qui verifie si la variable est déclarer
  if(isset($_POST['valider']))
  {
    if(isset($_POST['photoArticle']) && isset($_POST['nom_article']) && isset($_POST['reference']) && isset($_POST['prix_article']) && isset($_POST['quantite']) && isset($_POST['categorie']))
    {
    //Fontion qui determine si la variable est vide
    if(!empty($_POST['photoArticle']) && !empty($_POST['nom_article'])  && !empty($_POST['reference']) && !empty($_POST['prix_article']) && !empty($_POST['quantite']) && !empty($_POST['categorie']))
	    {
        //Fonction qui convertit les caractères spéciaux en html
	    	$photo= htmlspecialchars(strip_tags($_POST['photoArticle']));
	    	$nom = htmlspecialchars(strip_tags($_POST['nom_article']));
	    	$prix = htmlspecialchars(strip_tags($_POST['prix_article']));
	    	$quantite = htmlspecialchars(strip_tags($_POST['quantite']));
        $reference = htmlspecialchars(strip_tags($_POST['reference']));
        $categorie = htmlspecialchars(strip_tags($_POST['categorie']));
          
          try 
          {
            //Fonction qui ajoute dans la base de donnée 
            ajouter($nom, $quantite, $prix, $photo, $reference,$categorie);
          } 
          catch (Exception $e) 
          {
            //Fonction de renvoie de message d'érreur
          	$e->getMessage();
          }

	    }
    }
  }

?>