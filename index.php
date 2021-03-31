<?php
    $pageSwitch = 'index';
    session_start();
    require_once('views/needed.php');
    require_once('./controllers/panier-controller.php');
    require_once('./controllers/index-controller.php');
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();  
    }
?>
<!doctype html>
<html lang="fr">

<head>
    <title>Shariki No Kyojin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/3af4f17b71.js" crossorigin="anonymous"></script>
</head>

<body>
    <?= headerPage(); ?>
    <div class="container-fluid">

        <div class="d-flex flex-row rounded">
            <div class="d-flex flex-column bg-white rounded col-2 m-2">
                <div class="">
                    <div>
                        <a class="nav-link text-dark text-center" id="goPanier" href="views/cart.php"><i
                        class="fas fa-shopping-basket text-danger text-center"></i> Panier (<span class="text-primary"><?= $panier->count(); ?></span>)</a>
                        <p class="text-center"><?= number_format($panier->total(), 2, ',', ' ') ?>€ HTC</p>
                    </div>
                    <a class="nav-link text-dark text-center" href="<?php if(isset($_SESSION['user'])){ echo '../views/deco.php'; } else { echo '../views/login.php';}?>">
                    <i class="fas fa-sign-in-alt text-danger"></i><?php if(isset($_SESSION['user'])){ echo ' Deconnexion'; } else { echo ' Connexion';}?></a>
                </div>
                <div class="border-bottom">
                    <form action="index.php" method="GET" class="text-center">
                        <input type="text" class="form-control" placeholder="Rechercher..." name="search">
                        <button type="submit" class="btn text-center"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                    <div class="">
                        <form action="index.php" class="text-center" method="GET">
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="categorie"
                            id="nullRadio" value="null" checked>
                            <label class="form-check-label" for="categorie">
                                Sans filtre
                            </label>
                        </div>
                    <?php foreach ($allCategories as $row) {?>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" value="<?= $row['id']; ?>" name="categorie"
                            id="<?= $row['id'] ?>">
                        <label class="form-check-label" for="categorie">
                            <?= $row['nom'] ?>
                        </label>
                    </div>
                    <?php } ?>
                    <button type="submit" class="m-1 btn btn-outline-dark">Appliquer</button>
                </form>
                </div>
            </div>
            <div class="d-flex flex-row">
                <div class="d-flex flex-row flex-wrap">
                    <?php foreach($allProducts as $row) {?>
                        <div class="m-2 border rounded w-100 bg-white" id="product<?= $row['id'] ?>">
                            <div class="m-2 d-flex flex-row">
                                <img class="" src="../uploads/<?= $row['image'] ?>" alt="" height="auto" class="img-fluid">
                                <div class="">
                                    <h4 class="card-title shop-item-title">
                                        <p class="text-dark" href=""><?= $row['nom'] ?></p>
                                        <small class="text-warning">&#9733; &#9733; &#9733; &#9733;
                                        &#9734;</small>
                                    </h4>
                                    <h5 class=""><?= number_format($row['prix'],2 , ',', ' ') ?>€ (HTC)</h5>
                                </div>
                                <div class="border m-1">
                                    <p class=""><em><?= $row['description'] ?></em></p>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="d-flex flex-column">
                                        <a href="views/addpanier.php?id=<?= $row['id'] ?>"
                                        class=" btn btn-outline-primary float-right"
                                        ><i class="fas fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
</div>
<?= footerPage(); ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/cart.js"></script>
</body>

</html>