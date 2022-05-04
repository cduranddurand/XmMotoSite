<?php
  include ("include/entete.inc.php");

  if (isset($_POST['valider'])){
    if(!empty($_POST['mail'])){

      $nom = htmlspecialchars($_POST['nom']);
      $prenom = htmlspecialchars($_POST['prenom']);
      $mail = htmlspecialchars($_POST['mail']);

      //Hashage du mot de passe via la fonction password_hash
      $motDePasse = password_hash($_POST['motdepasse1'], PASSWORD_DEFAULT);

        // Traitement de la photo
      if (isset($_FILES) && count($_FILES)>0)
      {
        $urlPhoto = $_FILES['photoUser'];
        $nom_fichier = $urlPhoto['name'];
        if (strlen($nom_fichier)==0) 
        {
          $nom_fichier="user.png";
        }
      }
      //Requete préparer qui permet d'inserer des valeurs dans la table 
      $insterUser = $dbh->prepare('INSERT INTO photo4you.utilisateur(Nom,Prenom,Mail,mdp,photoUser)Values(?, ?, ?, ?, ?)');
      $insterUser->execute(array($nom,$prenom,$mail,$motDePasse,$nom_fichier));

      //Requete préparer qui permet de selectionner des valeurs dans la table
      $recupUser = $dbh->prepare('SELECT * FROM photo4you.utilisateur WHERE Mail = ?');
      $recupUser -> execute(array($mail));

      if($recupUser -> rowCount() > 0){
        $userInfo = $recupUser->fetch();
        $_SESSION['id_user'] =$userInfo['id_user'];
      header('location: inscriptionOK.php');
      }
    }
  }
?>