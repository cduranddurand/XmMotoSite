<?php
include ("include/entete.inc.php");
include ("accessbase.php");
include ("include/panier.class.php");

// On verifie la connexion
if($_SESSION['login']!=TRUE)
{
	header("Location:login.php");
}

require("commarticle.php");

$Produits=afficher();

$panier= new panier($dbh);


?>
<head>
    <title>Boutique</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/acheterphoto.css" rel="stylesheet" />
    <link href="js/scripts.js" rel="JavaScript" />

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    include ('fetch_data.php');
    ?>
    <!-- Page Content -->
    <div class="container">
        <div class="row" style="display:flex; margin-right:-1350px; margin-left:-150px">
        <h1> </h1>
            <div class="col-md-3">                    
            <div class="list-group">
            <h3>Categorie</h3>
                <div style="height: 1000px; overflow-y: left; overflow-x: hidden;">
            <?php

                $query = "SELECT DISTINCT(categorie) FROM photo4you.article";
                $statement = $dbh->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll();
                foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                    <label><input type="checkbox" class="common_selector categorie" value="<?php echo $row['categorie']; ?>"  > <?php echo $row['categorie']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                </div>
            </div>
        <div class="col-md-4">
            <br/>
                <div class="row filter_data">

                </div>
            </div>
        </div>
    </div>

        <script>
        $(document).ready(function(){

            filter_data();

            function filter_data()
            {
                $('.filter_data').html('<div id="loading" style="" ></div>');
                var action = 'fetch_data';
                var categorie = get_filter('categorie');
                $.ajax({
                    url:"fetch_data.php",
                    method:"POST",
                    data:{action:action, categorie:categorie},
                    success:function(data){
                        $('.filter_data').html(data);
                    }
                });
            }

            function get_filter(class_name)
            {
                var filter = [];
                $('.'+class_name+':checked').each(function(){
                    filter.push($(this).val());
                });
                return filter;
            }

            $('.common_selector').click(function(){
                filter_data();
            });

        });
        </script>

</body>
</html>
