<?php
function headerPage(){ ?>
    <a href="../index.php">
    <div class="row d-flex justify-content-center">
        <img src="../assets/img/misc/logo.png" class="logo img-fluid" width="" alt="">
    </div></a>
<?php }
function footerPage(){
    ?>
    <footer class="bg-dark">
        <div class="d-flex align-items-center">
            <div>
                <img src="../assets/img/misc/footerband.png" class="img-fluid" alt="">
            </div>
            <div>
                <?php
                    if (isset($_SESSION['admin'])) {
                    if ($_SESSION['admin'] == 'connected') { ?>
                        <a href="../views/adminpanel.php">panel administrateur</a>
                    <?php }
                }?>
                <p>|</p>
                <a href="<?php if(isset($pageSwitch) && $pageSwitch == 'index'){echo '#';} else {echo '../index.php';}; ?>">Accueil</a>
                <p>|</p>
                <a href="views/cgv.php">Conditions générales de ventes</a>
            </div>
        </div>
    </footer>
<?php }