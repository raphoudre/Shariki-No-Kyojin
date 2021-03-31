<?php
    require('../../controllers/addproduct-controller.php');
?>
<!doctype html>
<html lang="fr">

<head>
    <title>Ajout de produit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/panelstyle.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <div class="login-form">
        <?php if (isset($_GET['message'])) {
            if ($_GET['message'] == "success") { ?>
                <div class="alert alert-success">
                    <strong>Succès !</strong> ajout réussi.
                </div>
        <?php } else { ?>
                <div class="alert alert-danger">
                <strong>Erreur !</strong> le produit n'a pas été ajouté.
                </div>
        <?php }
        } ?>
        <form action="../../controllers/addproduct-controller.php" enctype="multipart/form-data" method="post">
            <h2 class="text-center">Nouveau produit</h2>
            <div class="form-group">
            <label for="name">Nom</label></br>
                <input type="text" name="name" class="form-control" placeholder="nom" required="required"
                    autocomplete="off">
            </div>
            <div class="form-group">
            <label for="desc">Description</label></br>
                <textarea name="desc" class="form-control" placeholder="description" required="required"
                    autocomplete="off"></textarea>
            </div>
            <div class="form-group">
            <label for="price">Prix</label></br>
                <input type="number" name="price" class="form-control" placeholder="prix" required="required"
                    autocomplete="off">
            </div>
            <div class="form-group">
                <input type="file" name="fileToUpload" id="fileToUpload" class=""
                    required="required">
            </div>
            <div class="form-group">
                <label for="categorie">Catégorie</label></br>
                <select name="categorie" id="categorie" class="custom-select">
                    <option value="" disabled selected>Veuillez choisir une catégorie</option>
                    <?php foreach ($allCategories as $categorie) {?>
                        <option value="<?= $categorie['id'] ?>"><?= $categorie['nom'] ?></option>
                    <?php }?>
                </select>
                <a href="./addcategorie.php" type="submit">Ajouter une nouvelle catégorie</a>
            </div>
            <div class="form-group">
                <a class="" href="../../views/admin/products.php">Retour</a>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>