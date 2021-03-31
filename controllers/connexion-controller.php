<?php
require_once('../models/database.php');
require_once('../models/clients.php');
// On créé un nouvel objet de la classe "Clients"
$clientObj = new Clients;

if(isset($_POST['emailo']) && isset($_POST['passwordo'])){
    $dataBase = new PDO("mysql:host=localhost;dbname=projetpro", "codeit","EPLVnWV7Ynj2VNgj");
    $email = htmlspecialchars($_POST['emailo']);
    $password = htmlspecialchars($_POST['passwordo']);
    $check = $dataBase->prepare('SELECT pseudo, email, password, power FROM utilisateurs WHERE email = :email');
    $check->bindParam(':email', $email);
    $check->execute();
    $data = $check->fetch();
    $mail = $data['pseudo'];
    $power = $data['power'];
    $row = $check->rowCount();
    if($row == 1){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if(password_verify($password, $data['password'])){
                session_start();
                $_SESSION['client'] = true;
                $clientObj->login($power, $mail);
            }else{
                header('Location: ../views/login.php?login_err=password'); die();
            }
        }else{
            header('Location: ../views/login.php?login_err=email'); die();
        }
    }else{
        header('Location: ../views/login.php?login_err=already'); die(); 
    }
}