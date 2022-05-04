<?php
include ("include/entete.inc.php");
include("accessbase.php");
include ("include/panier.class.php");

if($_SESSION['login']!=TRUE)
{
	header("Location:login.php");
}

$panier= new panier($dbh);

if(isset($_GET['del'])){
    $panier->del($_GET['del']);
}
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>XM MOTO</title>
        <link href='css/cartt.css' rel='stylesheet'>
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
</head>
    <style> @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

    body{
    background-color: #eeeeee;
    font-family: 'Open Sans', serif;
    font-size: 14px
    }

    .container-fluid {
        margin-top: 70px
    }

    .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.40rem
    }

    .img-sm {
        width: 80px;
        height: 80px
    }

    .itemside .info {
        padding-left: 15px;
        padding-right: 7px
    }

    .table-shopping-cart .price-wrap {
        line-height: 1.2
    }

    .table-shopping-cart .price {
        font-weight: bold;
        margin-right: 5px;
        display: block
    }

    .text-muted {
        color: #969696 !important
    }

    a {
        text-decoration: none !important
    }

    .card {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: 0px
    }

    .itemside {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        width: 100% ;
        justify-content: center;
        
    }

    .dlist-align {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex
    }

    [class*="dlist-"] {
        margin-bottom: 5px
    }

    .coupon {
        border-radius: 1px
    }

    .price {
        font-weight: 600;
        color: #212529
    }

    .btn.btn-out {
        outline: 1px solid #fff;
        outline-offset: -5px
    }

    .btn-main {
        border-radius: 2px;
        text-transform: capitalize;
        font-size: 15px;
        padding: 10px 19px;
        cursor: pointer;
        color: #fff;
        width: 100%
    }

    .btn-light {
        color: #ffffff;
        background-color: #F44336;
        border-color: #f8f9fa;
        font-size: 12px
    }

    .btn-light:hover {
        color: #ffffff;
        background-color: #F44336;
        border-color: #F44336
    }

    .btn-apply {
        font-size: 11px
    }
    </style>
        <body oncontextmenu='return false' class='snippet-body'>
        <div class="row">
            <aside class="col-lg-9">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-borderless table-shopping-cart">
                            <thead class="text-muted">
                                <tr class="small text-uppercase">
                                    <th scope="col">Produit</th>
                                    <th scope="col" width="120">Quantité</th>
                                    <th scope="col" width="120">Prix HT</th>
                                    <th scope="col" width="120">Prix TTC</th>
                                    <th scope="col" class="text-right d-none d-md-block" width="200"></th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php 
                                        $ids=array_keys($_SESSION['panier']);
                                        if(empty($ids)){
                                            $qq = array();
                                        }else {
                                            $Req = $dbh -> prepare('SELECT * FROM photo4you.article WHERE id_article IN ('.implode(',',$ids).')');
                                            $Req -> execute();
                                            $qq = $Req -> fetchAll(PDO::FETCH_OBJ);
                                        }

                                        foreach($qq as $product):
                                    ?>
                                <tr>
                                    <td>
                                        <figure class="itemside align-items-center">
                                            <div class="aside"><img src="<?= $product->photoArticle ?>" class="img-sm"></div>
                                            <figcaption class="info"> <a class="title text-dark" data-abc="true"><?= $product->nom_article?></a>
                                                <p class="text-muted small"><?= $product->reference?>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td>
                                        <?php if($_SESSION['panier'][$product->id_article]<= $product->quantite):?>
                                            <div > <var class="quantity"><?= $_SESSION['panier'][$product->id_article]?></var> </div>
                                        <?php else : 
                                            $_SESSION['panier'][$product->id_article]--;
                                            echo '!! Quantité maximale atteinte!!';
                                            echo 'Merci de cliquez sur actualiser les stocks';
                                        ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="price-wrap"> <var class="price"><?= number_format($product->prix_article*$_SESSION['panier'][$product->id_article] /1.2,2,',',' ');?></var> </div>
                                    </td>
                                    <td>
                                        <div class="price-wrap"> <var class="price"><?= number_format($product->prix_article*$_SESSION['panier'][$product->id_article],2,',',' ');?></var></div>
                                    </td>
                                    <td class="text-right d-none d-md-block"><a href="cart.php?del=<?= $product->id_article ?>" class="btn btn-light" data-abc="true">Supprimer</a> </td>
                                </tr>
                                <?php endforeach ;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </aside>
            <aside class="col-lg-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <form>
                            <div class="form-group"> <label>Code promotion</label>
                                <div class="input-group"> <input type="text" class="form-control coupon" name="" placeholder="Code promotion"> <span class="input-group-append"> <button class="btn btn-primary btn-apply coupon">Appliquer</button> </span> </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Prix Total HT :</dt>
                            <dd class="text-right ml-3"><?= number_format($panier->total()/1.2,2,',',' ');?></dd>
                        </dl>
                        <?php 
                        $promU = $dbh->prepare('SELECT promotion FROM photo4you.article');
                        $promU -> execute();
                        $promo = $promU->fetch(PDO::FETCH_ASSOC);
                        if($promo['promotion'] != 0) :
                        ?>
                        <dl class="dlist-align">
                            <dt>Promotion :</dt>
                            <dd class="text-right text-danger ml-3"></dd>
                        </dl>
                        <?php endif ;?>

                        <dl class="dlist-align">
                            <dt>Total TTC :</dt>
                            <dd class="text-right text-dark b ml-3"><strong><?= number_format($panier->total(),2,',',' ');?></strong></dd>
                        </dl>
                        <hr> <a href="validation-commande.php?id=<?=$_SESSION['id_user'] ?>" class="btn btn-out btn-primary btn-square btn-main" data-abc="true"> Procéder à la commande</a> <a href="acheterPhotos.php" class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">Revenir à la boutique</a>
                        <hr> <a href="cart.php" class="btn btn-out btn-primary btn-square btn-main" data-abc="true"> Actualiser les stocks</a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js'></script>
    </body>
</html>