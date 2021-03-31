<?php
require_once('../models/database.php');
require_once('../models/clients.php');
// On créé un nouvel objet de la classe "Clients"
$clientObj = new Clients;

// Expressions régulières pour vérifier les données du formulaire avant l'envoie.
$regexName = "/^[a-z0-9_-]{3,15}$/u";
$regexMail = "/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/";
$regexPassword = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/";

if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype'])){
    $dataBase = new PDO("mysql:host=localhost;dbname=projetpro", "codeit","EPLVnWV7Ynj2VNgj");
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);
    $check = $dataBase->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    if($row == 0){ 
        if(strlen($pseudo) <= 100){
            if(strlen($email) <= 100){
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    if($password == $password_retype){
                        $clientObj->inscription($pseudo, $email, $password);
                    }else{
                        header('Location: ../views/inscription.php?reg_err=password'); die();
                    }
                }else{ 
                    header('Location: ../views/inscription.php?reg_err=email'); die();
                }
            }else{
                header('Location: ../views/inscription.php?reg_err=email_length'); die();
            }
        }else{
            header('Location: ../views/inscription.php?reg_err=pseudo_length'); die();
        }
    }else{
        header('Location: ../views/inscription.php?reg_err=already'); die();
    }
}




