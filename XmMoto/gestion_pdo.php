<?php
include 'include/entete.inc.php';

//Verification de session
if(empty($_SESSION['login'])){
    header('location:index.php');
    exit();
}

//Verification de session
if($_SESSION['type'] != 'admin'){
    header('location:index.php');
    exit();
    
}else{
        /* Fonction qui verifie l'etat et le modifie dans la base de données via l'id_user */
        if (isset($_GET["id_user"])) {
            if (isset($_GET["etat"])) {
    
                $id = $_GET["id_user"];
                $etat = $_GET["etat"];
                if($etat == 'valid'){
                    /* Valid devient banni */
                    //Requete préparer qui permet de modifier l'état d'un utilisateur
                    $req = $dbh->prepare("UPDATE photo4you.utilisateur SET etat='banni' WHERE id_user = '$id'");
                    $req->execute();
                }

                if($etat == 'banni'){
                    /* Banni devient valid */
                    //Requete préparer qui permet de modifier l'état d'un utilisateur
                    $req = $dbh->prepare("UPDATE photo4you.utilisateur SET etat='valid' WHERE id_user = '$id'");
                    $req->execute();
                }
                header("location:gestionUtilisateur.php");
            }
        }
    }
?>