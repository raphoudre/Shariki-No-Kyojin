<?php
require_once('../../models/database.php');
require_once('../../models/categories.php');
$categObj = new Categories;
$allCategorie = $categObj->getAllCategory();
if (isset($_GET['add'])) {
    $name = $_GET["name"];
    $categObj->addCategory($name);
}
if (isset($_GET['modify'])) {
    if (!empty($_GET['newid']) && !empty($_GET['newname'])){
        $name = $_GET["newname"];
        $id = $_GET["newid"];
        $categObj->modifyCategory($name, $id);        
    } else {
    header('Location:addcategorie.php?modif=true&err=unset');
    }
}
if (isset($_GET['delete'])) {
    $id = $_GET['newid'];
    $categObj->deleteCategory($id);
    header('Location:addcategorie.php?modif=true&err=deleted');
}