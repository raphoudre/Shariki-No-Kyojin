<?php
if(!isset($_POST["checkout"])){
    header('Location:../index.php');
    die();
}
$pageSwitch = 'cart';
session_start();
require_once('../controllers/panier-controller.php');
require_once('../models/commandes.php');
require_once('../models/clients.php');

