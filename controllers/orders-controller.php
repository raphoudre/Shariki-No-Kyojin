<?php
session_start();
require('../../models/database.php');
require("../../models/commandes.php");
require('../../models/clients.php');
if ($_SESSION['admin'] !== 'connected') {
    header('Location: ../index.php');
    die();
}
$clientObj = new Clients;
$orderObj = new Commandes;
$allOrders = $orderObj->getAllOrders();
if (isset($_POST['update'])) {
    $orderObj->changeState($_POST['update'], 1);
    header('Location:orders.php');
}
if (isset($_POST['cancel'])) {
    $orderObj->changeState($_POST['cancel'], 2);
    header('Location:orders.php');
}

