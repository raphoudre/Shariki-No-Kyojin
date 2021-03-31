<?php require_once('../controllers/checkout-controller.php');?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <title>Checkout</title>
        <link rel="stylesheet" href="../assets/css/panelstyle.css">
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body class="login-form">
        <form action="../controllers/checkout-controller.php" class="" method="post">
            <h2 class="text-center">Inscription</h2>       
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="John Doe" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <textarea type="" name="adress" class="form-control" required="required" autocomplete="off">35 rue Labedoyère, 
76620 Le Havre
                </textarea>
            </div>
            <div class="form-group bg-dark rounded d-flex justify-content-center text-center">
                <p class="font-weight-bold text-white">TOTAL TTC : <?= $_POST["checkout"] ?></p>
                <?php if (!isset($_SESSION['user'])) {?>
                    <a class="" href="login.php">Connectez-vous pour sauvegarder cette commande<a>
                <?php } ?>
            </div>
            <div class="form-group">
                <button type="submit" name="finalcheckout" class="btn btn-primary btn-block">Payer</button>
            </div>   
        </form>
    </div>
    </body>
</html>