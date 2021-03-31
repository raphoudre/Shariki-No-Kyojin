<?php
if (isset($_POST['delete'])) {
    require('../models/database.php');
    require("../models/produits.php");
    require('../models/categories.php');
} else {
    require('../../models/database.php');
    require("../../models/produits.php");
    require('../../models/categories.php');    
}

session_start();
if ($_SESSION['admin'] !== 'connected') {
    header('Location: ../index.php');
    die();
}
$productObj = new Produits;
$categObj = new Categories;

if (isset($_POST['delete'])) {
    $id = htmlspecialchars($_POST['delete']);
    $productObj->deleteProduct($id);
    header('Location:../views/admin/products.php?err=success');
}

if (isset($_POST['submitChange'])) {
    $productObj->updateProduct($_POST['thisid'], $_POST["nom"], $_POST["description"], $_POST["prix"]);
    unset($_POST);
}

$allProducts = $productObj->getAllProducts();
$allCategories = $categObj->getAllCategory();