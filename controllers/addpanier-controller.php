<?php
session_start();
require_once('../models/database.php');
require_once('../models/produits.php');
require_once('../models/panier.php');
require_once('../models/categories.php');

$categObj = new Categories;

$allCategories = $categObj->getAllCategory();

if(isset($_GET['id'])){
    $productObj = new Produits;
    $panierObj = new Panier;
    $getId = $_GET['id'];
    $result = $productObj->getTheProducts($getId);
    if (empty($result)) {
        die("Ce produit n'existe pas.");
    }
    $panierObj->addToCart($getId);
    header('Location:../index.php');
    die('Le produit a bien été ajouté à votre panier. <a href="../index.php">retourner au catalogue</a>');
} else {
    header('Location:../index.php');
    die("Vous n'avez pas sélectionné de produit à ajouter au panier.");
}