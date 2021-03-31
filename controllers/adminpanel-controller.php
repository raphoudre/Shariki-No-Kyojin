<?php
session_start();
if ($_SESSION['admin'] !== 'connected') {
    header('Location: ../index.php');
    die();
}
