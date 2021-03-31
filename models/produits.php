<?php
class Produits extends Database{
    public function getTheProducts($id){
        $query = "SELECT * FROM produits WHERE id=$id";
        $queryObj = $this->dataBase->query($query);
        $result = $queryObj->fetch();
        return $result;
    }
    public function getAllProducts(){
        $query = "SELECT * FROM produits";
        $queryObj = $this->dataBase->query($query);
        $result = $queryObj->fetchAll();
        return $result;
    }
    public function sortByCategory($id){
        $query = "SELECT * FROM produits WHERE id_categories = $id";
        $queryObj = $this->dataBase->query($query);
        $result = $queryObj->fetchAll();
        return $result;
    }
    public function deleteProduct($checkId){
        $id = $checkId;
        $delete = "DELETE FROM produits WHERE `id` = :id";
        $select = $this->dataBase->query("SELECT image , extension FROM produits WHERE `id` = $id");
        $img = $select->fetch();
        $requestD = $this->dataBase->prepare($delete);
        $requestD->bindParam(':id', $id);
        $path = "../uploads/".$img['image'].'.'.$img['extension'];
        unlink(realpath($path));
        $requestD->execute();    
    }
    public function updateProduct($id, $newname, $newdesc, $newprice){
        $query = "UPDATE produits SET `nom` = :nom, `description` = :desc, `prix` = :prix WHERE `id` = :id";
        $queryObj = $this->dataBase->prepare($query);
        $queryObj->bindParam(':nom', $newname);
        $queryObj->bindParam(':desc', $newdesc);
        $queryObj->bindParam(':prix', $newprice);
        $queryObj->bindParam(':id', $id);
        $queryObj->execute();
    }
    public function getMultipleProducts($ids){
        if (empty($ids)) {
            echo '<em>vide</em>  ';
            $this->checkCount = 'empty';
        } else {
            $query = "SELECT * FROM  produits WHERE id IN ($ids)";

            $queryObj = $this->dataBase->query($query);

            if ($queryObj == false) {
                echo 'vide';
            } else {
                $result = $queryObj->fetchAll();

                return $result;
            }
        }
    }
    public function getByNav($search){
        $q = htmlspecialchars($search);
        $query = 'SELECT * FROM produits WHERE nom LIKE "%'.$q.'%" ORDER BY nom DESC';
        $queryObj = $this->dataBase->query($query);
        $result = $queryObj->fetchAll();
        return $result;
    }
};