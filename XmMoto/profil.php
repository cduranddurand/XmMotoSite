<?php
include ("include/entete.inc.php");

// On verifie la connexion
if($_SESSION['login']!=TRUE)
{
	header("Location:login.php");
}

?>
<!doctype HTML>
    <html lang="fr">
        <head>
            <title>Profil</title>
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <link href="css/profil.css" rel="stylesheet" >
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        </head>

        <body>
        <div class="container emp-profile">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <!------ Fonction qui charge l'image via une requete  ---------->
                                    <?php
                                        $instruction=$dbh->prepare("SELECT photoUser FROM photo4you.utilisateur WHERE id_user=:id_user");
                                        $instruction->bindValue(":id_user",$_SESSION['id_user']);
                                        $instruction->execute();
                                        $data = $instruction->fetchAll();
                                        foreach ($data as $key) {
                                        echo '<img src="images/'.$key['photoUser'].'" width=63%>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="profile-head">
                                            <h5>
                                            <p>Bonjour <?php echo $_SESSION['prenomUtilisateur']?></p>
                                            </h5>
                                            <p class="proile-rating"><span></span></p>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Mes informations</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content profile-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Nom :</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $_SESSION['nomUtilisateur'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Prénom :</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $_SESSION['prenomUtilisateur'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Email :</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $_SESSION['emailUtilisateur']?></p>
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>           
            </div>
        </body>
        <footer>
    <?php
      include ('include/piedDePage.inc.php');
    ?>
  </footer>
</html>