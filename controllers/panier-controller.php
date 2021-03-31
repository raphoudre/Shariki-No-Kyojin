<?php
if ($pageSwitch == 'index') {
    require_once('./models/database.php');
    require_once('./models/produits.php');
    require_once('./models/panier.php');
    require_once('./models/commandes.php');
} else {
    require_once('../models/database.php');
    require_once('../models/produits.php');
    require_once('../models/panier.php');
    require_once('../models/commandes.php');
}


$panier = new Panier();
$productObj = new Produits();
if (isset($_SESSION['panier'])) {
    $ids = array_keys($_SESSION['panier']);
    if (empty($ids)) {
        $cartProduct = array();
    } else {
        $theId = implode(',',$ids);
        $cartProduct = $productObj->getMultipleProducts($theId);
    }
}
if (isset($_POST['changeQty'])) {
    if ($_POST['changeQty'] <= 0) {
        $switch = $_POST['checkId'];
        unset($_SESSION['panier'][$switch]);
        header('Location:cart.php');
    } else {
        $panier->addToCart($_POST['checkId']);
    }
    
}
if (isset($_GET['delete'])) {
    unset($_SESSION['panier'][$_GET['delete']]);
    header('Location:cart.php');
}