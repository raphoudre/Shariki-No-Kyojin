<?php
require_once('./models/database.php');
require_once('./models/categories.php');
require_once('./models/produits.php');



$categObj = new Categories;

$productObj = new Produits;

$allCategories = $categObj->getAllCategory();


if (!isset($_GET['categorie'])) {
    $allProducts = $productObj->getAllProducts();
} else {
    if ($_GET['categorie'] == "null") {
        $allProducts = $productObj->getAllProducts();
    } else {
        $allProducts = $productObj->sortByCategory($_GET['categorie']);
    }
}

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $allProducts = $productObj->getByNav($search);
}