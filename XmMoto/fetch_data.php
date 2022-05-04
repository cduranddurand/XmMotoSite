<?php

//fetch_data.php

include("accessbase.php");

if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM photo4you.article WHERE product_statuts = '1'
	";
	if(isset($_POST["categorie"]))
	{
		$brand_filter = implode("','", $_POST["categorie"]);
		$query .= "
		 AND categorie IN('".$brand_filter."')
		";
	}

    $statement = $dbh->prepare($query);
    $statement->execute(); 
    $result = $statement->fetchAll();
    $total_row = $statement->rowCount();
    $output = '';
    if($total_row > 0)
    {
    foreach($result as $row)
    {
    $output .= '
    <div class="col-sm-4 col-lg-3 col-md-3">
            <figure class="card card-product">
            <div class="img-wrap"><img src="'. $row['photoArticle'] .'" alt="" class="img-responsive" > </div>
            <figcaption class="info-wrap">
                <p align="center"><strong><a href="#">'. $row['nom_article'] .'</a></strong></p>
                <h4 style="text-align:center;" class="text-danger" >'. $row['prix_article'] .' €</h4>
                <p>Quantité : '. $row['quantite'].'<br />
                Référence : '. $row['reference'] .' <br />
            </figcaption>
            <div class="bottom-wrap">
            <a href="addpanier.php?id='.$row['id_article'].'">
                <p><button class="btn btn-sm btn-primary float-right" type="submit" name="'.$row['id_article'].'">Ajouter au panier</button></p>
            </a>
        </div>

    </div>
    ';
    }
    }
    else
    {
    $output = '<h3>No Data Found</h3>';
    }
    echo $output;

}
?>