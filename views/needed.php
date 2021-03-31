<?php
function headerPage(){ ?>
    <div class="row d-flex justify-content-center">
        <img src="../assets/img/misc/logo.png" class="logo img-fluid" width="" alt="">
    </div>
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
            </div>
        </div>
    </footer>
<?php }