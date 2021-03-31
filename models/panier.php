<?php
class Panier extends Database{
    protected $checkCount = '';
    public function addToCart($productId){
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();  
        }
        if (isset($_SESSION['panier'][$productId]['qty'])) {
            $_SESSION['panier'][$productId]['qty']++;
        } if (isset($_POST['changeQty'])) {
            $_SESSION['panier'][$productId]['qty'] = $_POST['changeQty'];
            unset($_POST);
        } else {
            $_SESSION['panier'][$productId]['qty'] = 1;
        }
    }
    public function total(){
        $total = 0;
        $ids = array_keys($_SESSION['panier']);
        if (empty($ids)) {
            $this->checkCount = 'empty';
        } else {
            $theId = implode(',',$ids);
            $query = "SELECT id, prix FROM produits WHERE id IN ($theId)";
            $queryObj = $this->dataBase->query($query);
            if ($queryObj == false) {
                echo '0';
            } else {
                $products = $queryObj->fetchAll();
                
                foreach ($products as $products) {
                    $total += $products['prix']*$_SESSION['panier'][$products['id']]['qty'];
                }
                return $total;
            }
        }
    }
    public function count(){
        if ($this->checkCount != 'empty') {
            return count($_SESSION['panier']);
        }
    }
}