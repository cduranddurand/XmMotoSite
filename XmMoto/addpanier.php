<?php
include("accessbase.php");
include ("include/panier.class.php");

$panier= new panier($dbh);

if(isset($_GET['id'])){
    $sql ='SELECT id_article FROM photo4you.article Where id_article = ?' ;
    $req = $dbh->prepare($sql);
    $req -> execute(array($_GET['id']));
    $product = $req -> fetchAll(PDO::FETCH_OBJ);

    if(empty($product)){
        die(" Ce produit n'existe pas");
    }

    $panier->add($product[0]->id_article);
    header('location: cart.php');

}else {
    die(" Vous n'avez pas selectionner de produit");
}
?>