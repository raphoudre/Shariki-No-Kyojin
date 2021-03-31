<?php
require('../../controllers/orders-controller.php');
$adminSwitch = 'orders';
?>
<!doctype html>
<html lang="fr">
<head>
    <title>Commandes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3af4f17b71.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid bg-dark">
    <a href="../adminpanel.php" class="btn btn-outline-warning"><i class="far fa-caret-square-left"></i></a>
        <table class="table table-dark text-white">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">DATE</th>
                    <th scope="col">NOM PRENOM</th>
                    <th scope="col">ADRESSE</th>
                    <th scope="col">TOTAL TCC</th>
                    <th scope="col">ETAT</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
            <?php  
            foreach ($allOrders as $order) { ?>
                <tr>
                    <th scope="row"><?= $order['id'] ?></th>
                    <td><?= $order['date'] ?></td>
                    <td><?= $order['name'] ?></td>
                    <td><?= htmlspecialchars($order['adresse_livraison']) ?></td>
                    <td><?= $order['totalttc'] ?>€</td>
                    <td><?php if($order['etat']==1){echo 'Payée';}elseif($order['etat']==2){echo 'Envoyée';}else{echo '<p class="text-danger font-weight-bold">Annulée</p>';} ?></td>
                    <td class="d-flex flex-row">
                    <a href="facture.php?id=<?= $order['id'] ?>" class="btn btn-outline-primary"><i class="fas fa-eye"></i></a>
                    <?php if ($order['etat']!=3) { ?>
                        <form action="orders.php" method="POST"><button type="submit" name="update" value="<?= $order['id'] ?>" class="btn btn-outline-success"><i class="fas fa-check-square"></i></button></form>
                        <form action="orders.php" method="POST"><button type="submit" name="cancel" value="<?= $order['id'] ?>" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></button></form>
                    <?php } ?>
                    </td>
                </tr>
            <?php } ?>
                
            </tbody>
        </table>
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