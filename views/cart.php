<?php
    $pageSwitch = 'cart';
    session_start();
    require_once('needed.php');
    require_once('../controllers/panier-controller.php');
?>
<!doctype html>
<html lang="fr">

<head>
    <title>Panier</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://kit.fontawesome.com/3af4f17b71.js" crossorigin="anonymous"></script>
</head>

<body class="">
    <a href="../index.php"><?= headerPage() ?></a>
        <div class="container-fluid d-flex justify-content-center flex-column">
            <?php if (empty($ids)) {
                $cartProduct = array();
                echo '<h1 class="text-danger font-weight-bold">Il n\'y a aucun produit dans ton panier !</h1>';
                } else { ?>
            <table class="table table bg-white text-dark rounded col-12">
                <thead class="">
                    <tr>
                        <th class="" colspan="1"></th>
                        <th class="text-center" colspan="1">Nom produit</th>
                        <th class="text-center" colspan="1">Prix à l'unité</th>
                        <th class="text-center" colspan="1">Quantité</th>
                        <th class="text-center" colspan="1">Total + TVA</th>
                        <th class="text-center" colspan="1">Actions</th>
                    </tr>
                </thead>
                <tbody class=""><?php
                    foreach ($cartProduct as $cartProduct) {
                        ?>
                        <tr class=" font-weight-bold">
                            <td class=""><img class="img-fluid" src="../uploads/<?= $cartProduct['image'] ?>.<?= $cartProduct['extension'] ?>" alt="<?= $cartProduct['image'] ?>"></td>
                            <td class="text-center"><?= $cartProduct['nom'] ?></td>
                            <td class="text-center"><?=number_format($cartProduct['prix'],2,',',' ')?>€</td>
                            <td class="text-center d-flex justify-content-center"><form action="cart.php" method="POST"><input type="number" name="changeQty" class="form-control rounded" value="<?= $_SESSION['panier'][$cartProduct['id']]['qty'] ?>"><input type="hidden" name="checkId" value="<?= $cartProduct['id'] ?>"><button class="btn btn-warning" type="submit"><i class="fas fa-sync"></i></button></form></td>
                            <td class="text-center"><?= number_format(($cartProduct['prix']*$_SESSION['panier'][$cartProduct['id']]['qty']) * 1.196,2,',',' '); ?>€</td>
                            <td class="text-center"><a class="btn btn-danger" href="cart.php?delete=<?= $cartProduct['id'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                <?php }} ?>
                </tbody>
            </table>
        </div>
        <?=  footerPage()?>
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