<?php
session_start();
if ($_SESSION['admin'] !== 'connected') {
    header('Location: ../index.php');
    die();
}
if (!empty($_POST['price'])) {
    require_once('../models/database.php');
    require_once('../models/categories.php');
} else {
    require_once('../../models/database.php');
    require_once('../../models/categories.php');    
}

$categObj = new Categories;
$allCategories = $categObj->getAllCategory();

if (!empty($_POST['name']) && !empty($_POST['desc']) && !empty($_POST['price'])) {
    $dataBase = new PDO("mysql:host=localhost;dbname=projetpro", "codeit","EPLVnWV7Ynj2VNgj");
    $target_dir = "../uploads/";
    $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['desc']);
    $price = htmlspecialchars($_POST['price']);
    $prePic = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
    $pic = explode('.', $prePic)[0];
    $extension = htmlspecialchars($imageFileType);
    $categorie = $_POST['categorie'];
    $uploadOk = 1;
        
    // Vérifier si l'image est une vrai image en vérifiant le type mime
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Le fichier n'est pas une image.";
        $uploadOk = 0;
    }
    // Vérifier si le fichier existe déjà
    if (file_exists($target_file)) {
    echo "Désolé, ce fichier existe déjà.";
    $uploadOk = 0;
    }
    // Vérifier la taille du fichier
    if ($_FILES["fileToUpload"]["size"] > 39250000) {
        echo "Désolé, votre fichier est trop gros.";
        $uploadOk = 0;
    }
    // Accepter seulements quelques extensions
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" &&
        $imageFileType != "gif" && $imageFileType != "svg" && $imageFileType != "webp") {
        echo "Désolé, seuls les JPG, JPEG, PNG & GIF sont autorisés.";
        $uploadOk = 0;
    }
    // vérifier si $uploadOk est égal à 1
    if ($uploadOk == 0) {
        echo "Désolé, votre fichier n'as pas été uploadé.";
    // Si c'est bon, essayer d'uploader le fichier
    } else {
        if (isset($_POST['categorie'])) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "Le fichier ".htmlspecialchars(basename($_FILES["fileToUpload"]["name"])).
                " a bien été uploadé.";
                $insert = "INSERT INTO produits (nom, description, prix, image, extension, id_categories) VALUES (:name, :description, :price, :pic, :ext, :categorie)";
                $request = $dataBase->prepare($insert);
                $request->bindParam(':name', $name);
                $request->bindParam(':description', $description);
                $request->bindParam(':price', $price);
                $request->bindParam(':pic', $pic);
                $request->bindParam(':ext', $extension);
                $request->bindParam(':categorie', $categorie);
                $request->execute();
        
                Header('Location: ../views/admin/addProduct.php?message=success');
                
            } else {
                echo "Désolé, il y a eu un problème au moment de l'upload de ton fichier.";
            }
        } else {
            Header('Location: ../views/admin/addProduct.php?message=error');
        }
        
    }
}
