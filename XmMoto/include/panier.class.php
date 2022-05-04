<?php
class panier{

    private $dbh ;

    public function __construct($dbh){
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
        }
        $this->dbh = $dbh;
    }

    public function total(){
        $total = 0;
        $ids=array_keys($_SESSION['panier']);

        if(empty($ids)){
            $qq = array();
        }else {
            $Req = $this->dbh->prepare('SELECT id_article, prix_article FROM photo4you.article WHERE id_article IN ('.implode(',',$ids).')');
            $Req -> execute();
            $qq = $Req -> fetchAll(PDO::FETCH_OBJ);
        }

        foreach( $qq as $product){
            $total += $product->prix_article * $_SESSION['panier'][$product->id_article];
        }

        return $total;
    }

    public function add($product_id){
        
        if(isset($_SESSION['panier'][$product_id])){
            $_SESSION['panier'][$product_id]++ ;
        }else {
            $_SESSION['panier'][$product_id] = 1 ;
        }
    }

    public function del($product_id){
        unset($_SESSION['panier'][$product_id]);
    }
}
?>