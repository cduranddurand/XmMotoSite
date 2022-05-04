<?php

include ('include/entete.inc.php');

//Determine si les variables $POST son vide
if (!empty($_POST['mail']) && !empty($_POST['motdepasse'])) {
  $email = htmlspecialchars($_POST['mail']);//Evite les failles XSS
  $password = htmlspecialchars($_POST['motdepasse']);//Evite les failles XSS

  //Requete sql préparer pour eviter l'injection sql
  $q = $dbh->prepare('SELECT * FROM photo4you.utilisateur WHERE Mail = :Mail');
  $q->bindValue('Mail', $email);//Ajout d'une valeur a notre requete sql
  $q->execute();//Execute la requete sql
  $res = $q->fetch(PDO::FETCH_ASSOC);//Retourne un tableau indexé

  
  if ($res) {
      $passwordHash = $res['mdp'];//Ajout de valeur
      $_SESSION['id_user'] = $res['id_user'];//Ajout de valeur
      //Verification du hash du mot de passe
      if (password_verify($password, $passwordHash)) {
            //Verification de l'état de l'utilisateur qui essaie de se connecter
            if ($res['etat'] == 'Banni'){
              echo '<script>
              alert("!! Vous etes banni , contacter un administrateur !!");
              location.href="index.php";
              </script>';
            }else {
              //Autorisation de connexion au site
              $_SESSION['login'] = true;
              $query = "SELECT * from photo4you.utilisateur where Mail = '$email';";
              $requete = $dbh->query($query);
              $result = $requete->fetch();
              $_SESSION['id_user'] = htmlentities($result['id_user']);//Evite les failles XSS
              $_SESSION['prenomUtilisateur'] = htmlentities($result['Prenom']);//Evite les failles XSS
              $_SESSION['nomUtilisateur'] = htmlentities($result['Nom']);//Evite les failles XSS
              $_SESSION['emailUtilisateur'] = htmlentities($result['Mail']);//Evite les failles XSS
              $_SESSION['type'] = htmlentities($result['Type']);//Evite les failles XSS
              $_SESSION['photoUser'] = "images/".htmlentities($result['photoUser']);//Evite les failles XSS
              $_SESSION['etat'] = htmlentities($result['etat']);//Evite les failles XSS
              unset($result);//Detruit une variable
              header('Location:index.php');//Redirection sur index.php
            }
      } else{
        echo '<script>
        alert("!! Mail ou Mot de passe invalide !!");
        location.href="index.php";
        </script>';
      }
  } else {
    echo '<script>
    alert("!! Identifiant invalide !!");
    location.href="index.php";
    </script>';
  }
}
?>