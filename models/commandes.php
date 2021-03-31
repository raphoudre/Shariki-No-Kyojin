<?php
class Commandes extends Database{
    public function getAllOrders(){
        $query = "SELECT * FROM commandes";
        $queryObj = $this->dataBase->query($query);
        if ($queryObj == false) {
            echo 'Il n\'y a aucune commandes';
        } else {
            $result = $queryObj->fetchAll();
            return $result;
        }
    }
    public function getTheOrder($id){
        $query = "SELECT * FROM commandes WHERE id=$id";
        $queryObj = $this->dataBase->query($query);
        $result = $queryObj->fetch();
        return $result;
    }
    public function createOrder(){
        if (!isset($_POST['finalcheckout'])) {
            header('Location:checkout.php');
            die();
        }
        $insert = "INSERT INTO commandes (";
    }
    public function changeState($id, $what){
        if ($what == 1) {
            $query = "UPDATE commandes
            SET etat = 2
            WHERE id=$id";
            $this->dataBase->query($query);
            
        } elseif ($what == 2){
            $query = "UPDATE commandes
            SET etat = 3
            WHERE id=$id";
            $this->dataBase->query($query);
        }
    }
}