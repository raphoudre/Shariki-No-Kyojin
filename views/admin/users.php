<?php
require('../../controllers/users-controller.php');
$adminSwitch = 'users';
?>
<!doctype html>
<html lang="fr">
<head>
    <title>Utilisateurs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="https://kit.fontawesome.com/3af4f17b71.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <div class="container-fluid">
    <a href="../adminpanel.php" class="btn btn-outline-warning"><i class="far fa-caret-square-left"></i></a>
        <table class="table text-white table-dark">
            <?php if (isset($_GET['err'])) { 
                switch($_GET['err']){
                    case 'success':
                    ?>
                        <div class="alert alert-success d-flex justify-content-between">
                            <strong>Utilisateur supprimé !</strong><a href="users.php">x</a>
                        </div>
                    <?php
                    break;
                }
            } ?>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">PSEUDO</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">POUVOIR</th>
                    <th scope="col">ACTION</th>

                </tr>
            </thead>
            <tbody>
            <?php foreach ($allUsers as $user) { ?>
                <tr>
                    <th scope="row"><?= $user['id'] ?></th>
                    <td><?= $user['pseudo'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?php if($user['power']==1){echo'Administrateur';}else{echo'Client';} ?></td>
                    <td><form><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal<?= $user['id'] ?>">Supprimer</button></form></td>
                </tr>
                <div class="modal fade" id="deleteModal<?= $user['id'] ?>" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Etes-vous sur de vouloir supprimer cet utilisateur ?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                pseudo : <?= $user['pseudo'] ?></br>
                                email : <?= $user['email'] ?></br>
                                <?php if($user['power']==1){echo'<span class="font-weight-bold text-danger">Attention, ce compte est administrateur !</span>';}else{echo'<span class="text-primary font-weight-bold">Cet utilisateur est un client</span>';} ?>
                            </div>
                            <div class="modal-footer">
                                <form action="users.php" method="GET"><input name="deleteid" type="hidden" value="<?= $user['id'] ?>"><button type="submit" name="delete" class="btn btn-danger">Supprimer</button></form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            
            ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>