<?php
require('../../models/database.php');
require("../../models/clients.php");
session_start();
if ($_SESSION['admin'] !== 'connected') {
    header('Location: ../index.php');
    die();
}
$userObj = new Clients;
$allUsers = $userObj->getAllClients();

if (isset($_GET['delete'])) {
    $id = $_GET['deleteid'];
    $userObj->deleteTheClient($id);
}