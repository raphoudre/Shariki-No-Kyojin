<?php
require_once('../../controllers/products-controller.php')
?>
<!doctype html>
<html lang="fr">
<head>
    <title>Produits</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="https://kit.fontawesome.com/3af4f17b71.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid bg-dark ">
    <a href="../adminpanel.php" class="btn btn-outline-warning"><i class="far fa-caret-square-left"></i></a>
    <a type="" href="addProduct.php" class="btn btn-outline-danger m-3">Ajouter un nouveau produit</a>
        <table class="table text-white">
            <?php if (isset($_GET['err'])) {
                if ($_GET['err'] == 'success'){ ?>
                    <div class="alert alert-success" role="alert">
                        <strong>Produit correctement supprimé !</strong>
                    </div>
            <?php } elseif ($_GET['err'] == 'error') { ?>
                    <div class="alert alert-warning" role="alert">
                        <strong>Il y a eu une erreur...</strong>
                    </div>
            <?php }
            } ?>
            
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOM</th>
                    <th scope="col">DESC</th>
                    <th scope="col">PRIX</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($allProducts as $product) { ?>
                <tr>
                    <th scope="row"><?= $product['id'] ?></th>
                    <td><?= $product['nom'] ?></td>
                    <td><?= $product['description'] ?></td>
                    <td class="font-weight-bold text-warning"><?= number_format($product['prix'], 2, ',', ' ');?>€</td>
                    <td><form><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal<?= $product['id'] ?>"><i class="far fa-trash-alt"></i></button></form>
                    <a data-toggle="collapse" href="#collapseChange<?= $product['id'] ?>" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="far fa-caret-square-down"></i></a></td>
                </tr>
                <tr class="collapse" id="collapseChange<?= $product['id'] ?>">
                        <td>*</td>
                    <form action="products.php" method="POST">
                        <input type="hidden" name="thisid" value="<?= $product['id'] ?>">
                        <td><input name="nom" type="text" class="form-control" value="<?= $product['nom'] ?>"></td>
                        <td><textarea name="description" type="text" class="form-control"><?= $product['description'] ?></textarea></td>
                        <td><input name="prix" type="number" class="form-control" value="<?= $product['prix'] ?>"></td>
                        <td><button type="submitChange" class="btn btn-warning">Modifier</button></td>
                    </form>
                </tr>
                <div class="modal fade" id="deleteModal<?= $product['id'] ?>" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?= $product['nom'] ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="../../uploads/<?= $product['image']?>.<?= $product['extension'] ?>" alt="" class="img-fluid">
                                <p><?= $product['description'] ?></p>
                                
                            </div>
                            <div class="modal-footer">
                                <form action=../../controllers/products-controller.php method="post"><button name="delete" value="<?= $product['id'] ?>" type="submit" class="btn btn-outline-danger">Supprimer</button></form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>