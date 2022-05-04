<?php
  include ("include/entete.inc.php");
  require("commarticle.php");

  if(!isset($_SESSION['login'])){
    header('location:index.php');
    exit();
  }
  if($_SESSION['type'] != 'admin'){
	header('location:index.php');
	exit();
  }

  $Produits=afficher();
?>

<!DOCTYPE html>
<html lang="fr">
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      	
<form method="post">
  <div class="mb-3">

   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Identifiant du produit</label>

    <input type="number" class="form-control" name="id_article" required>
  </div>

  <button type="submit" name="valider" class="btn btn-primary">Supprimer le produit</button>
</form>

      </div>


<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
  
      <?php 

        /*Fonction qui pour tout $Produits alors affiche l'image de l'article et l'id*/
        foreach($Produits as $produit): 

        ?> 
        <div class="col">
          <div class="card shadow-sm">
            
            <img src="<?= $produit->photoArticle ?>" alt="#">

            <h3><?= $produit->id_article ?></h3>

            <div class="card-body">
            
            </div>
          </div>
        </div>
      <?php endforeach; ?>

</div>

    </div></div>

    
</body>
</html>

<?php

  if(isset($_POST['valider']))
  {
    if(isset($_POST['id_article']))
    {
    if(!empty($_POST['id_article']) && is_numeric($_POST['id_article']))
	    {
	    	$idproduit = htmlspecialchars(strip_tags($_POST['id_article']));

          try 
          {
            supprimer($idproduit);
            header('Location:suppArticle.php');
          } 
          catch (Exception $e) 
          {
          	$e->getMessage();
          }
	    	


	    }
    }
  }
?>