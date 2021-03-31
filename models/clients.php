<?php
class Clients extends Database{
    public function inscription($pseudo, $email, $password){
        $cost = ['cost' => 12];
        $password = password_hash($password, PASSWORD_BCRYPT, $cost);
        $insert = $this->dataBase->prepare("INSERT INTO `utilisateurs` (`id`, `pseudo`, `email`, `password`, `power`) VALUES (NULL, :pseudo, :email, :password, NULL);");
        $insert->bindParam(':pseudo', $pseudo);
        $insert->bindParam(':email', $email);
        $insert->bindParam(':password', $password);
        $insert->execute();
        header('Location: ../views/inscription.php?reg_err=success');
        die();
    }
    public function login($power, $mail){
        $_SESSION['user'] = $mail;
        $powerP = $power;
        if ($powerP==1) {
            $_SESSION['admin'] = 'connected';
            header('Location: ../index.php');
            die();
        } else {
            $_SESSION['admin'] = 'disconnected';
            header('Location: ../index.php');
            die();
        }
    }
    
    public function getAllClients(){
        $query = "SELECT * FROM utilisateurs";
        $queryObj = $this->dataBase->query($query);
        $result = $queryObj->fetchAll();
        return $result;
    }
    public function getTheClient($id){
        $query = "SELECT * FROM utilisateurs WHERE id=$id";
        $queryObj = $this->dataBase->query($query);
        $result = $queryObj->fetch();
        return $result;
    }
    public function deleteTheClient($id){
        $query = 'DELETE FROM utilisateurs WHERE id = :id';
        $prepare = $this->dataBase->prepare($query);
        $prepare->bindParam(':id', $id);
        $prepare->execute();
        header('Location:users.php?err=success');
    }
}