<?php
  include ("include/entete.inc.php");


  if (isset($_POST['valider'])){
      $request = $dbh->prepare('SELECT * FROM photo4you.utilisateur where id_user = ?');//Requete sql
      $request -> execute(array($_SESSION['id_user']));//Execution de la requete avec un placement de valeur
      $res = $request->fetch(PDO::FETCH_ASSOC);

      if($_SESSION['id_user'] == $res['id_user']){ //Verification que la id de session corresponde bien a celui de la base de donnée
        $adresse = htmlspecialchars($_POST['adresse1']); //Evite les faille xss
        $ville = htmlspecialchars($_POST['ville']);//Evite les faille xss
        $region = htmlspecialchars($_POST['region']);//Evite les faille xss
        $codep = htmlspecialchars($_POST['codep']);//Evite les faille xss
        $pays = htmlspecialchars($_POST['pays']);//Evite les faille xss
        $infoc = htmlspecialchars($_POST['infoc']); //Evite les faille xss
        if(!empty($_POST['adresse1'])){//verifie que la variable soit differente de vide
            if(!empty($_POST['ville'])){//verifie que la variable soit differente de vide
                if(!empty($_POST['region'])){//verifie que la variable soit differente de vide
                    if(!empty($_POST['codep'])){//verifie que la variable soit differente de vide
                        if(!empty($_POST['pays'])){   //verifie que la variable soit differente de vide  
                            if($res['adresse1']== null && $res['ville']== null && $res['region']== null && $res['codep']== null && $res['pays']== null && $res['infoc']== null){
                                $update=$dbh->prepare('UPDATE photo4you.utilisateur SET adresse1 = ?, ville = ?, region = ?, codep = ?, pays = ?, infoc = ? where id_user = ?');//Requete sql
                                $update -> execute(array($adresse,$ville,$region,$codep,$pays,$infoc,$_SESSION['id_user']));//Execution de la requete avec un placement de valeur
                                header('location: paiment.php');//Redirection vers la page de confirmationd de paiment
                            }else{
                                $update=$dbh->prepare('UPDATE photo4you.utilisateur SET adresse1 = ?, ville = ?, region = ?, codep = ?, pays = ?, infoc = ? where id_user = ?');//Requete sql
                                $update -> execute(array($adresse,$ville,$region,$codep,$pays,$infoc,$_SESSION['id_user']));//Execution de la requete avec un placement de valeur
                                header('location: paiment.php');//Redirection vers la page de confirmationd de paiment
                            }
                        }
                    }
                }
            }
        }
      }
}
?>