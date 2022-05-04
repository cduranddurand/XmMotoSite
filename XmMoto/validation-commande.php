<?php
    include ('include/entete.inc.php');
    
    // On verifie la connexion
    if($_SESSION['login']!=TRUE)
    {
        header("Location:login.php");
    }

    if(empty($_SESSION['panier']))
    {
        header("Location:acheterPhotos.php");
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>XM MOTO</title>
        <link href="css/valcom.css" rel="stylesheet">
    </head>
    <body>
    </br></br></br>
    </div class="az">
        <div class="container">
            <form action="verif-comm.php" method="POST">
                
                <label for="adresse">Adresse</label>
                <input type="text" id="adresse1" name="adresse1" placeholder="Adresse .." minlength="0" maxlength="100" required>

                <label for="ville">Ville</label>
                <input type="text" id="ville" name="ville" placeholder="Votre Ville .." minlength="0" maxlength="30" required>

                <label for="region">Region</label>
                <input type="text" id="region" name="region" placeholder="Votre region .." minlength="0" maxlength="30" required>

                <label for="codep">Code Postal / ZIP</label>
                <input type="text" id="codep" name="codep" placeholder="Votre Code Postal / ZIP .." minlength="0" maxlength="5" required>

                <label for="pays">Pays</label>
                <select id="pays" name="pays">
                <option value="france">France</option>
                </select>

                </br></br>
                <hr>
                </br>
                <label for="infoc">Information complémentaire à la livraison</label>
                <textarea id="infoc" name="infoc" placeholder="Information complémentaire à la livraison (n° étage , bâtiment , ..)" minlength="0" maxlength="255" style="height:100px"></textarea>

                <input type="submit" value="Payer" name="valider">

            </form>
        </div>
    </div>
    </body>
</html>