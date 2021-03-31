<?php 
require_once('../../controllers/addcategorie-controller.php');
?>

<!doctype html>
<html lang="fr">
<head>
    <title>Ajouter une catégorie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/panelstyle.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
<div class="login-form">
    <?php 
        if(isset($_GET['err'])){
            $err = htmlspecialchars($_GET['err']);
            switch($err){
                case 'success':
                ?>
                    <div class="alert alert-success">
                        <strong>Succès !</strong>
                    </div>
                <?php
                break;
                case 'error':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur. Veuillez réessayer</strong>
                    </div>
                <?php
                break;
                case 'deleted':
                ?>
                    <div class="alert alert-success">
                        <strong>Catégorie correctement supprimée</strong>
                    </div>
                <?php
                break;
                case 'changed':
                ?>
                    <div class="alert alert-success">
                        <strong>Catégorie correctement modifiée</strong>
                    </div>
                <?php
                break;
                case 'unset':
                ?>
                    <div class="alert alert-danger">
                        <strong>Vous ne pouvez pas rien modifier !</strong>
                    </div>
                <?php
                break;
            }
        }
        if (isset($_GET['modif']) && $_GET['modif']==true) { ?>
            <form action="addcategorie.php" method="GET">
            <h2 class="text-center">Modifier une catégorie</h2>       
            <div class="form-group">
                <select name="newid" class="form-control" id="newid">
                    <option value="" disabled selected>Choisir une catégorie existante</option>
                    <?php foreach ($allCategorie as $categorie) { ?>
                        <option value="<?= $categorie['id'] ?>"><?= $categorie['nom'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="newname" class="form-control" placeholder="Nouveau nom" autocomplete="off">
            </div>
            <div class="form-group">
                <button type="submit" name="modify" class="btn btn-primary btn-block">Modifier</button>
                <button type="submit" name="delete" class="btn btn-danger btn-block">Supprimer la categorie séléctionnée</button>
            </div>   
            </form>
            <a href="addcategorie.php?modif=false"></a>
            <p class="text-center"><a href="./addProduct.php">retour</a></p>
        <?php } else if (!isset($_GET['modif']) || $_GET['modif'] == false) { ?>
            <form action="addcategorie.php" method="GET">
                <h2 class="text-center">Ajouter une catégorie</h2>       
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Ex : Costume" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" name="add" class="btn btn-primary btn-block">Créer</button>
                </div>   
                <a href="addcategorie.php?modif=true">Modifier une catégorie existante</a>
            </form>
            <p class="text-center"><a href="./addProduct.php">retour</a></p>
        <?php } ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>